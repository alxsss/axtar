<?php use_helper('I18N','Global') ?>
<div id="search_results">
  <?php include_partial('biznes_search_small')?>
  <div id="results">
     <?php //include_component('xeber', 'acarsozler')?>

   <div id="acar_sozler">
      <?php // foreach($acar_sozler as $acar_soz):?>
        <div class="acar_soz"> <?php // echo link_to($acar_soz->getKeyphrase(),'@xeber_search?query='.$acar_soz->getKeyphrase());?></div>
      <?php // endforeach;?>
    </div>

    <div id="xeber_results">

    <?php foreach ($docs->getRawValue() as $result): ?>
       <?php $title=sfOutputEscaper::unescape($result['title']);?>
       <?php //$description=sfOutputEscaper::unescape($result['description']);?>
       <?php $address=$result['address'];?>
       <?php //$photo=$result['photo'];?>
       <?php $phone=$result['phone'];?>
       <?php $category=$result['category'];?>
       <?php $id=$result['id'];?>
       <h3><a href="<?php echo url_for('@showproduct?id='.$id.'&title='.str_replace(array(' ','.'),array('-','_'),$title))?>"><?php echo $title?></a></h3>
      <?php if(!empty($description)):?>
          <?php if(!empty($photo)):?>
             <a href="<?php echo $url;?>" target="_blank"><img src="<?php echo $photo;?>" width="75" class="imageurl"/></a>    
          <?php endif;?>
        <div class="abstract"><?php  echo $description;?></div>
      <?php endif;?>
      <div class="abstract"><?php foreach($address as $addr){echo $addr;}?> </div>
      <div class="url"><?php foreach($phone as $ph){echo $ph;}?> </div>
      <div class="url">
       <?php foreach($category as $cat):?>
         <a href="<?php echo url_for('@biznes_search?query='.$cat)?>"><?php echo $cat?></a>
       <?php endforeach; ?> 
      </div>
    <?php endforeach; ?>

 <div class="pagination">
    <div id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@biznes_search?query='.$query) ?>
    </div>
  </div>

</div><!-- xeber_results -->
</div>

 <?php include_partial('search/sponsor_ads')?>
</div>


