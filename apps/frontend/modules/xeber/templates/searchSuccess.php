<?php use_helper('I18N','Text','Global') ?>
<div id="search_results">
  <?php include_partial('search_small')?>
  <div id="results">
     <?php include_component('xeber', 'acarsozler')?>

    <!-- Generate the date picker input field -->
    <!-- The parameter represents the name & id of the input field generated -->
    <?php //echo $cal->RenderAjax("mydate")?>

    <div id="xeber_results">

      <?php foreach($results->doc as $result): ?>
        <?php $title=''; $azdate=''; $imageurl='';?>     
        <?php $str=$result->str;?>
        <?php $date=$result->date;?>
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
           if($s->attributes()=='imageurl')
           {
             $imageurl=$s;
           }
      }
      ?>  
      
      <?php $content=$axtar_xml->xpath("//lst[@name='highlighting']/lst[@name='$id']/arr[@name='content']/str");?>
      
       <?php if(!empty($date)):?>     
          <?php $time = strtotime($date); $azdate= date("d-m-Y, H:i", $time); ?> 
       <?php endif;?>     
<div class="xeber">
      <h3><a href="<?php echo $url;?>" target="_blank"><?php if(empty($title)){echo truncate_text($url,80);}else{ echo truncate_text($title,80);}?></a></h3>
      <?php if(!empty($content)):?>
          <?php if(!empty($imageurl)):?>
             <a href="<?php echo $url;?>" target="_blank"><img src="<?php echo $imageurl;?>" width="75" class="imageurl"/></a>    
          <?php endif;?>
        <div class="abstract"><?php  echo  $content[0];?></div>
      <?php endif;?>
      <div class="url"><?php echo truncate_text($url,80);?> </div>
       <div class="xeberdatetime"><?php echo $azdate ?></div>
</div>
    <?php endforeach; ?>

 <div class="pagination">
    <div id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@xeber_search?query='.$query) ?>
    </div>
  </div>

</div><!-- xeber_results -->
 <?php include_component('xeber', 'sponsorads')?>
</div>

</div>


