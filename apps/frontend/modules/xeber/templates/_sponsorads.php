<div class="sponsor_ads">
  <div class="sponsor_ads_title"><?php echo __('Sponsor ads')?></div>
      <div class="reklam">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- axtar_xeber -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-0181717197672047"
     data-ad-slot="4538756844"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
      </div>
    <?php foreach ($sponsors->getRawValue() as $sponsor): ?>
      <div class="reklam">
         <div class="acar_soz"><a href="<?php echo $sponsor['url'];?>" target="blank"><?php echo $sponsor['url'];?></a></div>
          <?php echo $sponsor['description'];?>
      </div>
    <?php endforeach;?>
</div>

