<style>
.top_news_section{border-bottom: 1px solid #ccc;
    float: left;
    padding: 5px 0 5px 20px;
    width: 750px;
}
.top_news_line {
    float: left;
    height: auto;
}
.top_news_image {
    float: left;
    margin: 5px;
    padding: 5px;
    text-align: center;
    width: 105px;
}
.top_news_image_title {
    font-size: 9px;
    font-weight: bold;
}
.image_with_border {
    border: 1px solid #ccc !important;
    padding: 3px;
}
</style>
<?php
 //get top news from solr
 $rows=2;
 $start=0;
 $axtar_query = new XeberQuery;
 $has_image=false;
?>
<div class="topnews">
  <div class="topnews_title"><?php echo __('Top News')?></div>

          <div class="top_news_section">
            <div class="top_news_line">
  <?php foreach($acar_sozler as $soz):?>
    <?php  $jsondata = $axtar_query->runQuery(trim($soz->getKeyphrase()), $start, 4, $rows);?>
    <?php  if($jsondata):?>
      <?php $json = json_decode($jsondata, true); ?>
      <?php  $results = $json['response']['docs'];?>

       <?php foreach($results as $doc):?>
           <?php  if(isset($doc['title'])){$title = $doc['title'];}else {continue;}?>
          <?php  if(isset($doc['imageurl'])){$imageurl = $doc['imageurl'];$has_image=true;}else {continue ;}?>
              <div class="top_news_image">
                <div class="top_news_image_title"><?php echo trim($soz->getKeyphrase())?></div>
                  <a target="_blank" href="<?php echo url_for('@xeber_search?query="'.trim($soz->getKeyphrase()).'"');?> ">
                    <img class="image_with_border" width="100" src="<?php echo $imageurl?>" alt="no img">
                  </a>
                </div>
          <?php  if($has_image){break;}?>
      <?php endforeach;?>

    <?php endif;?>
  <?php endforeach;?>
             </div>
         </div>
</div>
