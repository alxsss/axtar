<?php use_helper('I18N','Text', 'Global') ?>
 <?php include_component('xeber', 'topnewswithimagesxeber',array('num_news' => 12))?>
 <div class="col-md-12 logo_search_box_xeber">
        <div class="col-xs-12  col-md-2 col-md-offset-2">
          <div class="thumbnail">
           <img class="img" width="140" height="60" alt="axtar" src="/images/icons/page/logo.png">
          </div>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-md-offset-0 col-md-5">

           <div class="col-xs-12">
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
                    <input type="text" name="query" value="<?php echo sfOutputEscaper::unescape($sf_request->getParameter('query')) ?>"  class="col-xs-12" id="search_keywords" onfocus="this.value = this.value;" />
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


<div class="col-xs-12 news_chronology"><a href="<?php echo url_for('@xeber_index');?>">Xronologiya <?php // echo __('News Chronology');?></a> </div>


 <div class="col-xs-12 col-md-12">
   <div class="col-xs-12 col-md-8">

    <?php foreach($results as $result): ?>
      <?php $title=''; $azdate=''; $imageurl='';$thumbnail='';?>     
      <?php $site= $result->str;?>
      <?php $numfound= $result->result->attributes()->numFound;?>
      <?php $str=$result->result->doc->str;?>
      <?php $date=$result->result->doc->date;?>
      <?php foreach($str as $s){
            if($s->attributes()=='id')
           {
             $id=$s;
           }
           else if($s->attributes()=='title')
           {
             $title=$s;
           }
           else if($s->attributes()=='url')
           {
             $url=$s;
           }
           else if($s->attributes()=='imageurl')
           {
             $imageurl=$s;
           }
           else if($s->attributes()=='thumbnail')
           {
             $thumbnail=$s;
           }
      }?>

      <?php $content=$axtar_xml->xpath("//lst[@name='highlighting']/lst[@name='$id']/arr[@name='content']/str");?>
     <?php $content=$content->getRawValue();?> 
     
      <div id="xeber_row" class="row">
        <div class="col-xs-4 col-sm-2 col-md-2">
           <?php if(!empty($imageurl)):?>
              <a href="<?php echo $url;?>" target="_blank"><img src="<?php  echo $imageurl;?>" class="xeber_imageurl"/></a>
           <?php endif;?>
        </div>

        <div class="col-xs-8 col-sm-10 col-md-10">
          
      <div class="news_title"><a href="<?php echo $url;?>" target="_blank"><?php if(empty($title)){echo truncate_text($url,80);}else{echo truncate_text($title,80); }?></a></div>
          <?php if(!empty($content)):?>
            <div class="abstract"><?php echo $content[0];?></div>
          <?php endif;?>
          <div class="url"><?php echo truncate_text($url,40);?>
            <?php if($numfound->getRawValue()>1):?>
              <span class="more_results"><a href="<?php echo url_for('@search_site?query='.sfOutputEscaper::unescape($query).'&site='.$site)?>" target="blank"><?php echo __('%numfound% more results from this link', array('%numfound%'=>$numfound));?></a></span>
            <?php endif;?>
          </div>
          <?php if(!empty($date)):?>     
             <?php $time = strtotime($date); $azdate= date("d-m-Y, H:i", $time); ?> 
             <div class="xeberdatetime"><?php echo $azdate ?></div>
          <?php endif;?>
        </div>     
      </div><!--close inner row-->     
    <?php endforeach; ?>


   </div> <!--close class col-md-8-->
  <div class="col-xs-6 col-md-2">
    <?php include_component('xeber', 'acarsozler')?>
  </div>
  <div class="col-xs-6 col-md-2">
    <?php include_component('xeber', 'sponsorads')?>
  </div>
</div> <!--close class col-md-12-->

    <div class="col-xs-10 col-xs-offset-2" id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@xeber_search?query='.sfOutputEscaper::unescape($query)) ?>
    </div>



