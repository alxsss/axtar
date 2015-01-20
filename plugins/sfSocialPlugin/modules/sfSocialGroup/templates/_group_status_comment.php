<?php use_helper('Status',  'Date') ?>
<?php $status=GroupStatusPeer::retrieveByPk($status_id); 
$comments=$status->getGroupStatusCommentsJoinsfGuardUser()?>
 
<?php foreach ($comments as $comment): ?>
  <div class="comments">
    <?php $photo=$comment->getsfGuardUser()->getProfile()->getPhoto();  if(empty($photo)){$photo='no_pic.gif';} ?>
	<div class="status_comment_photo">
      <?php  echo link_to(image_tag('/uploads/assets/avatars/thumbnails/'.$photo, 'alt=no img width=30px height=30px'), 'user/'.$comment->getsfGuardUser()->getUsername()) ?>
	</div>
	<span class="update_username_comment"><?php echo link_to($comment->getsfGuardUser()->getUsername(), 'user/'.$comment->getsfGuardUser()->getUsername())?></span>
	<span class="comment_dates">
	  (<?php echo status_date($comment->getCreatedAt('U'), format_date($comment->getCreatedAt(), 'p'))?>) 			            
    </span>  
    <div class="comment_text">
	  <div class="comment_body">
	    <?php echo $comment->getComment() ?>
	  </div>
	  <?php if($user_id==$status->getsfSocialGroup()->getUserAdmin()||$user_id==$comment->getUserId()):?> 
	    <div class="delete_comment">
          <?php  echo link_to(__('Delete'), '@delete_group_status_comment?id='.$comment->getId()) ?> 
	    </div>		  
     <?php endif;?>
   </div>
  </div>
<?php endforeach; ?>
