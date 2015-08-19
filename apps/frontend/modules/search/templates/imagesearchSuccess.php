<?php use_helper('I18N','Text','Global') ?>
<div id="search_results">

<?php include_partial('image_search')?>
<div id="image_results">

    <div id="xeber_results_image">

  <?php if(!empty($spellcheck)):?>  
    <?php echo __('Did you mean %keyword%?', array('%keyword%'=> link_to($spellcheck[0], url_for('@search_search?query='.$spellcheck[0]))));?>
  <?php endif;?>

      <?php $parent_url='';?>
      <?php $mage_id='';?>
      <?php $site='';?>
  <?php $cnt=0;?>
  <?php  
      $update_cnt=0;
      $thumbfile_cnt=0
  ?>
  <div class="image_line">
    <?php foreach ($docs->getRawValue() as $result): ?>
       <?php //$description=sfOutputEscaper::unescape($result['description']);?>
       <?php if(isset($result['parent_url'])){$parent_url=$result['parent_url'];}else{$parent_url='';}?>
       <?php if(isset($result['thumbnail'])){$thumbnail=$result['thumbnail'];}else{$thumbnail='';}?>
      <div class="image">
      <?php $cnt++;?>
        <a href="<?php echo sfOutputEscaper::unescape($parent_url) ?>" target="_blank">
          <img src="data:image/jpg;base64,<?php echo sfOutputEscaper::unescape($thumbnail)?>" title="<?php echo sfOutputEscaper::unescape($parent_url) ?>" />
        </a>
      </div>
      <?php if($cnt==5){echo '</div><div class="image_line">';$cnt=0;}?>
    <?php endforeach; ?>
  </div>
  <div class="pagination">
    <div id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@image_search?query='.$query) ?>
    </div>
  </div>

</div><!--xeber_result-->
 <?php include_component('xeber', 'sponsorads')?>
</div>

</div>
