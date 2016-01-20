<?php use_helper('I18N','Text') ?>
<div class="col-sm-12">

          <div class="biznes_entry_title"><?php echo __('New Businesses')?></div>

          <?php foreach ($biznes->getRawValue() as $result): ?>
          <?php $title=sfOutputEscaper::unescape($result['title']);?>
          <?php $address=sfOutputEscaper::unescape($result['address']);?>
          <?php $photo=$result['photo'];?>
          <?php $phone=$result['phone'];?>
          <?php $category=$result['category'];?>
          <?php $id=$result['id'];?>
          <span class="acar_soz_search"><a href="<?php echo url_for('@showproduct?id='.$id.'&title='.str_replace(array(' ','.'),array('-','_'),$title))?>"><?php echo $title?></a></span>
    <?php endforeach; ?>

</div>
