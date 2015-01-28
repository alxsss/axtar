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
      <?php  $title = $results[0]['title'];?>
      <?php  $url = $results[0]['url'];?>
      <div class="news"> <a target="_blank" href="<?php echo $url?>"><?php echo $title?></a> </div> 
    <?php endif;?>
  <?php endforeach;?>
</div>
