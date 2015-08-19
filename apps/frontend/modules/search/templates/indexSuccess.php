<?php use_helper('I18N','Text') ?>
<div class="search_main_page">
  <?php include_partial('forex')?>
  <?php include_component('xeber', 'topnews')?>

<div class="logo">
  <img src="/images/logo.png?v=1" alt="axtar" title="axtar">
</div>
 <div id="veb_image_links">
  <a id="veb" href="<?php echo url_for('@search_search?query='.$sf_request->getParameter('query'))?>"><?php echo __('aznet')?></a>
  <a id="image" href="<?php echo url_for('@search_www?query='.$sf_request->getParameter('query'))?>"><?php echo __('web')?></a>
  <a id="image" href="<?php echo url_for('@xeber_index')?>"><?php echo __('news')?></a> 
  <a id="image" href="<?php echo url_for('@image_search?query='.$sf_request->getParameter('query'))?>"><?php echo __('image')?></a>
  <a id="image" href="<?php echo  url_for('@biznes_search?query='.sfOutputEscaper::unescape($sf_request->getParameter('query')))?>"><?php echo __('business')?></a>
</div>
  <div class="search">
    <div class="help"></div>
    <form action="<?php echo url_for('@search_search') ?>" method="post" class="search_form">
      <input type="text" name="query" value="<?php echo sfOutputEscaper::unescape($sf_request->getParameter('query')) ?>" id="search_keywords" class="search_keywords" size="55" onfocus="this.value = this.value;" />
      <input type="submit" value="axtar" id="search_button" />
    </form>
  </div>
 <?php include_component('biznes', 'newbiznessearch')?>
<?php //include_component('xeber', 'acarsozlersearch')?>
  <?php // include_partial('search')?>
</div>

<!--
<span class="hasTooltip"><?php echo __('What is this?');?></span>
<div class="hidden">
  <p>  <?php //echo __('These are frequently used keywords in todays news articles. By  clicking on each keyword you can see news articles related to it on the right side, ordered by publication date. Since usually a few articles on the same subject is published, this functionality helps readers to find conceptually related articles.')?></p>
</div>

-->
