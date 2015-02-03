<?php use_helper('I18N', 'Global') ?>
<div id="updates_left_column">
<div class="user_contact">
  <!--in case if a user is not signed in and album is visible $user_id is not defined-->
  <?php echo link_to($biznes_owner->getUsername().__('\'s profile'), 'user/'.$biznes_owner->getUsername(), 'class=user_links') ?>
  <?php echo link_to(__('All bizness by %author%', array('%author%'=>$biznes_owner->getUsername())),'@all_biznes?username='.$biznes_owner->getUsername(), 'class=user_links')?>
</div> 
<?php if($sf_user->isAuthenticated()):?> 
 <?php //include_component('friends', 'ulinks')?>
<?php else:?>
  <?php //include_partial('home/inhemsinif')?>	    
<?php endif;?>
</div>
<div id="right_column_user">
<div class="all_bizness"><?php echo __('All businesses by %author%', array('%author%'=>$biznes_owner->getUsername()))?></div>
  <div class="friends_to_be_invited">
    <div class="friends_to_be_invited_line"><?php $cnt=0;?>
    <?php foreach ($bizness->getResults() as $biz): ?>
	  <?php $cnt++;?>
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


 <?php if($cnt==7){echo '</div><div class="friends_to_be_invited_line">';$cnt=0;}?>	
<?php endforeach; ?>
</div>
 <?php if($bizness->haveToPaginate()):?>
<div class="pagination">
  <div id="bizness_pager">
    <?php echo pager_navigation($bizness, '@all_biznes?username='.$biznes_owner->getUsername().'&page='.$page ) ?>
  </div>
</div>
<?php endif;?>
</div>
</div>
<?php include_partial('friends/horizontal_ad')?>
