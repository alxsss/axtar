<div id="main-header">
 	<ul id="navlinks">
	<li><?php echo link_to(__('Home'), '@homepage') ?></li>
	 <li><?php echo link_to(__('About'), '@about') ?></li>
	 <li><?php echo link_to(__('Map'), '@map') ?></li>
	 <!--li class="first"><?php //echo link_to(__('Advertise'), '/advertise/') ?></li-->
	</ul>            
  	 <?php include_component('sfLanguageSwitch', 'get') ?>
</div>
