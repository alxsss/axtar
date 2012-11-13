  <div class="logo_small">
    <img src="/images/logo_small.png" alt="axtar" title="axtar">
 </div>
<div class="search">
 <div class="help"></div>
<form action="<?php echo url_for('search/searchtest') ?>" method="post">
  <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" size="55" />
  <input type="submit" value="axtar" id="search_button" />
  
</form>
</div>
