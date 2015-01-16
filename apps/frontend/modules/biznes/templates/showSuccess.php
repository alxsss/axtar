<?php use_helper('I18N','Global','Text') ?>
<div id="search_results">
    <?php //include_component('xeber', 'acarsozler')?>
   <?php foreach($product as $result): ?>
      <?php $photo='';?>
      <?php $phone=array();?>
      <?php $website='';?>
      <?php $description='';?>
      <?php $address=array();?>
      <?php $id='';?>
      <?php $title='';?>
      <?php $str=$result->str;?>
      <?php 
           $seek = array("sm", 135);
           $replace  = array("", 400);
?>
      <?php foreach($str as $s){
           if($s->attributes()=='id')
           {
             $id=$s;
           }
           else if($s->attributes()=='title')
           {
             $title=$s;
           }
           else if($s->attributes()=='description')
           {
             $description=$s;
           }
           else if($s->attributes()=='photo')
           {
             $photo=$s;
           }
           else if($s->attributes()=='website')
           {
             $website=$s;
           }
      }
       ///arr types
       $arrs=$result->arr;
       foreach($arrs as $a)
       {
         if($a->attributes()=='category')
         {
           $category=$a;
         }
         else if($a->attributes()=='address')
         {
           $address=$a;
         }
           else if($s->attributes()=='phone')
           {
             $phone=$s;
           }
        }
        //float types
        $floats=$result->float;
        foreach($floats as $float)
        {
          if($float->attributes()=='price')
          {
            $price=$float;
          }
          else if($float->attributes()=='score')
          {
           $score=$float;
          }
        }
       ?>  
      
     
         <div class="product" id="<?php echo $id;?>">
          <?php if(!empty($photo)&&$photo!=''):?>
             <a href="<?php echo $url;?>" target="_blank"><img src="<?php echo $photo;?>" width="75" class="imageurl_biznes"/></a>
          <?php endif;?>
         </div>

         <div class="product_details">
           <?php if(!empty($description)):?>
            <div class="abstract"><?php  echo $description;?></div>
           <?php endif;?>
         <div class="abstract"><?php foreach($address as $addr){echo $addr;}?> </div>
         <div class="url"><?php foreach($phone as $ph){echo $ph;}?> </div>
         <div class="url">
           <?php foreach($category as $cat):?>
             <a href="<?php echo url_for('@biznes_search?query='.$cat)?>"><?php echo $cat?></a>
           <?php endforeach; ?>
         </div>

         </div>
    <?php endforeach; ?>

    <?php 
         $user_agent=$_SERVER["HTTP_USER_AGENT"];
         if(isset($id)&&!(strpos(strtolower($user_agent),'bot')||in_array($_SERVER['REMOTE_ADDR'],$bot->getRawValue() )) )
         {
           //write CTP to log
           $log = new Logging();

            // set path and name of log file (optional)
           $log->lfile('/home/www/axtar/web/uploads/assets/score_logs/score_log.txt');

           // write message to the log file
           $log->lwrite($id.',CTP,1');
           // close log file
           $log->lclose();
         }
  ?>


   <!-- Display Similar Producs -->
<div class="similar_products">
<h2>Similar Products</h2>
   <?php foreach($similar_products as $result): ?>
      <?php $imageurl='';?>
      <?php $str=$result->str;?>
      <?php foreach($str as $s){
           if($s->attributes()=='id')
           {
             $id=$s;
           }
           else if($s->attributes()=='title')
           {
             $title=$s;
           }
           else if($s->attributes()=='description')
           {
             $description=$s;
           }
           else if($s->attributes()=='photo')
           {
             $photo=$s;
           }
           else if($s->attributes()=='website')
           {
             $website=$s;
           }
      }
       ///arr types
       $arrs=$result->arr;
       foreach($arrs as $a)
       {
         if($a->attributes()=='category')
         {
           $category=$a;
         }
         else if($a->attributes()=='address')
         {
           $address=$a;
         }
        }
        //float types
        $floats=$result->float;
        foreach($floats as $float)
        {
          if($float->attributes()=='price')
          {
            $price=$float;
          }
          else if($float->attributes()=='score')
          {
           $score=$float;
          }
        }
       ?>  
      
     <div class="user_friend">
      <a href="<?php echo url_for('@showproduct?id='.$id.'&title='.str_replace(array(' ','.','\'','/','#'),array('-','_','','',''), sfOutputEscaper::unescape($title)))?>">
      <?php if(!empty($photo)&&$photo!=''):?>
           <img class="image_with_border" src="<?php echo $photo;?>" alt="no img">
      <?php else:?>
      
        <div class="popular_photo_title"><?php echo  sfOutputEscaper::unescape($title) ;?> </div>
       <?php endif;?>
    
        </a>
      </div>
      <?php //log impression    
       $user_agent=$_SERVER["HTTP_USER_AGENT"];
           if(!(strpos(strtolower($user_agent),'bot')||in_array($_SERVER['REMOTE_ADDR'],$bot->getRawValue())) )
           {
             //write IMPRESSIONS to log
             $current_row=2;
             $num_rows=2;
             $weight=$num_rows/($num_rows+($current_row-1));
             $log = new Logging();

             // set path and name of log file (optional)
             $log->lfile('/home/www/axtar/web/uploads/assets/score_logs/score_log.txt');

             // write message to the log file
             $log->lwrite($id.',IMPR,'.round($weight,3).',row:'.$current_row);
             // close log file
             $log->lclose();
           }
  ?>
    <?php endforeach; ?>
</div>

 <?php //include_partial('search/sponsor_ads')?>
</div>



