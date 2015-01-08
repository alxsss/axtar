<?php use_helper('Date', 'Global', 'I18N') ?>
<div id="left_column_user">
  <div class="user_contact">
  </div> 
</div>
<div id="right_column_user">
    <div id="show_photo">
           <?php $img_url_normal='/uploads/assets/biznes/normal/'.$biznes->getPhoto()?>
      <div id="photo">
        <div class="photo_title"><?php echo $biznes->getTitle()?></div>
        <?php echo image_tag($img_url_normal, '')?>
        <?php echo $biznes->getAddress()?>
        <?php echo $biznes->getPhone()?>
        <?php echo $biznes->getWebsite()?>
         <span class="interested_block"><?php include_partial('biznes_rates', array('biznes' => $biznes)) ?></span>
        <?php //$biznes_owner=$biznes->getsfGuardUser()->getUsername();?>
        <?php echo __('uploaded on')?> <?php echo format_date($biznes->getCreatedAt(), 'p') ?>
        <?php //$biznes_owner_id=$biznes->getUserId();?>	
        <?php if($sf_user->isAuthenticated()&&($biznes_owner_id==$user_id)):?>
          <?php echo link_to(__('edit photo'), 'biznes/edit?id='.$biznes->getId());?> 
        <?php  endif;?>
         <span class="interested_block"><?php include_partial('favorite', array('biznes' => $biznes)) ?></span> 

		<?php $rated= BiznesRatePeer::retrieveByPK($biznes->getId(), $user_id); if($rated){$rate=$rated->getRate(); $read_only=1;}else{$rate=0;$read_only='';}?>
		 <div id="photo_rating" read_only="<?php echo $read_only;?>" photo_id="<?php echo $biznes->getId()?>" rate="<?php echo $rate;?>"></div>        
		   <div class="rating_titles">
		     <div id="popup-1" class="popup" style="position: absolute;left:-7px; top:-40px;"><?php echo __('bad')?></div>
		     <div id="popup-2" class="popup" style="position: absolute;left: 12px; top:-40px;"><?php echo __('poor')?></div>
		     <div id="popup-3" class="popup"  style="position: absolute;left:32px;top:-40px;"><?php echo __('regular')?></div>
		     <div id="popup-4" class="popup" style="position: absolute;left: 50px;top:-40px;"><?php echo __('good')?></div>
		     <div id="popup-5" class="popup" style="position: absolute;left: 70px;top:-40px;"><?php echo __('gorgeus')?></div>
		   </div>
	  </div> 
    </div> 
    <div id="add_comment" class="add_status_comment">
      <?php include_partial('comment', array('user_id'=>$user_id, 'biznes' => $biznes, 'comments' =>$biznes->getBiznesCommentsJoinsfGuardUser())) ?> 
      <div class="user_status_comment_new"></div>  
    </div>
    <?php if ($sf_user->isAuthenticated()): ?>
      <div class="status_comment_box" style="display:block;padding:0 0 50px 10px;">
	    <form action="<?php echo url_for('@add_comment')?>" method="post">
          <input type="hidden" value="<?php echo $biznes->getId()?>"  name="item_id">             
          <input type="hidden" value="<?php echo $biznes->getUserId()?>"  name="item_user_id">	   
		  <input type="hidden" value="1"  name="page">		 
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
</div><!--end right column-->
<?php //include_partial('friends/horizontal_ad')?>
