/* HMS Denver — free tools. Everything runs locally in the browser. */
(() => {
    'use strict';

    const usd = (n) => new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD', maximumFractionDigits: n < 100 ? 2 : 0 }).format(n);
    const int = (n) => new Intl.NumberFormat('en-US', { maximumFractionDigits: 0 }).format(n);
    const num = (form, name) => Math.max(0, parseFloat(form.elements[name]?.value) || 0);
    const track = (event, params = {}) => { window.dataLayer = window.dataLayer || []; window.dataLayer.push({ event, ...params }); };

    // Calculators: recompute on every input change.
    const calculators = {
        ads(f) {
            const budget = num(f, 'budget');
            const cpc = num(f, 'cpc');
            const clicks = cpc > 0 ? budget / cpc : 0;
            const leads = clicks * num(f, 'cvr') / 100;
            const customers = leads * num(f, 'close') / 100;
            const revenue = customers * num(f, 'value');
            return {
                clicks: int(clicks),
                leads: int(leads),
                cpl: leads > 0 ? usd(budget / leads) : '–',
                customers: int(customers),
                revenue: usd(revenue),
                roas: budget > 0 ? (revenue / budget).toFixed(1) + '×' : '–',
            };
        },
        missed(f) {
            const jobs = num(f, 'missed') * 4.33 * num(f, 'newpct') / 100 * num(f, 'book') / 100;
            const month = jobs * num(f, 'job');
            return { jobs: int(jobs), month: usd(month), year: usd(month * 12) };
        },
    };

    document.querySelectorAll('[data-calc]').forEach((form) => {
        const calc = calculators[form.dataset.calc];
        const panel = form.closest('.tool');
        const render = () => {
            Object.entries(calc(form)).forEach(([key, value]) => {
                const el = panel.querySelector(`[data-out="${key}"]`);
                if (el) el.textContent = value;
            });
        };
        form.addEventListener('input', render);
        form.addEventListener('submit', (e) => e.preventDefault());
        form.addEventListener('change', () => track('tool_used', { tool: form.dataset.calc }), { once: true });
        render();
    });

    // Google review link generator.
    const reviewForm = document.querySelector('[data-review-form]');
    if (reviewForm) {
        const result = document.querySelector('[data-review-result]');
        const linkInput = document.querySelector('[data-review-link]');
        const qrBox = document.querySelector('[data-review-qr]');
        const download = document.querySelector('[data-qr-download]');
        const error = reviewForm.querySelector('[data-error]');

        reviewForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const placeId = reviewForm.elements.place_id.value.trim();
            const valid = /^[A-Za-z0-9_-]{20,}$/.test(placeId);
            error.hidden = valid;
            reviewForm.elements.place_id.setAttribute('aria-invalid', String(!valid));
            if (!valid) return;

            const link = 'https://search.google.com/local/writereview?placeid=' + encodeURIComponent(placeId);
            linkInput.value = link;
            result.hidden = false;

            qrBox.innerHTML = '';
            if (window.QRCode) {
                new window.QRCode(qrBox, { text: link, width: 220, height: 220, colorDark: '#171717', colorLight: '#ffffff' });
                // qrcodejs renders a canvas first, then an <img>; read whichever exists.
                setTimeout(() => {
                    const canvas = qrBox.querySelector('canvas');
                    if (canvas) download.href = canvas.toDataURL('image/png');
                }, 50);
            } else {
                download.hidden = true;
            }
            track('tool_used', { tool: 'review_link' });
        });
    }

    // Copy buttons.
    document.querySelectorAll('[data-copy]').forEach((btn) => {
        btn.addEventListener('click', async () => {
            const input = document.querySelector(btn.dataset.copy);
            try {
                await navigator.clipboard.writeText(input.value);
            } catch (e) {
                input.select();
                document.execCommand('copy');
            }
            const label = btn.textContent;
            btn.textContent = 'Copied!';
            setTimeout(() => { btn.textContent = label; }, 1600);
        });
    });
})();
