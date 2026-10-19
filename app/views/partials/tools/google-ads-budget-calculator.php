<form class="form calc" data-calc="ads" novalidate>
    <div class="form__row">
        <div class="field">
            <label for="budget">Monthly ad budget ($)</label>
            <input type="number" id="budget" name="budget" min="0" step="50" value="2000" inputmode="decimal">
        </div>
        <div class="field">
            <label for="cpc">Average cost per click ($)</label>
            <input type="number" id="cpc" name="cpc" min="0.01" step="0.01" value="8" inputmode="decimal">
        </div>
    </div>
    <div class="form__row">
        <div class="field">
            <label for="cvr">Click-to-lead conversion rate (%)</label>
            <input type="number" id="cvr" name="cvr" min="0" max="100" step="0.1" value="8" inputmode="decimal">
        </div>
        <div class="field">
            <label for="close">Lead-to-customer close rate (%)</label>
            <input type="number" id="close" name="close" min="0" max="100" step="1" value="30" inputmode="decimal">
        </div>
    </div>
    <div class="field">
        <label for="value">Average revenue per customer ($)</label>
        <input type="number" id="value" name="value" min="0" step="10" value="800" inputmode="decimal">
    </div>
</form>

<dl class="results" aria-live="polite">
    <div><dt>Clicks / month</dt><dd data-out="clicks">–</dd></div>
    <div><dt>Leads / month</dt><dd data-out="leads">–</dd></div>
    <div><dt>Cost per lead</dt><dd data-out="cpl">–</dd></div>
    <div><dt>New customers</dt><dd data-out="customers">–</dd></div>
    <div><dt>Revenue</dt><dd data-out="revenue">–</dd></div>
    <div><dt>Return on ad spend</dt><dd data-out="roas">–</dd></div>
</dl>
<p class="field__hint">Estimates only. Real results depend on your market, keywords, landing pages and tracking.</p>

<script src="<?= e(asset('js/tools.js')) ?>" defer></script>
