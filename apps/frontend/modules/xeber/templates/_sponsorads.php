<div class="sponsor_ads">
  <div class="sponsor_ads_title"><?php echo __('Sponsor ads')?></div>
    <?php foreach ($sponsors->getRawValue() as $sponsor): ?>
      <div class="reklam">
         <div class="acar_soz"><a href="<?php echo $sponsor['url'];?>" target="blank"><?php echo $sponsor['url'];?></a></div>
          <?php echo $sponsor['description'];?>
      </div>
    <?php endforeach;?>
</div>

