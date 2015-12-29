<?php
 //get top news from solr
 $rows=5;
 $start=0;
 $axtar_query = new XeberQuery;
 $has_image=false;
 $thumbnail ='';
 $num_images=12/$num_news;
?>

  <div class="row film">

 <?php foreach($acar_sozler as $i=>$soz):?>
    <?php //if($i<3){continue;}?>
    <?php  $jsondata = $axtar_query->runQuery(trim($soz->getKeyphrase()), $start, 4, $rows);?>
    <?php  if($jsondata):?>
      <?php $json = json_decode($jsondata, true); ?>
      <?php  $results = $json['response']['docs'];?>

       <?php foreach($results as $doc):?>
          <?php  if(isset($doc['title'])){$title = $doc['title'];}else {continue;}?>
          <?php  if(isset($doc['thumbnail'])){$thumbnail = $doc['thumbnail'];$has_image=true;}else {continue ;}?>
          <?php  if($has_image){break;}?>
      <?php endforeach;?>
          <div class="col-xs-6 col-xm-4 col-md-<?php echo $num_images;?>">
            <div class="news_thumbnail">
             <a target="_blank" href="<?php echo url_for('@xeber_search_test?query='.trim($soz->getKeyphrase()));?> ">

              <div class="news_keyword"> <?php echo trim($soz->getKeyphrase())?></div>
               <?php  if($thumbnail=='')
                       {
                         echo '<img src="/images/icons/page/sample_news.png" />';
                       }
                       else
                       { ?>
                         <img src="data:image/jpg;base64,<?php echo sfOutputEscaper::unescape($thumbnail)?>"  />
                       <?php $thumbnail='';}?>
              <div class="carousel-caption"><p><?php echo $title?></p></div>
           </div>
          </a>
         </div>

    <?php endif;?>
  <?php endforeach;?>

    </div>
