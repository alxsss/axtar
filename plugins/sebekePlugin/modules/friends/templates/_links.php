  <div class="user_contact">
	<div class="user_links"><?php echo link_to(__('edit profile'), 'profile/'.$subscriber->getSalt()) ?></div>
	<div class="user_links"><?php echo link_to(__('messages').'('.$inbox_num_msgs.')', '@user_inbox') ?></div>       
    <div class="user_links"><?php /*if($num_friendsRequests) */echo link_to(__('friend requests').'('.$num_friendsRequests.')', 'friends/list') ?></div>
  </div>
