<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
  html { height: 100%; }
  body { height: 100%; margin: 0px; padding: 0px; }
  #map_canvas { height: 100%;margin:20px 0; }
</style>
<script type="text/javascript"
    src="http://maps.google.com/maps/api/js?sensor=true&language=az">
</script>
<script type="text/javascript">
  function initialize() {
    //var latlng = new google.maps.LatLng(-34.397, 150.644);
    var latlng = new google.maps.LatLng(40.422644,  49.878960);
    var myOptions = {
      zoom: 8,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
  }

</script>
</head>
<body onload="initialize()">
    <?php use_helper('I18N') ?>
    <?php //$sf_user->setCulture('az') ?>
    <?php // include_component('sfLanguageSwitch', 'get') ?>
    <?php include_partial('search/univhead') ?>
    <?php echo $sf_content ?>
    <?php include_partial('search/univfoot') ?>
  </body>
</html>
