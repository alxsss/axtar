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
  <?php include_partial('search_small')?>
  <div id="results">
    <?php if(!empty($spellcheck)):?>  
      <?php echo __('Did you mean %keyword%?', array('%keyword%'=> link_to($spellcheck[0], url_for('@xeber_search?query='.$spellcheck[0]))));?>
    <?php endif;?>
    <!-- KOMALAR -->
   

    <?php foreach($clusters as $cluster): ?>
      <?php $arr= $cluster->arr;?>
      <?php foreach($arr as $s){
           if($s->attributes()=='labels')
           {
             $labels=$s;
           }
           else if($s->attributes()=='docs')
           {
             $docs=$s;
           }
        }
         echo '<h2>'.$labels->str.'('.count($docs).')</h2>';
         ?>
         <div class="koma">
         <?php
         foreach($docs->str as $doc)
         {
              $document=$axtar_xml->xpath("//doc[str[@name='id']='$doc']");
              $url= (string)$document[0]->str[2];
              $title= (string)$document[0]->str[1];
              $content=$axtar_xml->xpath("//lst[@name='highlighting']/lst[@name='$doc']/arr[@name='content']/str");
         ?>
             <h3><a href="<?php echo $url;?>" target="_blank"><?php if(empty($title)){echo truncate_text($url,60);}else{ echo truncate_text($title,60);}?></a></h3>
            <?php if(!empty($content)):?>
                   <div class="abstract"><?php echo $content[0];?></div>
            <?php endif;?>
            <div class="url"><?php echo truncate_text($url,60);?></div>
        <?php  }  ?>
     </div>
    <?php endforeach; ?>
</div>
 <div class="pagination">
    <div id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@xeber_search?query='.$query) ?>
    </div>
  </div>

<div class="sponsor_ads">
 <div class="sponsor_ads_title"><?php echo __('Sponsor ads')?></div>
 <div class="reklam">
  <h3><a href="http://hemsinif.com" target="blank">hemsinif.com</a></h3>
  Sinif yoldaşlarını, dostları tapmaq və onlarla əlaqədə olmaq üçün sosial şəbəkə.
 </div>
 <div class="reklam">
  <h3><a href="http://accounts.fortatrust.com/aff.php?aff=305" target="blank">Dedicated servers</a></h3>
  Dedicated Server Hosting Starting $29.95
 </div>
</div>

</div>
