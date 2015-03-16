<?php use_helper('Text',  'I18N', 'Status', 'Date')?>
<div id="left_column_user">
<?php include_partial('sfGuardUser/profile_links', array('subscriber' => $subscriber, 'inbox_num_msgs' => $inbox_num_msgs,
'num_requests'=>$num_requests,  'user_id'=>$user_id)) ?>
<?php if($num_friends>0):?>
  <div class="right_boxes_profile">
      <div class="suggestion_title"><?php echo __('Friends') ?>(<?php echo $num_friends?>)</div>
      <div class="group_members">
       <div class="members_line">
         <?php foreach ($user_friends as $i=>$user_friend): ?>
                   <?php $photo=$user_friend->getProfile()->getPhoto();  if(empty($photo)){$photo='no_pic.gif';} ?>
           <div class="group_member">
             <?php  echo link_to(image_tag('/uploads/assets/avatars/thumbnails/'.$photo, 'alt=no img class=border_image'), '@user_profile?username='.$user_friend) ?>
             <div class="group_member_title"><?php echo link_to(mb_substr($user_friend, 0, 9,'UTF-8').'<wbr>'.mb_substr($user_friend, 9, strlen($user_friend), 'UTF-8'),url_for('@user_profile?username='.$user_friend))?>               </div>
          </div>
          <?php if($i==2){echo '</div><div class="members_line">';}?>
        <?php endforeach ?>
       </div><!--members_line-->
             <?php if($num_friends>6):?>
                   <div class="see_all"><?php echo link_to(__('see all'), '@all_friends?username='.$username)?></div>
                 <?php endif;?>
      </div>
    </div>
         <?php endif;?>
</div>	
<div id="right_column_user">
  <div id="updates_profile_right_column"> 
  <!--information section -->
   <div class="profile_section">
    <span class="recent_activity"><?php echo __('Information')?></span>
	  <div class="activity_element">
       <?php echo __($subscriber->getProfile()->getSex())?>, 
       <?php echo floor ((time()-$subscriber->getProfile()->getBirthday('U'))/(24*365*3600))?> <?php echo __('years old')?>
	 </div>
       <?php $website=$subscriber->getProfile()->getWebsite()?>
	  <?php if(!empty($website)):?>
	    <div class="activity_element"><?php echo __('Website: ')?><?php echo $website?></div>
      <?php endif;?>
	   <?php if(!empty($status)):?> 
	      <div class="activity_element">
           <?php echo __('Marital Status').': '.__($status)?>  
		 </div>
       <?php endif;?> 	 
  </div>
  
  <!--end of information section--> 
   <?php if($num_biznes>0&&$username!='admin'):?>
    <div class="profile_section">
    <span class="recent_activity"><?php echo __('Businesses')?>(<?php echo $num_biznes?>)</span>
    <div class="friends_to_be_invited_line_profile">
     <?php foreach ($biznes as $biz): ?>
      <?php if($biz->getPhoto()!=''):?>
          <?php $pic_url='/uploads/assets/biznes/thumbnails/'.$biz->getPhoto()?>
          <div class="user_friend">
		   <a href="<?php echo url_for('@showproduct?id='.$biz->getId().'&title='.str_replace(array(' ','.'),array('-','_'),$biz->getTitle()));?>"><?php echo image_tag($pic_url, 'alt=no img class=image_with_border')?></a>         
         </div>
      <?php else : ?>
         <div class="user_friend">
             <a href="<?php echo url_for('@showproduct?id='.$biz->getId().'&title='.str_replace(array(' ','.'),array('-','_'),$biz->getTitle()))?>"><?php echo $biz->getTitle()?></a>
         </div> 
    <?php endif;?>
      <?php if($user_id==$subscriber_id):?>
       <a href="<?php echo url_for('biznes/edit?id='.$biz->getId().'&token='.$subscriber->getSalt())?>"><img src="/images/edit.png" title="<?php echo __('edit')?>" alt="<?php echo __('edit')?>"></a>
     <?php endif;?>

    <?php endforeach; ?>
   </div>	
    <?php if($num_biznes>5):?>
      <div class="see_all_profile"><?php echo link_to(__('see all'), '@all_biznes?username='.$username)?> </div> 
    <?php endif;?>
 
  </div> 
    <?php endif;?>
  
  </div><!--updates_status_right_column-->

   <div class="right_ad_boxes">
   <script type="text/javascript"><!--
      google_ad_client = "pub-0181717197672047";
      /* 120x600, created 10/7/10 */
      google_ad_slot = "5283049147";
      google_ad_width = 120;
      google_ad_height = 600;
      //-->
    </script>
    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
  </div>
 
</div><!--right_column-->
