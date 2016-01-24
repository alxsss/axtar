<?php use_helper('I18N','Text','Global') ?>

<?php include_partial('image_search')?>
<div class="col-xs-12 col-md-9 col-md-offset-1" id="image_results">


  <?php if(!empty($spellcheck)):?>  
    <?php echo __('Did you mean %keyword%?', array('%keyword%'=> link_to($spellcheck[0], url_for('@search_search?query='.$spellcheck[0]))));?>
  <?php endif;?>

      <?php $parent_url='';?>
      <?php $image_id='';?>
      <?php $site='';?>
  <?php //$cnt=0;?>
  <?php  
      $update_cnt=0;
      $thumbfile_cnt=0
  ?>
  <div id="image_line" class="col-xs-12">
    <?php foreach ($docs->getRawValue() as $result): ?>
       <?php //$description=sfOutputEscaper::unescape($result['description']);?>
       <?php if(isset($result['parent_url'])){$parent_url=$result['parent_url'];}else{$parent_url='';}?>
       <?php if(isset($result['thumbnail'])){$thumbnail=$result['thumbnail'];}else{$thumbnail='';}?>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="<?php echo sfOutputEscaper::unescape($parent_url) ?>" target="_blank">
          <img class="img-responsive" src="data:image/jpg;base64,<?php echo sfOutputEscaper::unescape($thumbnail)?>" title="<?php echo sfOutputEscaper::unescape($parent_url) ?>" />
        </a>
      </div>
      <?php //$cnt++;?>
      <?php //if($cnt==12){echo '</div><div class="image_line">';$cnt=0;}?>
    <?php endforeach; ?>
  </div>

 </div><!--xeber_result-->
 <div class="col-xs-12 col-md-2">
   <?php include_component('xeber', 'sponsorads')?>
 </div>
  <div class="col-xs-10 col-xs-offset-2 pagination" id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@image_search?query='.$query) ?>
    </div>
