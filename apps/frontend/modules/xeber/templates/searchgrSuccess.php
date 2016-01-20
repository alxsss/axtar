<?php use_helper('I18N','Text', 'Global') ?>
 <?php include_component('xeber', 'topnewswithimagesxeber',array('num_news' => 12))?>
 <?php include_partial('xeber/search_small')?>


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

    <div class="col-xs-10 col-xs-offset-2 pagination" id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@xeber_search?query='.sfOutputEscaper::unescape($query)) ?>
    </div>



