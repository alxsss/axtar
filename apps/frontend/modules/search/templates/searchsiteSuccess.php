<?php use_helper('I18N','Text','Global') ?>
<div id="search_results">
  <?php include_partial('search_smallaznet')?>
  <div id="results">

    <div id="xeber_results">

    <?php if($axtar_feed):?>
    <?php foreach($results as $result): ?>
      <h3><a href="<?php echo $result['url'];?>" target="_blank"><?php if(empty($result['title'])){echo $result['url'];}else{echo truncate_text(sfOutputEscaper::unescape($result['title']),60);}?></a></h3> 
      <div class="abstract"><?php echo sfOutputEscaper::unescape($result['content'][0]);?></div>
      <div class="url"><?php echo  truncate_text($result['url'],60);?></div>
    <?php endforeach; ?>
  <div class="pagination">
    <div id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@search_site?query='.sfOutputEscaper::unescape($query).'&site='.$site ) ?>
    </div>
  </div>
 <?php endif;?>


 </div><!-- xeber_results -->
</div>

  <?php include_partial('sponsor_ads')?>

</div>
