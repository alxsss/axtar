<?php use_helper('I18N', 'Global') ?>
<div id="updates_left_column">
<?php //include_partial('friends/ad200x200')?>
</div>
<div id="right_column_user">
  <div class="friends_to_be_invited">

    <div class="friends_to_be_invited_line"><?php $cnt=0;?>
    <?php foreach ($popular_bizness->getResults() as $popular_biznes): ?>
      <?php $cnt++;?>
      <div class="user_friend">
        <a href="<?php echo url_for('biznes/show?id='.$popular_biznes->getId())?>">
            <?php if($popular_biznes->getPhoto()==true):?>
              <?php echo image_tag('/uploads/assets/bizness/thumbnails/'.$popular_biznes->getPhoto(), 'alt=no img class=image_with_border')?>
            <?php endif;?>
            <?php echo $popular_biznes->getTitle()?>
         </a>	
        <?php if($popular_biznes->getRating()!=0): ?>
          <div class="popular_biznes_title"><?php echo __('rates').'('.$popular_photo->getRating().')'?> </div>
        <?php endif;?>
       </div>	
  
 <?php if($cnt==7){echo '</div><div class="friends_to_be_invited_line">';$cnt=0;}?>	
<?php endforeach; ?>
</div>
 <?php if($popular_bizness->haveToPaginate()):?>
<div class="pagination">
  <div id="bizness_pager">
    <?php echo pager_navigation($popular_bizness, '@bizness') ?>
  </div>
</div>
<?php endif;?>
</div>
</div>
<?php //include_partial('friends/horizontal_ad')?>
