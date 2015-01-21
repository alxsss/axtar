<?php
// auto-generated by sfPropelCrud
// date: 2008/05/28 05:50:45
?>

<div id="fmpsv_player">
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="350" height="170" id="xspf_player" align="middle">
  <param name="allowScriptAccess" value="sameDomain" />
  <param name="movie" value="/js/xspf_player.swf?playlist_url=<?php echo url_for('@generate_playlist?playlist_id='.$playlist_id) ?>&autoload=true&autoplay=true&shuffle=true" />
  <param name="quality" value="high" />
  <param name="bgcolor" value="#e6e6e6" />
  <embed src="/js/xspf_player.swf?playlist_url=<?php echo url_for('@generate_playlist?playlist_id='.$playlist_id) ?>&autoload=true&autoplay=true&shuffle=true" quality="high" bgcolor="#e6e6e6" width="350" height="170" name="xspf_player" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>

<h4>Created by <?php echo link_to($playlist->getSfGuardUser(), 'user/'.$playlist->getSfGuardUser())?>     <?php include_partial('favorite', array('playlist' => $playlist)) ?> 
</h4>
<div id="add_comment">
  <?php include_partial('comment', array('playlist' => $playlist)) ?>  
</div>
</div>

<div id="fmpsv_playlist_info">
 <span class="playlist_name">
<?php echo $playlist->getName()?>
 </span>
<?php $playlist_user_id=$playlist->getUserId(); ?>
<?php if($playlist_user_id==$user_id):?> 
  &nbsp;<?php echo link_to(image_tag('edit.png', 'alt=edit title=edit'), 'playlist/edit?id='.$playlist_id.'&token='.$playlist->getSfGuardUser()->getSalt()) ?>
  &nbsp;<?php echo link_to(image_tag('list.png', 'alt=list title=list'), 'playlist/list') ?> 
<?php endif;?>

<?php if (!empty($playlist_music)): ?>
  <table id="playlist" cellpadding="2" cellspacing="1" border="0">
  <tbody>
    <th>Artist</th><th>Title</th><th>Action</th>
	
     <?php foreach ($playlist_music as $song): ?>
	   <?php if($song->getMusic()->getUserId()>1)
	         {
	           if(!$song->getMusic()->getVisibility())
	           {
	             if($song->getMusic()->getUserId()!=$user_id)
	             {
	   	          continue;
	              }	   
	            }
	         } ?>
			
       <tr>
         <td class="playlist_row"><?php echo $song->getMusic()->getArtist() ?></td>
	     <td class="playlist_row"><?php echo $song->getMusic()->getTitle() ?></td>
	     <td class="playlist_row">
	     <?php if($playlist_user_id==$user_id):?>
		   <?php if($song->getMusic()->getUserId()==$user_id):?>
		     <?php echo link_to(image_tag('edit.png', 'alt=edit title=edit'), 'music/edit?id='.$song->getMusicId())?>
		   <?php endif;?>
  		   <?php echo link_to(image_tag('new.png', 'alt=add title=add to playlist'), 'playlist/list?music_id='.$song->getMusicId())?>
		   <?php // echo link_to(image_tag('new.png', 'alt=add title=add'), 'playlist/list?music_id='.$song->getMusicId())?>
           <?php echo link_to(image_tag('delete.png', 'alt=delete title=delete'), 'editPlaylist/delete?playlist_id='.$song->getPlaylistId().'&music_id='.$song->getMusicId(), 'post=true&confirm=Are you sure?') ?>
  	     <?php else:?>
		   <?php //echo link_to('<input type=submit value=add title="add to playlist">', 'playlist/list?music_id='.$song->getMusicId())?>
	       <?php echo link_to(image_tag('new.png', 'alt=add title=add to playlist'), 'playlist/list?music_id='.$song->getMusicId())?>
	     <?php endif;?>
	    </td>
      </tr>
    <?php endforeach; ?>
	
    </tbody>
    </table>  
<?php endif ;?>
</div>