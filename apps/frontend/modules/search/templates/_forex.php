<?php use_helper('I18N','Global') ?>
<div class="forex">
<?php
echo __('Exchange rates:').'<span class="currency">USD</span> '.get_currency('USD', 'AZN', 1).' <span class="currency">EUR</span> '.get_currency('EUR', 'AZN', 1).' <span class="currency">RUB</span> '.get_currency('RUB', 'AZN', 1);
?>
</div>
