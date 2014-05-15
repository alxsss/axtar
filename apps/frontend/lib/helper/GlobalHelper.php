<?php
  function pager_navigation($pager, $uri)
  {
    $navigation = '';
    if ($pager->haveToPaginate())
    {  
      $uri .= (preg_match('/\?/', $uri) ? '&' : '?').'page=';
     // First and previous page
      if ($pager->getPage() != 1)
      {
       $navigation .= link_to(__('First'), $uri.'1');
       $navigation .= link_to(__('Prev'), $uri.$pager->getPreviousPage()).'&nbsp;';
      }
    // Pages one by one
    $links = array();
    foreach ($pager->getLinks() as $page)
    {
      $links[] = link_to_unless($page == $pager->getPage(), $page, $uri.$page);
    }
    $navigation .= join('&nbsp;&nbsp;', $links);
    // Next and last page
    if ($pager->getPage() != $pager->getCurrentMaxLink())
    {
      $navigation .= '&nbsp;'.link_to(__('Next'), $uri.$pager->getNextPage());
      $navigation .= link_to(__('Last'), $uri.$pager->getLastPage());
    } 
  } 
  return $navigation;
}  
 function pager_navigation_feed($pager, $uri, $update)
  {
    $navigation = '';
     if ($pager->haveToPaginate())
    {  
      $uri .= (preg_match('/\?/', $uri) ? '&' : '?').'page=';
 
     // First and previous page
      if ($pager->getPage() != 1)
      {
        $navigation .= link_to_remote(__('Prev'), array('update' => $update, 'url'    => $uri.$pager->getPreviousPage(),
                  'before' => 'hide_submit()', 'complete' => 'show_submit()'
				  )).'&nbsp;';
      }
 
    // Pages one by one
    $links = array();
    foreach ($pager->getLinks() as $page)
    {
      if($page==$pager->getPage())
	  {
	    $links[]=$page;
	  }
	  else
	  {
	    $links[] = link_to_remote($page, array('update' => $update,'url'    => $uri.$page, 'before' => 'hide_submit()',  'complete' => 'show_submit()'
		));
	  }	
	  //$links[] = link_to_unless($page == $pager->getPage(), $page, $uri.$page);
    }
    $navigation .= join('&nbsp;&nbsp;', $links);
    // Next and last page
    if ($pager->getPage() != $pager->getCurrentMaxLink())
    {      
	  $navigation .= '&nbsp;'.link_to_remote('Next', array('update' => $update,'url'    => $uri.$pager->getNextPage(), 'before' => 'hide_submit()',  'complete' => 'show_submit()'
                 ));     
    }
   }
  return $navigation;
}
?>     
