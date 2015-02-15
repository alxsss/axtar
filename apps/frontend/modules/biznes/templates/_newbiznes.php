<?php use_helper('I18N','Text') ?>
   
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
