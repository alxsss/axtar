<?php use_helper('I18N','Text') ?>
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
<div id="search_results">
  <?php include_partial('search_smallwww')?>
  <div id="results">
   
    <div id="axtar_results">
    <?php //$spellcheck=$spellcheck->getRawValue();?>
    <?php if(!empty($spellcheck)):?>  
      <?php echo __('Did you mean %keyword%?', array('%keyword%'=> link_to($spellcheck[0], url_for('@search_search?query='.$spellcheck[0]))));?>
    <?php endif;?>

  
  <?php //print_r($xml->web->result);?>

    <?php foreach($xml->web->results->result as $result):?>
      <div> <h3><a href="<?php echo $result->url;?>" target="_blank"><?php echo sfOutputEscaper::unescape($result->title);?></a></h3> </div>
      <div class="abstract"> <?php echo sfOutputEscaper::unescape($result->abstract);?> </div>
      <div class="url"> <?php echo $result->url;?> </div>
    <?php endforeach;?>
  
  <?php if($axtar_feed):?>
    <?php foreach($results as $result): ?>
      <?php $site= $result->str;?>
      <?php $numfound= $result->result->attributes()->numFound;?>
      <?php $str=$result->result->doc->str;?>
      <?php foreach($str as $s){
            if($s->attributes()=='id')
           {
             $id=$s;
           }
           if($s->attributes()=='title')
           {
             $title=$s;
           }
           if($s->attributes()=='url')
           {
             $url=$s;
           }
      }?>  
      
      <?php $content=$axtar_xml->xpath("//lst[@name='highlighting']/lst[@name='$id']/arr[@name='content']/str");?>
      <?php $content=$content->getRawValue();?> 
      <h3><a href="<?php echo $url;?>" target="_blank"><?php if(empty($title)){echo truncate_text($url,60);}else{ echo truncate_text(str_replace('<!', '<',$title),60);}?></a></h3>
      <?php if(!empty($content)):?>
       <div class="abstract"><?php echo str_replace('<!', '<',$content[0]);?></div>
      <?php endif;?>
      <div class="url"><?php echo truncate_text($url,60);?>
        <?php if($numfound>1):?>
          <span class="more_results"><a href="<?php echo url_for('@search_site?query='.$query.'&site='.$site)?>" target="blank"><?php echo __('%numfound% more results from this link', array('%numfound%'=>$numfound));?></a></span>
        <?php endif;?>
      </div>
    <?php endforeach; ?>
  <?php endif;?>

  <?php //if($axtar_feed||empty($spellcheck)):?>
  <div class="pagination">
    <div id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@search_www?query='.$query) ?>
    </div>
  </div>
  <?php // endif;?>

 </div><!-- xeber_results -->
 <?php include_component('xeber', 'sponsorads')?>
</div>

</div>
