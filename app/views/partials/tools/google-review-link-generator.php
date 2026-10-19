<form class="form" data-review-form novalidate>
    <div class="field">
        <label for="place-id">Your Google Place ID</label>
        <input type="text" id="place-id" name="place_id" placeholder="ChIJ..." autocomplete="off" spellcheck="false" required>
        <p class="field__hint">Don’t know it? Find it with Google’s free <a href="https://developers.google.com/maps/documentation/javascript/examples/places-placeid-finder" target="_blank" rel="noopener">Place ID Finder</a>.</p>
        <p class="field__error" data-error hidden>That doesn’t look like a valid Place ID. It usually starts with “ChIJ”.</p>
    </div>
    <button type="submit" class="btn btn--primary btn--block">Generate my review link</button>
</form>

<div class="tool__result" data-review-result hidden>
    <label for="review-link" class="tool__label">Your Google review link</label>
    <div class="copy-field">
        <input type="text" id="review-link" readonly data-review-link>
        <button type="button" class="btn btn--ghost" data-copy="#review-link">Copy</button>
    </div>
    <div class="tool__qr">
        <div data-review-qr aria-label="QR code for your review link"></div>
        <a href="#" class="btn btn--ghost" data-qr-download download="google-review-qr.png">Download QR code</a>
    </div>
    <p class="field__hint">Test the link first, then share it by text, email, receipts and signage.</p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" defer></script>
<script src="<?= e(asset('js/tools.js')) ?>" defer></script>
