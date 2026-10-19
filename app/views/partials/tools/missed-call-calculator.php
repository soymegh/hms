<form class="form calc" data-calc="missed" novalidate>
    <div class="form__row">
        <div class="field">
            <label for="missed">Missed calls per week</label>
            <input type="number" id="missed" name="missed" min="0" step="1" value="10" inputmode="numeric">
        </div>
        <div class="field">
            <label for="newpct">Share that are new customers (%)</label>
            <input type="number" id="newpct" name="newpct" min="0" max="100" step="1" value="40" inputmode="decimal">
        </div>
    </div>
    <div class="form__row">
        <div class="field">
            <label for="book">Share you would normally book (%)</label>
            <input type="number" id="book" name="book" min="0" max="100" step="1" value="50" inputmode="decimal">
        </div>
        <div class="field">
            <label for="job">Average job value ($)</label>
            <input type="number" id="job" name="job" min="0" step="10" value="450" inputmode="decimal">
        </div>
    </div>
</form>

<dl class="results" aria-live="polite">
    <div><dt>Lost jobs / month</dt><dd data-out="jobs">–</dd></div>
    <div><dt>Lost revenue / month</dt><dd data-out="month">–</dd></div>
    <div class="results__big"><dt>Lost revenue / year</dt><dd data-out="year">–</dd></div>
</dl>
<p class="field__hint">Based on 4.33 weeks per month. Adjust the numbers to match your business.</p>

<script src="<?= e(asset('js/tools.js')) ?>" defer></script>
