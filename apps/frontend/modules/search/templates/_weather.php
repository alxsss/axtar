<?php use_helper('I18N','Global') ?>
<?php
$weather=get_weather('http://api.openweathermap.org/data/2.5/weather?id=587081&appid=2de143494c0b295cca9337e1e96b00e0&units=metric');
?>

       <div class="col-xs-2 col-xs-offset-1 col-md-1 col-md-offset-1 weather_icon">
          <div class="thumbnail">
             <img class="img"  alt="weather" src="<?php echo '/images/icons/weather/'.$weather[1].'.png';?>">
          </div>
        </div>
        <div class="col-xs-3 col-md-2">
            <span class="weather"><?php echo $weather[0].'°C';?></span>
            <?php date_default_timezone_set('Asia/Baku');?>
            <div class="date_time"><?php setlocale(LC_TIME, "az_AZ"); echo strftime("%e, %B %Y");?></div>
            <div class="date_time">Bakı, Azərbaycan</div>
        </div>





