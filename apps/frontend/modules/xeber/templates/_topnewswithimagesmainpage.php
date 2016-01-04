<?php
 //get top news from solr
 $rows=5;
 $start=0;
 $axtar_query = new XeberQuery;
 $has_image=false;
 $thumbnail ='';
 $num_images=12/$num_news;
?>
<div class="col-md-12">
<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="mainCarousel">
  <div class="carousel-inner">

 <?php foreach($acar_sozler as $i=>$soz):?>
    <?php  $jsondata = $axtar_query->runQuery(trim($soz->getKeyphrase()), $start, 4, $rows);?>
    <?php  if($jsondata):?>
      <?php $json = json_decode($jsondata, true); ?>
      <?php  $results = $json['response']['docs'];?>

       <?php foreach($results as $doc):?>
          <?php  if(isset($doc['title'])){$title = $doc['title'];}else {continue;}?>
          <?php  if(isset($doc['thumbnail'])){$thumbnail = $doc['thumbnail'];$has_image=true;}else {continue ;}?>
          <?php  if($has_image){break;}?>
      <?php endforeach;?>
            <div class="item active">
                   <div class="col-md-2 col-sm-4 col-xs-6">
                    <a target="_blank" href="<?php echo url_for('@xeber_search_test?query='.trim($soz->getKeyphrase()));?> ">
                     <div class="news_keyword"><?php echo trim($soz->getKeyphrase())?></div>
                      <?php  if($thumbnail=='')
                       {
                         echo '<img src="/images/icons/page/sample_news.png" />';
                       }
                       else
                       { ?>
                         <img src="data:image/jpg;base64,<?php echo sfOutputEscaper::unescape($thumbnail)?>" class="img-responsive">
                       <?php $thumbnail='';}?>
              <div class="carousel-caption"><p><?php echo $title?></p></div>

                     </a></div>
            </div>


    <?php endif;?>
  <?php endforeach;?>

 </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
</div>






<script type="text/javascript">
/*
jQuery('.carousel[data-type="multi"] .item').each(function(){
  var next = jQuery(this).next();
  if (!next.length) {
    next = jQuery(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo(jQuery(this));
  
  for (var i=0;i<2;i++) {
    next=next.next();
    if (!next.length) {
    	next = jQuery(this).siblings(':first');
  	}
    
    next.children(':first-child').clone().appendTo(jQuery(this));
  }
});
*/
</script>
