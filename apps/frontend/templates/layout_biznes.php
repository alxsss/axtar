<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
<?php //use_stylesheet('/sebekePlugin/css/layout?v=7') ?>
<?php //use_stylesheet('main?v=36') ?>
   <link href="/css/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/axtar-custom-bootstrap.css" rel="stylesheet">

    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
<body>
    <?php use_helper('I18N') ?>
    <?php //$sf_user->setCulture('az') ?>
    <?php // include_component('sfLanguageSwitch', 'get') ?>
    <?php //include_partial('search/univhead') ?>

      <?php include_partial('search/bootstrap_univhead') ?>
      <?php //include_partial('sidebar/univhead_login') ?>
   <div id="content">  
  
    
    <div id="search_results"> 
      <?php include_partial('biznes/biznes_search_small')?>
      <?php echo $sf_content ?>
    </div>
    <div id="footer">
         <?php include_partial('sidebar/univfoot') ?>
   </div>    
    <div id="keyboard_container" style="display:none;">
	<ul id="keyboard">		
		<li class="letter">ə</li>
                <li class="letter">ç</li>
                <li class="letter">ğ</li>
                <li class="letter">ı</li>
                <li class="letter">ö</li>
		<li class="letter">ş</li>
                <li class="letter">ü</li>
		<li class="right-shift">shift</li>
		<li class="capslock">caps lock</li>
		<li class="delete">delete</li>
                <li class="keyboard lastitem">x</li>                 			
	</ul>
</div>
</div>
<?php use_javascript('jquery.js')?>
<?php use_javascript('jquery.axtar.js?v=8')?>
  </body>
</html>
