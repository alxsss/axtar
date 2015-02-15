<?php use_helper('I18N','Global') ?>
<!-- 
<div class="forex">
<?php
//echo __('Exchange rates:').'<span class="currency">USD</span> '.get_currency('USD', 'AZN', 1).' <span class="currency">EUR</span> '.get_currency('EUR', 'AZN', 1).' <span class="currency">RUB</span> '.get_currency('RUB', 'AZN', 1);
?>
</div>
-->
<div class="forex">
<?php
echo __('Oil Prices').':<span class="currency">Brent</span> '.get_oil_price('http://www.oil-price.net/widgets/brent_text/gen.php?lang=en').'<span class="currency">WTI</span> '.get_oil_price('http://www.oil-price.net/TABLE3/gen.php?lang=en');
?>
</div>
