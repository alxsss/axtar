<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<?php //use_stylesheet('/sebekePlugin/css/layout?v=7') ?>
<?php //use_stylesheet('/css/main?v=36') ?>
 <link href="/css/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body> 
 <?php include_partial('search/bootstrap_univhead') ?>
<div id="content">
  
  <div id="content_main">
    <div id="breadcrumb">
       <?php include_slot('hemsinif_breadcrumb') ?>
    </div>
    <?php echo $sf_content ?>	  
  </div>    
  <!-- footer -->	
  <div id="footer">
         <?php include_partial('sidebar/univfoot') ?>
 </div>
</div>
<?php use_javascript('jquery.js')?>
<?php use_javascript('/sebekePlugin/js/jquery.hf.js?v=7')?>
</body>
</html>
