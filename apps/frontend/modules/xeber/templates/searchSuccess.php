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
      <div class="title_acar_sozler"><?php //echo __('Most frequent keywords');?> </div>
      <?php foreach($acar_sozler as $acar_soz):?>
        <div class="acar_soz"> <?php echo link_to($acar_soz->getKeyphrase(),'@xeber_search?query='.$acar_soz->getKeyphrase());?></div>
      <?php endforeach;?>
    </div>
<!-- Generate the date picker input field -->
    <!-- The parameter represents the name & id of the input field generated -->
    <?php //echo $cal->RenderAjax("mydate")?>

    <div id="xeber_results">

      <?php foreach($results->doc as $result): ?>
        <?php $str=$result->str;?>
        <?php $date=$result->date;?>
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
      }
      $azdate='';
      ?>  
      
      <?php $content=$axtar_xml->xpath("//lst[@name='highlighting']/lst[@name='$id']/arr[@name='content']/str");?>
      
       <?php if(!empty($date)):?>     
         <?php $time = strtotime($date); $azdate= date("Y-m-d, H:i", $time); ?>
       <?php endif;?>     
      <h3><a href="<?php echo $url;?>" target="_blank"><?php if(empty($title)){echo truncate_text($url,60);}else{ echo truncate_text(str_replace('<!', '<',$title),60);}?></a></h3>
      <?php if(!empty($content)):?>
       <div class="abstract">
<?php
 echo  truncate_text($content[0],200);?></div>
      <?php endif;?>
      <div class="url"><?php echo truncate_text($url,60);?> </div>
       <div class="xeberdatetime"><?php echo $azdate ?></div>
    <?php endforeach; ?>

 <div class="pagination">
    <div id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@xeber_search?query='.$query) ?>
    </div>
  </div>

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


