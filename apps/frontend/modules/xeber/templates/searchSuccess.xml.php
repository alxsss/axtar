<?php use_helper('I18N') ?>
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
      //$navigation .= link_to(__('Last'), $uri.$pager->getLastPage());
    }
  }
  return $navigation;
}
?>
<?php include_partial('search_small')?>
<div id="left_col">&nbsp;</div>
<div id="results">
  <?php if(!empty($spellcheck)):?>  
    <?php echo __('Did you mean %keyword%?', array('%keyword%'=> link_to($spellcheck[0], url_for('@search_search?query='.$spellcheck[0]))));?>
  <?php endif;?>
  <?php if($axtar_feed):?>
    <?php foreach($results as $result): ?>
      <?php $numfound= $result->attributes()->numFound;?>
      <?php $str=$result->doc->str;?>
      <?php $url=$str[0];?>
      <?php $site=$str[1];?>
      <?php $title=$str[2];?>
      <?php $content=$axtar_xml->xpath("//lst[@name='highlighting']/lst[@name='$url']/arr[@name='content']/str");?>
      <h3><a href="<?php echo $url;?>" target="_blank"><?php if($title==''){echo $url;}else{echo $title;}?></a></h3>
      <?php if(!empty($content)):?>
       <div class="abstract"><?php echo $content[0];?></div>
      <?php endif;?>
      <div class="url"><?php echo $url;?>
        <?php if($numfound>1):?>
          <span class="more_results"><a href="<?php echo url_for('@search_site?query='.$query.'&site='.$site)?>" target="blank"><?php echo __('%numfound% more results from this link', array('%numfound%'=>$numfound));?></a></span>
        <?php endif;?>
      </div>
    <?php endforeach; ?>
  <?php endif;?>
  <?php //if($feed_feed&&empty($spellcheck)):?>
  <?php if($feed_feed):?>
    <?php foreach($xml->web->results->result as $result):?>
      <div> <h3><a href="<?php echo $result->url;?>" target="_blank"><?php echo $result->title;?></a></h3> </div>
      <div class="abstract"> <?php echo $result->abstract;?> </div>
      <div class="url"> <?php echo $result->url;?> </div>
    <?php endforeach;?>
  <?php endif;?>
 <?php //if($axtar_feed||empty($spellcheck)):?>
  <div class="pagination">
    <div id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@search_search?query='.$query) ?>
      <?php //echo pager_navigation($feed_pager, '@search_search?query='.$query, 'content_main_music') ?>
    </div>
  </div>
  <?php // endif;?>
</div>
<div class="sponsor_ads">
 <div class="sponsor_ads_title"><?php echo __('Sponsor ads')?></div>
  <h3><a href="http://hemsinif.com" target="blank">hemsinif.com</a></h3>
  Sinif yoldaşlarını, dostalrı tapmaq və onlarla əlaqədə olmaq üçün sosial şəbəkə.
</div>
<?php //include_partial('search')?>
