<?php use_helper('Date', 'Status', 'I18N') ?>
<?php include_partial('sidebar/signin')?>

<?php foreach ($comments as $comment): ?>
 <?php //$rated= BiznesRatePeer::retrieveByPK($id, $user_id); if($rated){$rate=$rated->getRate(); $read_only=1;}else{$rate=0;$read_only='';}?>
   <?php $score= $comment->getScore(); if($score){$read_only=1;}else{$score=0;$read_only='';}?>
  <div class="items comments">
    <?php $photo=$comment->getsfGuardUser()->getProfile()->getPhoto();  if(empty($photo)){$photo='no_pic.gif';} ?>
	<div class="status_comment_photo">
      <?php  echo link_to(image_tag('/uploads/assets/avatars/thumbnails/'.$photo, 'alt=no img'), 'user/'.$comment->getsfGuardUser()->getUsername()) ?>
	</div>
	<?php echo link_to($comment->getsfGuardUser()->getUsername(), 'user/'.$comment->getsfGuardUser()->getUsername()) ?>
	<span class="comment_dates">
      (<?php echo status_date($comment->getCreatedAt('U'), $comment->getCreatedAt('F j, Y'))?>) 
    </span>  
  
    <div class="comment_text">
       <?php if($score):?>
        <div class="photo_rating" read_only="<?php echo $read_only;?>" id="<?php echo $comment->getId()?>" rate="<?php echo $score;?>"></div>
       <?php endif;?>
        <div class="comment_body"><?php echo $comment->getComment() ?></div>
	  <?php if($user_id==$biznes->getUserId()||$user_id==$comment->getUserId()):?> 
	    <div class="delete_item">
          <?php  echo link_to(__('Delete'), '@delete_biznes_comment?id='.$comment->getId()) ?> 
	    </div>		    
     <?php endif;?>
   </div>
  </div>
<?php endforeach; ?>
