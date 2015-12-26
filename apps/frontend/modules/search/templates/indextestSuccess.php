<?php use_helper('I18N','Text') ?>

  <div class="row">
        <div class="col-xs-2 col-xs-offset-1 col-md-1 col-md-offset-1 weather_icon">
          <div class="thumbnail">
             <img class="img"  alt="weather" src="/images/icons/weather/gun.png">
          </div>
        </div>
        <div class="col-xs-3 col-md-1">
            <span class="weather"><?php include_partial('search/weather')?>°C</span>
            <?php date_default_timezone_set('Asia/Baku');?>
            <div class="date_time"><?php echo date("F j, Y");?></div>
            <div class="date_time">Baki, Azerbaycan</div>
        </div>
        <div class="col-xs-2  col-xs-offset-1  col-md-1 col-md-offset-1">
          <div class="thumbnail">
           <img class="img oil_image"  alt="neft" src="/images/icons/page/neft.png">
          </div>
        </div>
        <div class="col-xs-2  col-md-1">
           <div class="oil_price"> <span class="currency">Brent</span> <?php echo get_oil_price('http://www.oil-price.net/widgets/brent_text/gen.php?lang=en')?></div>
            <div class="oil_price"><span class="currency">WTI</span> <?php echo get_oil_price('http://www.oil-price.net/TABLE3/gen.php?lang=en');?></div>
        </div>
        <div class="col-xs-1 col-md-6"></div>
      </div>


      <div class="row logo_search_box">
        <div class="col-xs-12  col-md-2 col-md-offset-2">
          <div class="thumbnail">
           <img class="img" width="200" height=100" alt="axtar" src="/images/icons/page/logo.png">
          </div>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-md-offset-0 col-md-5">

           <div class="col-xs-12 veb_image_links">
             <div class="col-xs-2 col-lg-1">
              <a id="veb" href="<?php echo url_for('@search_search?query='.$sf_request->getParameter('query'))?>"><?php echo __('aznet')?></a>
             </div> 
             <div class="col-xs-2 col-lg-1">
              <a id="image" href="<?php echo url_for('@search_www?query='.$sf_request->getParameter('query'))?>"><?php echo __('web')?></a>
             </div> 
             <div class="col-xs-2 col-lg-1">
              <a id="image" href="<?php echo url_for('@xeber_index')?>"><?php echo __('news')?></a>
             </div> 
             <div class="col-xs-2 col-lg-1">
              <a id="image" href="<?php echo url_for('@image_search?query='.$sf_request->getParameter('query'))?>"><?php echo __('image')?></a>
             </div> 
             <div class="col-xs-2 col-lg-1">
              <a id="image" href="<?php echo url_for('@biznes_search?query='.sfOutputEscaper::unescape($sf_request->getParameter('query')))?>"><?php echo __('business')?></a>
            </div>
             <div class="col-xs-2  col-lg-7">
             </div> 
          </div> 

            <div class="col-xs-12 col-md-12">
             <form action="<?php echo url_for('@search_search') ?>" method="post" class="search_form">
               <div class="col-xs-12 col-md-10 search_keywords_responsive">
                 <div class="col-xs-11 col-md-11">
                    <input type="text" name="query" value="<?php echo sfOutputEscaper::unescape($sf_request->getParameter('query')) ?>"  class="col-xs-12" id="search_keywords" onfocus="this.value = this.value;" />
                 </div>
                 <div class="thumbnail keyboard_input col-xs-1 col-md-1" ><a href="#" class="keyboard"><img src="/images/icons/page/klaviatura.png"></a></div>
               </div>
            <div class="col-xs-7 col-xs-offset-5 col-md-offset-0 col-md-1">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </div>
             </form>
           </div>
        </div>
        <div class="col-xs-offset-1 col-md-3"></div>
      </div>

 <?php include_component('xeber', 'topnewswithimages')?>
