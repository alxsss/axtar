<?php use_helper('I18N') ?>
<div class="sf_apply_notice">
<p>
<?php echo(__(<<<EOM
Thank you for applying for an account. You will receive a verification
email shortly. If you do not see that email, please be sure to check 
your "spam" or "bulk" folder.
EOM
)) ?>
</p>
<p>
<?php echo link_to(__("Continue"), sfConfig::get('app_sfApplyPlugin_after', '@homepage')) ?>
</p>
</div>