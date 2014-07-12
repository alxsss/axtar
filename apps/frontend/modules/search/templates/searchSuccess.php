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
   <div id="acar_sozler">
      <?php // foreach($acar_sozler as $acar_soz):?>
        <div class="acar_soz"> <?php // echo link_to($acar_soz->getKeyphrase(),'@xeber_search?query='.$acar_soz->getKeyphrase());?></div>
      <?php // endforeach;?>
    </div>
   
    <div id="xeber_results">

    <?php if(!empty($spellcheck)):?>  
      <?php echo __('Did you mean %keyword%?', array('%keyword%'=> link_to($spellcheck[0], url_for('@search_search?query='.$spellcheck[0]))));?>
    <?php endif;?>
    <?php if($axtar_site_feed):?>
      <?php foreach($site_results as $result): ?>
        <?php $site= $result->str;?>
        <?php $str=$result->result->doc->str;?>
        <?php foreach($str as $s){
           if($s->attributes()=='id')
           {
             $id=$s;
           }
           if($s->attributes()=='url')
           {
             $url=$s;
           }
           if($s->attributes()=='title')
           {
             $title=$s;
           }
  
      }?>  
      
      <?php $content=$axtar_site_xml->xpath("//lst[@name='highlighting']/lst[@name='$id']/arr[@name='content']/str");?>
      <?php //$title=$axtar_site_xml->xpath("//lst[@name='highlighting']/lst[@name='$id']/arr[@name='title']/str");?>
      <h3><a href="<?php echo $url;?>" target="_blank"><?php if(empty($title)){echo truncate_text($url,60);}else{echo truncate_text(str_replace('<!', '<',$title),60);}?></a></h3>
      <?php if(!empty($content)):?>
       <div class="abstract"><?php echo str_replace('<!', '<',$content[0]);?></div>
      <?php endif;?>
      <div class="url"><?php echo truncate_text($url,60);?></div>
    <?php endforeach; ?>
  <?php endif;?>
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

 </div><!-- xeber_results -->
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
