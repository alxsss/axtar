<?php use_helper('I18N','Text') ?>
<div id="search_results">
  <?php include_partial('biznes_search_small')?>
  <div id="results">

    <div id="xeber_results">
      <div class="notice">
          <div class="biznes_entry_title"><?php echo __('Axtar.az is the most powerful place to search for Businesses by their name, category and address.')?></div>
          <div class="biznes_entry_msg"><?php echo __('If you see your Businesses in the list but you have never added it here, it means it was given to us by a third party. Please add your business with details and the original one will be deleted.')?></div>
      <div class="news_chronology"><a href="<?php echo url_for('biznes/new');?>"><?php  echo __('Add Business');?></a> </div>
      </div>
   
          <div class="biznes_entry_title"><?php echo __('New Businesses')?></div>

          <?php foreach ($biznes->getRawValue() as $result): ?>
          <?php $title=sfOutputEscaper::unescape($result['title']);?>
          <?php $address=sfOutputEscaper::unescape($result['address']);?>
          <?php $photo=$result['photo'];?>
          <?php $phone=$result['phone'];?>
          <?php $category=$result['category'];?>
          <?php $id=$result['id'];?>
          <h3><a href="<?php echo url_for('@showproduct?id='.$id.'&title='.str_replace(array(' ','.'),array('-','_'),$title))?>"><?php echo $title?></a></h3>
          <?php if(!empty($description)):?>
             <?php if(!empty($photo)):?>
               <a href="<?php echo url_for('@showproduct?id='.$id.'&title='.str_replace(array(' ','.'),array('-','_'),$title));?>" target="_blank"><img src="<?php echo '/uploads/assets/biznes/thumbnails/'.$photo;?>" width="75" class="imageurl"/></a>
             <?php endif;?>
             <div class="abstract"><?php  echo $description;?></div>
           <?php endif;?>
          <?php if(!empty($address)):?>
            <div class="abstract"><?php echo $address;?> </div>
          <?php endif;?>
          <?php if(!empty($phone)):?>
            <div class="url"><?php echo $phone;?> </div>
          <?php endif;?>
          
          <?php if(!empty($category)):?>
            <div class="url">
                <a href="<?php echo url_for('@biznes_search?query='.$category)?>"><?php echo $category?></a>
            </div>
          <?php endif;?>
    <?php endforeach; ?>
      </div><!-- xeber_results -->

  </div>

 <?php //include_partial('search/sponsor_ads')?>
</div>


