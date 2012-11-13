<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
     <?php if ($sf_user->isAuthenticated()): ?>
	   <?php echo link_to('axtar','/')?>
       <?php echo link_to('search','search')?>
       <?php echo link_to('url','url')?>
	   <?php echo link_to('advertise','advertise')?>
	    <?php echo link_to('sponsor','sponsor')?>
	 <?php endif ?> 
    <?php echo $sf_content ?>
  </body>
</html>
