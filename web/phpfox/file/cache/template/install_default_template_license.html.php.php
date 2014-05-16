<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 22, 2012, 1:20 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: license.html.php 3469 2011-11-07 16:51:48Z Raymond_Benc $
 */
 
 

?>
<TABLE width="500" height="300" marginwidth="0" marginheight="0" frameborder="1" style="border:1px #B7B9BB solid; width:100%;" scrolling="yes">
<TR>License Agreement
<TD>
<p>Repack and Nulled by Signatureboy - There is no License Agreement for this product</p>
<p>For Educational and Testing Purpose only - Support the developers buy original <a href="#">Thankyou</A></p>
</TD>
</TR>
</TABLE> 
<div class="table_clear mT10">
	<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl("".$this->_aVars['sUrl'].".license"); ?>" id="install_form">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
		<div><input type="hidden" name="agree" value="1" /></div>
		<input type="submit" name="submit" value="I Agree. Lets continue.." class="button" id="button" />
	
</form>

</div>
