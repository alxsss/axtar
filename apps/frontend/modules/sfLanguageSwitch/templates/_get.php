<div id="language_select">
<ul id="lang">
  <?php foreach($sf_data->getRaw('languages') as $language => $information): ?>
    <?php if($language == $sf_user->getCulture())
	      {
		    $class='active';
		  }
		  else
		  {
		    $class='';
		  } 
	?>
    <li>
      <?php echo link_to(image_tag($information['image'], array('alt' => $information['title'], 'title' => $information['title'] )
	                     ).' <span class='.$class.'>'.$information['title'].'</span>',
                          $current_module . '/' . $current_action . $information['query']
      )?>
    </li>
  <?php endforeach; ?>
</ul>
</div>