<?php use_helper('I18N','Global') ?>
  <div id="results">
     <?php //include_component('xeber', 'acarsozler')?>

    <div id="xeber_results">

    <?php foreach ($docs->getRawValue() as $result): ?>
       <?php $title=sfOutputEscaper::unescape($result['title']);?>
       <?php //$description=sfOutputEscaper::unescape($result['description']);?>
       <?php if(isset($result['address'])){$address=$result['address'];}else{$address='';}?>
       <?php if(isset($result['photo'])){$photo=$result['photo'];}else{$photo='';}?>
       <?php if(isset($result['phone'])){$phone=$result['phone'];}else{$phone='';}?>
       <?php if(isset($result['category'])){$category=$result['category'];}else{$category='';}?>
       <?php $id=$result['id'];?>
       <h3><a href="<?php echo url_for('@showproduct?id='.$id.'&title='.str_replace(array(' ','.'),array('-','_'),$title))?>"><?php echo $title?></a></h3>
      <?php if(!empty($description)):?>
          <?php if(!empty($photo)):?>
             <a href="<?php echo $url;?>" target="_blank"><img src="<?php echo $photo;?>" width="75" class="imageurl"/></a>    
          <?php endif;?>
        <div class="abstract"><?php  echo $description;?></div>
      <?php endif;?>
      <?php if(!empty($address)):?>
         <div class="abstract"><?php foreach($address as $addr){echo $addr;}?> </div>
      <?php endif;?>
      <?php if(!empty($phone)):?>
         <div class="url"><?php foreach($phone as $ph){echo $ph;}?> </div>
      <?php endif;?>
      <?php if(!empty($category)):?>
      <div class="url">
       <?php foreach($category as $cat):?>
         <a href="<?php echo url_for('@biznes_search?query='.$cat)?>"><?php echo $cat?></a>
       <?php endforeach; ?> 
      </div>
      <?php endif;?>
    <?php endforeach; ?>

 <div class="pagination">
    <div id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@biznes_search?query='.$query) ?>
    </div>
  </div>

</div><!-- xeber_results -->

 <?php include_partial('search/sponsor_ads')?>
</div>


