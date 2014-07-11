<?php use_helper('I18N','Text') ?>
<style>
#veb_image_links{float: left;width: 485px;}
#veb {
    color: #000000;
    cursor: pointer;
    display: block;
    float: left;
    font-weight: bold;
    padding: 0 10px 0 0;
    text-decoration: none;
}
#image {
    color: #3B5998;
    cursor: pointer;
    display: block;
    float: left;
    font-weight: bold;
    padding: 0 10px 0 0;
    text-decoration: none;
}
</style>
<div class="search_main_page">
<div class="logo">
  <img src="/images/logo.png" alt="axtar" title="axtar">
</div>
<!--
 <div id="veb_image_links">
  <a id="veb" href="<?php echo url_for('@search_search?query='.$sf_request->getParameter('query'))?>"><?php echo __('web')?></a>
  <a id="image" href="<?php echo url_for('@image_search?query='.$sf_request->getParameter('query'))?>"><?php echo __('image')?></a>
</div>
-->
  <div class="search">
    <div class="help"></div>
    <form action="<?php echo url_for('search/searchtest') ?>" method="post">
      <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" class="search_keywords" size="55" onfocus="this.value = this.value;" />
      <input type="submit" value="axtar" id="search_button" />
    </form>
  </div>
  <?php // include_partial('search')?>
</div>

