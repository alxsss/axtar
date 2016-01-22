<?php use_helper('I18N','Text','Global') ?>
  <?php include_partial('search_smallaznet')?>

 
    <div class="col-md-11 col-md-offset-1 col-xs-12" id="axtar_results">
     <div class="col-xs-12 col-md-10">
    <?php $spellcheck=$spellcheck->getRawValue();?>
    <?php if(!empty($spellcheck)):?>  
      <?php echo __('Did you mean %keyword%?', array('%keyword%'=> link_to($spellcheck[0], url_for('@search_search?query='.$spellcheck[0]))));?>
    <?php endif;?>

    <?php if($axtar_site_feed):?>
      <?php foreach($site_results as $result): ?>
        <?php $site= $result->str;?>
        <?php $str=$result->result->doc->str;?>
        <?php foreach($str as $s){
           if($s->attributes()=='id')
           {
             $id=$s;
           }
           if($s->attributes()=='url')
           {
             $url=$s;
           }
           if($s->attributes()=='title')
           {
             $title=$s;
           }
  
      }?>  
      
      <?php $content=$axtar_site_xml->xpath("//lst[@name='highlighting']/lst[@name='$id']/arr[@name='content']/str");?>
     <?php $content=$content->getRawValue();?>

  <div id="xeber_row" class="row">

        <div class="col-xs-12">

        <div class="news_title">
           <a href="<?php echo $url;?>" target="_blank"><?php if(empty($title)){echo truncate_text($url,60);}else{echo truncate_text(str_replace('<!', '<',$title),60);}?></a>
        </div>
          <?php if(!empty($content)):?>
            <div class="abstract"><?php echo str_replace('<!', '<',$content[0]);?></div>
          <?php endif;?>
          <div class="url"><?php echo truncate_text($url,60);?></div>
        </div>
      </div><!--close inner row-->
    <?php endforeach; ?>

  <?php endif;?>


  <?php if($axtar_feed):?>
    <?php foreach($results as $result): ?>
      <?php $site= $result->str;?>
      <?php $numfound= $result->result->attributes()->numFound;?>
      <?php $str=$result->result->doc->str;?>
      <?php foreach($str as $s){
            if($s->attributes()=='id')
           {
             $id=$s;
           }
           if($s->attributes()=='title')
           {
             $title=$s;
           }
           if($s->attributes()=='url')
           {
             $url=$s;
           }
      }?>  
      
      <?php $content=$axtar_xml->xpath("//lst[@name='highlighting']/lst[@name='$id']/arr[@name='content']/str");?>
      <?php $content=$content->getRawValue();?> 
       <div id="xeber_row" class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="news_title">
            <a href="<?php echo $url;?>" target="_blank"><?php if(empty($title)){echo truncate_text($url,60);}else{ echo truncate_text(str_replace('<!', '<',$title),60);}?></a>
          </div>
          <?php if(!empty($content)):?>
            <div class="abstract"><?php echo str_replace('<!', '<',$content[0]);?></div>
          <?php endif;?>
          <div class="url"><?php echo truncate_text($url,60);?>
            <?php if($numfound->getRawValue()>1):?>
              <span class="more_results"><a href="<?php echo url_for('@search_site?query='.sfOutputEscaper::unescape($query).'&site='.$site)?>" target="blank"><?php echo __('%numfound% more results from this link', array('%numfound%'=>$numfound));?></a></span>
            <?php endif;?>
          </div>
        </div>
      </div><!--close inner row-->
    <?php endforeach; ?>
  <?php endif;?>

  
  <?php if($feed_feed):?>
    <?php foreach($xml->web->results->result as $result):?>
       <?php $title=$result->title->getRawValue();?> 
       <div id="xeber_row" class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="news_title"><a href="<?php echo $result->url;?>" target="_blank"><?php echo $title;?></a></div>
           <?php $abstract=$result->abstract->getRawValue();?> 
           <div class="abstract"> <?php echo $abstract;?> </div>
           <div class="url"> <?php echo $result->url;?> </div>
         </div>
      </div><!--close inner row-->
    <?php endforeach;?>
  <?php endif;?>
  <?php // endif;?>
  </div> <!--close class col-md-8-->
  <div class="col-xs-6 col-md-2">
    <?php include_component('xeber', 'sponsorads')?>
  </div>
</div> <!--close class col-md-12-->

    <div class="col-xs-10 col-xs-offset-2 pagination" id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@search_search?query='.sfOutputEscaper::unescape($query)) ?>
    </div>



