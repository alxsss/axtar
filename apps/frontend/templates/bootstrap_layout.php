<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php include_title() ?>

    <!-- Bootstrap -->
    <link href="/css/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php include_http_metas() ?>
    <?php include_metas() ?>
   
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
    <?php use_helper('I18N') ?>
      <?php include_partial('search/bootstrap_univhead') ?>
    <div class="container-fluid">
      <?php echo $sf_content ?>
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
    <?php use_javascript('jquery-1.12.0.min.js')?>
    <?php //use_javascript('jquery.1.6-min.js')?>
    <?php use_javascript('jquery.axtar.js?v=15')?>
    <?php use_javascript('jquery.qtip.min.js')?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
  </body>
</html>

