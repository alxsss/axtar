<?php use_helper('I18N','Text', 'Global') ?>
<div id="search_results">
  <?php include_partial('search_small')?>
  <div id="results">
     <?php include_component('xeber', 'acarsozler')?>

    <!-- Generate the date picker input field -->
    <!-- The parameter represents the name & id of the input field generated -->
    <?php //echo $cal->RenderAjax("mydate")?>

    <div id="xeber_results">
<div class="news_chronology"><a href="<?php echo url_for('@xeber_index');?>">Xronologiya <?php // echo __('News Chronology');?></a> </div>
<!-- group -->

 <?php foreach($results as $result): ?>
      <?php $title=''; $azdate=''; $imageurl='';?>     
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
      }?>

      <?php $content=$axtar_xml->xpath("//lst[@name='highlighting']/lst[@name='$id']/arr[@name='content']/str");?>
     <?php $content=$content->getRawValue();?> 
<div class="xeber">
      <h3><a href="<?php echo $url;?>" target="_blank"><?php if(empty($title)){echo truncate_text($url,80);}else{/*truncate_text(str_replace('<!', '<',$title),80);*/ echo truncate_text($title,80); }?></a></h3>
      <?php if(!empty($content)):?>
          <?php if(!empty($imageurl)):?>
             <a href="<?php echo $url;?>" target="_blank"><img src="<?php  echo $imageurl;?>" width="75" class="imageurl"/></a>
          <?php endif;?>
       <div class="abstract"><?php echo $content[0];?></div>
      <?php endif;?>
      <div class="url"><?php echo truncate_text($url,80);?>
        <?php if($numfound->getRawValue()>1):?>
          <span class="more_results"><a href="<?php echo url_for('@search_site?query='.sfOutputEscaper::unescape($query).'&site='.$site)?>" target="blank"><?php echo __('%numfound% more results from this link', array('%numfound%'=>$numfound));?></a></span>
        <?php endif;?>
      </div>
       <?php if(!empty($date)):?>     
          <?php $time = strtotime($date); $azdate= date("d-m-Y, H:i", $time); ?> 
          <div class="xeberdatetime"><?php echo $azdate ?></div>
       <?php endif;?>
</div>     
    <?php endforeach; ?>

<!-- -->

 <div class="pagination">
    <div id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@xeber_search?query='.sfOutputEscaper::unescape($query)) ?>
    </div>
  </div>

</div><!-- xeber_results -->
 <?php include_component('xeber', 'sponsorads')?>
</div>

</div>


