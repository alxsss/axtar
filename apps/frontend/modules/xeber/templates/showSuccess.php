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
.error_message {
    color: #ff0000;
    display: none;
    float: left;
}
</style>
<?php use_helper('I18N','Global','Text') ?>
<?php include_partial('biznes/biznes_search_small')?>
 <div class="col-xs-12 col-md-11 col-md-offset-1">
   <?php foreach($docs as $result): ?>
      <?php $id=$result['id'];?>
      <?php if(isset($result['imageurl'])){$imageurl=$result['imageurl'];}else{$imageurl='';}?>
      <?php if(isset($result['url'])){$url=$result['url'];}else{$url='';}?>
      <?php if(isset($result['content'])){$content=$result['content'];}else{$content='';}?>
      <?php if(isset($result['title'])){$title=$result['title'];}else{$title='';}?>
      <?php if(isset($result['tstamp'])){$date=$result['tstamp'];}else{$date='';}?>
      <?php if(isset($result['thumbnail'])){$thumbnail=$result['thumbnail'];}else{$thumbnail='';}?>
      <div class="col-xs-12 col-md-9 product_details">
        <div class="news_image">
           <?php if(!empty($imageurl)):?>
              <a href="<?php echo $url;?>" target="_blank">
                <img src="data:image/jpg;base64,<?php echo sfOutputEscaper::unescape($thumbnail)?>" class="img-responsive">
              </a>
           <?php endif;?>
        </div>

        <div class="news_title"><?php echo truncate_text($title,80); ?></div>
          <?php if(!empty($content)):?>
            <div class="abstract"><?php echo $content;?></div>
          <?php endif;?>
          <div class="url"><?php echo __('source');?> <a href="<?php echo $url;?>" target="_blank"><?php echo truncate_text($url,80);?></a> </div>
          <?php if(!empty($date)):?>
             <?php $time = strtotime($date); $azdate= date("d-m-Y, H:i", $time); ?>
             <div class="xeberdatetime"><?php echo $azdate ?></div>
          <?php endif;?>
        
      </div>
    <?php endforeach; ?>

   <!-- Display Similar Producs -->
<?php $sim_product=sfOutputEscaper::unescape($similar_products)?>
<?php if(!empty($sim_product)):?>
<div class="col-xs-12 col-md-5 similar_products">

  <div class="sponsor_ads_title"><?php echo __('Similar Businesses')?></div>
   <?php foreach($similar_products as $result): ?>
      <?php $id=$result['id'];?>
      <?php if(isset($result['photo'])){$photo=$result['photo'];}else{$photo='';}?>
      <?php if(isset($result['title'])){$title=$result['title'];}else{$title='';}?>
 <div class="news"> 
      <a href="<?php echo url_for('@showproduct?id='.$id.'&title='.str_replace(array(' ','.','\'','/','#'),array('-','_','','',''), sfOutputEscaper::unescape($title)))?>">
      <?php if(!empty($photo)&&$photo!=''):?>
           <img class="image_with_border" src="<?php echo '/uploads/assets/biznes/thumbnails/'.$photo;?>" alt="no img">
      <?php else:?>
      
       <?php echo  sfOutputEscaper::unescape($title) ;?>
       <?php endif;?>
    
        </a>
</div>
    <?php endforeach; ?>

  </div> <!-- end similar products -->
<?php endif;?>
</div>
<!-- COMMENT -->

 <div class="col-xs-11 col-xs-offset-1 col-md-5">
    <div id="add_comment" class="add_status_comment">
      <?php $c=new Criteria(); $c->add(XeberCommentPeer::XEBER_ID, $id);?>
      <?php include_partial('comment', array('user_id'=>$user_id,  'comments' =>XeberCommentPeer::doSelectJoinsfGuardUser($c))) ?>
      <div class="user_status_comment_new"></div>
    </div>
    <?php if ($sf_user->isAuthenticated()): ?>
      <div class="status_comment_box" style="display:block;padding:0 0 50px 0px;">
            <form action="<?php echo url_for('@add_xeber_comment')?>" method="post">
               <div class="error_message"><?php echo __('Required.')?></div>   
          <input type="hidden" value="<?php echo $id?>"  name="item_id">
          <input type="hidden" value="1"  name="page">
           <div class="error_message"><?php echo __('Required.')?></div>
          <textarea cols="20" rows="3" class="expand status_box" id="comment" name="comment" style="height: 24px; overflow: hidden; padding-top: 0px; padding-bottom: 0px;"></textarea>
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
