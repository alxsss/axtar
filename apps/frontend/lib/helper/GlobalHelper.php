<?php

  function get_weather($url) 
  {
     $weather=array();
     $ch = curl_init();
     $timeout = 0;
     curl_setopt ($ch, CURLOPT_URL, $url);
     curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

     curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
     curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
     $rawdata = curl_exec($ch);
     $jsondata=json_decode($rawdata,true);
     curl_close($ch);
 
     $weather[0]=ceil(trim($jsondata['main']['temp']));
     $weather[1]=trim($jsondata['weather'][0]['icon']);
     return $weather;
  }
  function get_currency($from_Currency, $to_Currency, $amount) 
  {
     $amount = urlencode($amount);
     $from_Currency = urlencode($from_Currency);
     $to_Currency = urlencode($to_Currency);
 
     $url = "http://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";
 
     $ch = curl_init();
     $timeout = 0;
     curl_setopt ($ch, CURLOPT_URL, $url);
     curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
 
     curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
     curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
     $rawdata = curl_exec($ch);
     curl_close($ch);
     $data = explode('bld>', $rawdata);
     $data = explode($to_Currency, $data[1]);
     return round($data[0], 2);
}
  function get_oil_price($url) 
  {
     //$url='http://www.oil-price.net/TABLE3/gen.php?lang=en';

     $ch = curl_init();
     $timeout = 0;
     curl_setopt ($ch, CURLOPT_URL, $url);
     curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

     curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
     curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
     $rawdata = curl_exec($ch);
     $rawdata = str_replace(array("\r\n", "\r", "\n"), '', $rawdata);
     $regex='#.*(\d\d\.\d\d).*(<font.*\d\.\d\d%).*#';
     preg_match($regex, $rawdata, $matches);

     curl_close($ch);
     return '$'.stripslashes($matches[1]).' '.stripslashes($matches[2]).'</font>';
  }



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
      //$navigation .= link_to(__('Last'), $uri.$pager->getLastPage());
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
