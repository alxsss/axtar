<div class="search_main_page">
<div class="logo">
  <img src="/images/logo.png" alt="axtar" title="axtar">
</div>
  <div class="search">
    <div class="help"></div>
    <form action="<?php echo url_for('@search_search') ?>" method="post">
      <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" class="search_keywords" size="55" onfocus="this.value = this.value;" />
      <input type="submit" value="axtar" id="search_button" />
    </form>
  </div>
  <?php // include_partial('search')?>
</div>
