<?php use_helper('I18N','Text') ?>
<?php  function pager_navigation($pager, $uri)
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
?>
<div id="search_results">
  <?php include_partial('search_small')?>
  <div id="results">
    <?php if($axtar_feed):?>
    <?php foreach($results as $result): ?>
      <h3><a href="<?php echo $result['url'];?>" target="_blank"><?php if(empty($result['title'])){echo $result['url'];}else{echo truncate_text($result['title'],60);}?></a></h3> 
      <div class="abstract"><?php echo $result['content'][0];?></div>
      <div class="url"><?php echo  truncate_text($result['url'],60);?></div>
    <?php endforeach; ?>
  <div class="pagination">
    <div id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@search_site?query='.$query.'&site='.$site ) ?>
    </div>
  </div>
 <?php endif;?>
 </div>
<div class="sponsor_ads">
 <div class="sponsor_ads_title"><?php echo __('Sponsor ads')?></div>
  <h3><a href="http://hemsinif.com" target="_blank">hemsinif.com</a></h3>
  Sinif yoldaşlarını, dostalrı tapmaq və onlarla əlaqədə olmaq üçün sosial şəbəkə.
</div>

</div>

