<?php use_helper('I18N')?>
<div id="navigation">
<ul id="navlinks_left">
    <li><?php echo link_to(__('Home'), '@homepage') ?></li>
    <li><?php echo link_to(__('News'), '@xeber_search') ?></li>
    <li><?php echo link_to(__('Business'), '@biznes_search') ?></li>
</ul>
 <?php //include_component('sfLanguageSwitch', 'get') ?>
  <ul id="navlinks">  	
	    <?php if ($sf_user->isAuthenticated()): ?>
          <?php //put this instead of link_to in order to handle utf-8 chars in url?>
          <li><a href="<?php echo url_for('@user_profile?username='.$sf_user->getUsername())?>" title="<?php echo __('my profile')?>"><?php echo $sf_user->getUsername()?></a>		  </li>
          <li><?php echo link_to(__('sign out'), '@logout') ?></li>
		<?php else: ?>
          <li><?php echo link_to(__('sign in'), '@login') ?></li>
        <?php endif ?> 
		<?php // include_component('sfLanguageSwitch', 'get') ?>    
    <li><?php echo link_to(__('Map'), '@map') ?></li>
    </ul>
</div>
