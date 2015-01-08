  <div class="logo_small">
    <img src="/images/logo_pic_small.png" alt="axtar" title="axtar">
 </div>
 <div id="veb_image_links_small">
  <a id="image" href="<?php echo url_for('@search_search?query='.sfOutputEscaper::unescape($sf_request->getParameter('query')))?>"><?php echo __('aznet')?></a>
  <a id="image" href="<?php echo url_for('@search_www?query='.sfOutputEscaper::unescape($sf_request->getParameter('query')))?>"><?php echo __('web')?></a>
  <a id="image" href="<?php echo url_for('@xeber_search?query='.sfOutputEscaper::unescape($sf_request->getParameter('query')))?>"><?php echo __('news')?></a>  
  <a id="veb" href="<?php echo url_for('@image_search?query='.sfOutputEscaper::unescape($sf_request->getParameter('query')))?>"><?php echo __('image')?></a>
</div>

<div class="search_small">
 <div class="help"></div>
<form action="<?php echo url_for('@image_search') ?>" method="post">
  <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" class="search_keywords" size="55" onfocus="this.value = this.value;" />
  <input type="submit" value="axtar" id="search_button" />
  
</form>
</div>
