<?php
 //get top news from solr
 $rows=1;
 $start=0;
 $axtar_query = new XeberQuery;
?>
<div class="topnews">
  <div class="topnews_title"><?php echo __('Top News')?></div>

  <?php foreach($acar_sozler as $soz):?>
    <?php  $jsondata = $axtar_query->runQuery(trim($soz->getKeyphrase()), $start, 4, $rows);?>
    <?php  if($jsondata):?>
      <?php $json = json_decode($jsondata, true); ?>
      <?php  $results = $json['response']['docs'];?>
      <?php  if(isset($results[0]['title'])){$title = $results[0]['title'];}else {continue;}?>
      <?php  //$title = str_replace(array('“','”','\n'),array('','',' '),$title);?>
      <?php $title = trim(preg_replace('/\s+/', ' ', $title));?>
      <div class="news"> <a target="_blank" href="<?php echo url_for('@xeber_search?query="'.trim($soz->getKeyphrase()).'"');?> "><?php echo  truncate_text($title,40);?></a> </div> 
    <?php endif;?>
  <?php endforeach;?>
</div>
