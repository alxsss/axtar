<div id="main-header">
  <ul id="navlinks">
    <li><?php echo link_to(__('Home'), '@homepage') ?></li>
    <li><?php echo link_to(__('Map'), '@map') ?></li>

 <!--li class="first"><?php //echo link_to(__('Advertise'), '/advertise/') ?></li-->
  <?php if ($sf_params->get('module')=='biznes'): ?>
  <?php if ($sf_user->isAuthenticated()): ?>
    <li>
      <a href="<?php echo url_for('@user_profile?username='.$sf_user->getUsername())?>" title="<?php echo __('my profile')?>"><?php echo $sf_user->getUsername()?></a>       </li>
     <li><?php echo link_to(__('sign out'), '@logout') ?></li>
  <?php else: ?>
    <li><?php echo link_to(__('sign in'), '@login') ?></li>
  <?php endif ?>
  <?php endif ?>

  </ul>            
  	 <?php include_component('sfLanguageSwitch', 'get') ?>
</div>
