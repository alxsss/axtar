  <div class="logo_small">
    <img src="/images/logo_pic_small.png" alt="axtar" title="axtar">
 </div>
<div class="search_small">
 <div class="help"></div>
<form action="<?php echo url_for('@image_search') ?>" method="post">
  <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" class="search_keywords" size="55" onfocus="this.value = this.value;" />
  <input type="submit" value="axtar" id="search_button" />
  
</form>
</div>
