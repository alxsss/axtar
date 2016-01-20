 <div class="col-md-12 logo_search_box_xeber">
          <?php include_partial('search/logo')?> 
        <div class="col-xs-10 col-xs-offset-1 col-md-offset-0 col-md-5">

           <div class="col-xs-12">
             <div class="col-xs-2 col-lg-1">
              <a id="image" href="<?php echo url_for('@search_search?query='.$sf_request->getParameter('query'))?>"><?php echo __('aznet')?></a>
             </div>
             <div class="col-xs-2 col-lg-1">
              <a id="image" href="<?php echo url_for('@search_www?query='.$sf_request->getParameter('query'))?>"><?php echo __('web')?></a>
             </div>
             <div class="col-xs-2 col-lg-1">
              <a id="veb" href="<?php echo url_for('@xeber_index')?>"><?php echo __('news')?></a>
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
             <form action="<?php echo url_for('@xeber_search') ?>" method="post" class="search_form">
               <div class="col-xs-12 col-md-10 search_keywords">
                 <div class="col-xs-11 col-md-11">
                    <input type="text" name="query" value="<?php echo sfOutputEscaper::unescape($sf_request->getParameter('query')) ?>"  class="search_input ol-xs-12" id="search_keywords" onfocus="this.value = this.value;" />
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

