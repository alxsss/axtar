<style>
.toggle_login{display:none;clear:both;margin:5px 10px;}textarea {
    border: 1px solid #bdc7d8;
    font-family: tahoma,verdana,arial,sans-serif;
    font-size: 12px;
    overflow: auto;
}
.status_box {
    width: 348px;
}
.comments{clear:both;width:350px;_width:352px;float:left;font-size:12px;margin:2px 0;background-color:#EDEFF5;}.comment_text{width:300px;float:left;font-size:11px;padding:2px;}.status_comment_box{margin:0 0 5px 0;float:left;display:none;}.status_comment_photo{float:left;margin:5px; height:30px; width:30px;}.status_comment_photo img{ height:30px; width:30px;}.user_status_photo{width:48px;height:48px;float:left;margin:5px 10px 5px 0;}.user_status{width:475px;float:left;margin:0 0 10px 0;}.show-comment{display:block;}.delete_item{font-size:10px;float:left;margin:0 3px;}.comment_actions{font-size:10px;float:left;margin:3px 0 0 0;}.rate_time{font-size:10px;margin:3px 0 0 15px;}

.product_details{
font-size:16px;
}
.product_title{
font-size: 25px;
    font-weight: bold;
padding: 0 0 5px;
}
.product_address{padding: 5px 0;}
.product_address_title{font-size: 17px;
    font-weight: bold;
    padding: 5px 0;}

.address{padding: 5px 0 10px;}
.product_phone{padding: 5px 0;}
.product_url{
color: #008000;padding: 5px 0;
    font-size: 14px;
}
.similar_products {
font-size:14px;
padding: 20px;
}
#photo {
    font-family: "Times New Roman",Times,serif;
    font-size: 12px;
}
#photo_rating {
    float: left;
}
#biznes_rating {
    float: left;
}
.rating_titles {
    position: relative;
}
.popup {
    background: url("/images/new_tooltip4.png") repeat scroll 0 0 rgba(0, 0, 0, 0);
    color: #ffffff;
    display: none;
    height: 30px;
    left: 750px;
    line-height: 20px;
    padding: 3px 0 5px;
    position: absolute;
    text-align: left;
    text-indent: 10px;
    width: 100px;
    z-index: 1000;
}
.error_message {
    color: #ff0000;
    display: none;
    float: left;
}

.cancel-on-png, .cancel-off-png, .star-on-png, .star-off-png, .star-half-png {
  font-size: 2em;
}

@font-face {
  font-family: "raty";
  font-style: normal;
  font-weight: normal;
  src: url("fonts/raty.eot");
  src: url("fonts/raty.eot?#iefix") format("embedded-opentype");
  src: url("fonts/raty.svg#raty") format("svg");
  src: url("fonts/raty.ttf") format("truetype");
  src: url("fonts/raty.woff") format("woff");
}

.cancel-on-png, .cancel-off-png, .star-on-png, .star-off-png, .star-half-png {
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  font-family: "raty";
  font-style: normal;
  font-variant: normal;
  font-weight: normal;
  line-height: 1;
  speak: none;
  text-transform: none;
}

.cancel-on-png:before {
  content: "\e600";
}

.cancel-off-png:before {
  content: "\e601";
}

.star-on-png:before {
  content: "\f005";
}

.star-off-png:before {
  content: "\f006";
}

.star-half-png:before {
  content: "\f123";
}
</style>
<?php use_helper('I18N','Global','Text') ?>
<?php include_partial('biznes/biznes_search_small')?>
 <div class="col-xs-12 col-md-11 col-md-offset-1">
   <?php foreach($docs as $result): ?>
      <?php $id=$result['id'];?>
      <?php if(isset($result['photo'])){$photo=$result['photo'];}else{$photo='';}?>
      <?php if(isset($result['phone'])){$phone=$result['phone'];}else{$phone=array();}?>
      <?php if(isset($result['website'])){$website=$result['website'];}else{$website='';}?>
      <?php if(isset($result['description'])){$description=$result['description'];}else{$description='';}?>
      <?php if(isset($result['address'])){$address=$result['address'];}else{$address=array();}?>
      <?php if(isset($result['category'])){$category=$result['category'];}else{$category=array();}?>
      <?php if(isset($result['title'])){$title=$result['title'];}else{$title='';}?>
      <?php if(isset($result['email'])){$email=$result['email'];}else{$email='';}?>
      
     

      <div class="col-xs-12 col-sm-9 product_details">
         <div class="col-xs-12 col-sm-5 product" id="<?php echo $id;?>">
          <?php if(!empty($photo)&&$photo!=''):?>
             <a href="<?php echo $website;?>" target="_blank"><img src="<?php echo '/uploads/assets/biznes/'.$photo;?>" class="imageurl_biznes"/></a>
          <?php else:?>
             <a href="<?php echo $website;?>" target="_blank"><img src="/images/no-logo.png" class="imageurl_biznes"/></a>
          <?php endif;?>
         </div>
         <div class="col-sm-5 col-xs-12">
            <div class="product_title"><?php echo sfOutputEscaper::unescape($title);?> </div>
           <?php if(!empty($description)):?>
            <div class="abstract"><?php  echo $description;?></div>
           <?php endif;?>

         <div class="address">
            <div class="product_address_title"> <?php echo __('Address')?></div>
            <div class="product_address"><?php foreach($address as $addr){echo nl2br($addr);}?> </div>
         </div>
          <div class="url"><?php foreach($phone as $ph){echo $ph;}?> </div>
          <?php if($website!=''):?>
             <div class="product_phone"><a target="_blank" href="<?php echo $website?>" ><?php echo $website?></a> </div>
           <?php endif;?>
          <?php if($email!=''):?>
             <div class="product_phone"><b><?php echo $email; ?></b></div>
           <?php endif;?>
         <div class="product_url">
           <?php foreach($category as $cat):?>
             <a href="<?php echo url_for('@biznes_search?query='.$cat)?>"><?php echo $cat?></a>
           <?php endforeach; ?>
         </div>
        </div>
      </div>
    <?php endforeach; ?>

   <!-- Display Similar Producs -->
<?php $sim_product=sfOutputEscaper::unescape($similar_products)?>
<?php if(!empty($sim_product)):?>
<div class="col-xs-12 col-sm-3 similar_products">

  <div class="sponsor_ads_title"><?php echo __('Similar Businesses')?></div>
   <?php foreach($similar_products as $result): ?>
      <?php $similar_biznes_id=$result['id'];?>
      <?php if(isset($result['photo'])){$photo=$result['photo'];}else{$photo='';}?>
      <?php //if(isset($result['phone'])){$phone=$result['phone'];}else{$phone=array();}?>
      <?php //if(isset($result['website'])){$website=$result['website'];}else{$website='';}?>
      <?php //if(isset($result['description'])){$description=$result['description'];}else{$description='';}?>
      <?php //if(isset($result['address'])){$address=$result['address'];}else{$address=array();}?>
      <?php //if(isset($result['category'])){$category=$result['category'];}else{$category=array();}?>
      <?php if(isset($result['title'])){$title=$result['title'];}else{$title='';}?>
<div class="news"> 
      <a href="<?php echo url_for('@showproduct?id='.$similar_biznes_id.'&title='.str_replace(array(' ','.','\'','/','#'),array('-','_','','',''), sfOutputEscaper::unescape($title)))?>">
      <?php if(!empty($photo)&&$photo!=''):?>
           <img class="image_with_border" src="<?php echo '/uploads/assets/biznes/thumbnails/'.$photo;?>" alt="no img">
      <?php else:?>
      
       <?php echo  sfOutputEscaper::unescape($title) ;?>
       <?php endif;?>
    
        </a>
</div>
      <?php //log impression    
/*
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
*/
  ?>
    <?php endforeach; ?>

  </div> <!-- end similar products -->
<?php endif;?>
    <?php 
     /*
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
 */
 ?>
</div>
<!-- COMMENT -->

 <div class="col-xs-11 col-xs-offset-1 col-md-5">
    <div id="add_comment" class="add_status_comment">
      <?php $biznes=BiznesPeer::retrieveByPK($id);?>
      <?php include_partial('comment', array('user_id'=>$user_id, 'biznes' => $biznes, 'comments' =>$biznes->getBiznesCommentsJoinsfGuardUser())) ?>
      <div class="user_status_comment_new"></div>
    </div>
    <?php if ($sf_user->isAuthenticated()): ?>
      <div class="status_comment_box col-md-6" style="display:block;padding:0 0 50px 0px;">
            <form action="<?php echo url_for('@add_biznes_comment')?>" method="post">
               <div class="error_message"><?php echo __('Required.')?></div>   
              <div class="photo_rating col-md-6"  id="biznes_rating"></div>
                   <div class="rating_titles">
                     <div id="popup-1" class="popup" style="position: absolute;left:-7px; top:-40px;"><?php echo __('bad')?></div>
                     <div id="popup-2" class="popup" style="position: absolute;left: 12px; top:-40px;"><?php echo __('poor')?></div>
                     <div id="popup-3" class="popup"  style="position: absolute;left:32px;top:-40px;"><?php echo __('regular')?></div>
                     <div id="popup-4" class="popup" style="position: absolute;left: 50px;top:-40px;"><?php echo __('good')?></div>
                     <div id="popup-5" class="popup" style="position: absolute;left: 70px;top:-40px;"><?php echo __('gorgeus')?></div>
                   </div>
          <input type="hidden" value="<?php echo $biznes->getId()?>"  name="item_id">
          <input type="hidden" value="<?php echo $biznes->getUserId()?>"  name="item_user_id">
                  <input type="hidden" value="1"  name="page">
           <div class="error_message"><?php echo __('Required.')?></div>
          <textarea cols="20" rows="3" class="expand24 status_box" id="comment" name="comment" style="height: 24px; overflow: hidden; padding-top: 0px; padding-bottom: 0px;"></textarea>
          <div class="submit-row">
            <input type="submit" value="<?php echo __('comment')?>" class="status_comment_box_form">
          </div>
        </form>
      </div>
    <?php else: ?>
      <div class="comment">
        <?php echo __('You must ')?><span class="toggle_to_login"><a href="#"><?php echo __('sign in')?></a><?php echo __(' to submit a comment') ?></span>
          </div>
    <?php endif;//endif of comment ?>


</div>
