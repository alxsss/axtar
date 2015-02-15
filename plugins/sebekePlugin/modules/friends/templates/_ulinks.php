<div class="user_contact">
  <a href="<?php echo url_for('profile/'.$subscriber->getSalt())?>" class="user_links  <?php if($sf_params->get('module')=='profile'){echo 'selected_link';}?>"><?php echo  __('edit profile')?></a>
  <a href="<?php echo url_for('@user_inbox')?>"  class="user_links <?php if($sf_params->get('module')=='message'){echo 'selected_link';}?>"> <?php echo  __('messages').($inbox_num_msgs?'(<span class="ulinks_color">'.$inbox_num_msgs.'</span>)':'')?></a>       
  <a href="<?php echo url_for('friends/list')?>" class="user_links <?php if($sf_params->get('module')=='friends'&&$sf_params->get('action')=='list'){echo 'selected_link';}?>"> <?php echo __('suggestions').($num_requests?'(<span class="ulinks_color">'.$num_requests.'</span>)':'')?></a>
</div>
