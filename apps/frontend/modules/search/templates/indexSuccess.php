<?php use_helper('I18N','Text','Global') ?>

  <div id="first_row" class="row">
    <?php include_partial('search/weather')?>
        <div class="col-xs-2  col-xs-offset-1  col-md-1 col-md-offset-0">
          <div class="thumbnail">
           <img class="img oil_image"  alt="neft" src="/images/icons/page/neft.png">
          </div>
        </div>
        <div class="col-xs-2  col-md-2">
           <div class="row oil_price"> <span class="currency">Brent</span> <?php echo get_oil_price('http://www.oil-price.net/widgets/brent_text/gen.php?lang=en')?></div>
            <div class="row oil_price"><span class="currency">WTI</span> <?php echo get_oil_price('http://www.oil-price.net/TABLE3/gen.php?lang=en');?></div>
        </div>
        <div class="col-xs-1 col-md-5"></div>
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
               <div class="col-xs-12 col-md-10 search_keywords">
                 <div class="col-xs-11 col-md-11">
                    <input type="text" name="query" value="<?php echo sfOutputEscaper::unescape($sf_request->getParameter('query')) ?>"  class="search_input col-xs-12" id="search_keywords" onfocus="this.value = this.value;" />
                 </div>
                 <div class="thumbnail keyboard_input col-xs-1 col-md-1" ><a href="#" class="keyboard"><img src="/images/icons/page/klaviatura.png"></a></div>
               </div>
            <div class="search-button col-xs-7 col-xs-offset-5 col-md-offset-0 col-md-1">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </div>
             </form>
           </div>
        </div>
        <div class="col-xs-offset-1 col-md-3"></div>
      </div>

 <?php include_component('xeber', 'topnewswithimagesmainpage',array('num_news' => 6))?>
 <?php include_component('biznes', 'newbiznessearch')?>
