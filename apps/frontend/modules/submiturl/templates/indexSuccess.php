<?php use_helper('I18N')?>
<div  class="submit_site">
  <div class="submit_link">
    <h3><?php echo link_to(__('Submit your site for free'), url_for('submiturl/new'))?></h3>
  </div>
  <div class="submit_link">
    <h3><?php echo link_to(__('Submit your site to sponsored links'), url_for('sponsor/new'))?></h3>
  </div>
  <div class="submit_link">
    <h3><?php echo __('Submit your site to pay per click')?></h3>
  </div>
</div>