<?php use_helper('I18N','Text') ?>

  <div class="row">
        <div class="col-xs-2 col-xs-offset-1 col-md-1 col-md-offset-1 weather_icon">
          <div class="thumbnail">
             <img class="img"  alt="weather" src="/images/icons/weather/gun.png">
          </div>
        </div>
        <div class="col-xs-2 col-md-1">
            <span class="weather"><?php include_partial('search/weather')?>°C</span>
            <?php date_default_timezone_set('Asia/Baku');?>
            <div class="date_time"><?php echo date("F j, Y");?></div>
            <div class="date_time">Baki, Azerbaycan</div>
        </div>
        <div class="col-xs-2  col-xs-offset-3  col-md-1 col-md-offset-1">
          <div class="thumbnail">
           <img class="img oil_image"  alt="neft" src="/images/icons/page/neft.png">
          </div>
        </div>
        <div class="col-xs-1  col-md-1">
           <div class="oil_price"> <span class="currency">Brent</span> <?php echo get_oil_price('http://www.oil-price.net/widgets/brent_text/gen.php?lang=en')?></div>
            <div class="oil_price"><span class="currency">WTI</span> <?php echo get_oil_price('http://www.oil-price.net/TABLE3/gen.php?lang=en');?></div>
        </div>
        <div class="col-xs-1 col-md-6"></div>
      </div>




      <div class="row logo_search_box">
        <div class="col-xs-11 col-xs-offset-1 col-md-2 col-md-offset-2">
          <div class="thumbnail">
          <img class="img" width="200" height=100" alt="axtar" src="/images/icons/page/logo.png">
        </div>
        </div>
        <div class="col-xs-11 col-xs-offset-1 col-md-5">

             <div class="veb_image_links">
               <a id="veb" href="<?php echo url_for('@search_search?query='.$sf_request->getParameter('query'))?>"><?php echo __('aznet')?></a>
               <a id="image" href="<?php echo url_for('@search_www?query='.$sf_request->getParameter('query'))?>"><?php echo __('web')?></a>
               <a id="image" href="<?php echo url_for('@xeber_index')?>"><?php echo __('news')?></a>
              <a id="image" href="<?php echo url_for('@image_search?query='.$sf_request->getParameter('query'))?>"><?php echo __('image')?></a>
              <a id="image" href="<?php echo  url_for('@biznes_search?query='.sfOutputEscaper::unescape($sf_request->getParameter('query')))?>"><?php echo __('business')?></a>
            </div>


  <div class="search">
    <form action="<?php echo url_for('@search_search') ?>" method="post" class="search_form">
  <input type="text" name="query" value="<?php echo sfOutputEscaper::unescape($sf_request->getParameter('query')) ?>" id="search_keywords" class="search_keywords_responsive"  onfocus="this.value = this.value;" />
      <input type="submit" value="axtar" id="search_button" />
    </form>
  </div>

        </div>
        <div class="col-xs-0 col-md-3"></div>
      </div>


    <div class="row film">
     <div class="col-md-1"></div>
    <?php for($i=0; $i<10;$i++){?>
     <div class="col-xs-6 col-md-1">
        <div class="thumbnail">
         <div class="news_keyword"> MTN Emaliyyat</div>
         <img src="/images/icons/page/sample_news.png?" alt="Sample Image">
         <div class="caption">MTN den antirerror emaliyyati</div>
        </div>
      </div>
    <?php }?>
     <div class="col-md-1"></div>
    </div>




