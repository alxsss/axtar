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
      <?php $title=''; $azdate='';$imageurl=''; $description='';?>
      <?php $str=$result->str;?>
      <?php $date=$result->date;?>
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
           else if($s->attributes()=='description')
           {
             $description=$s;
           }
      }?>  
      
      <?php //$content=$axtar_xml->xpath("//lst[@name='highlighting']/lst[@name='$id']/arr[@name='content']/str");?>
     <?php //$content=$content->getRawValue();?> 
       <?php if(!empty($date)):?>
          <?php $time = strtotime($date); $azdate= date("d-m-Y, H:i", $time); ?>
       <?php endif;?>
<div class="xeber">     
      <h3><a href="<?php echo $url;?>" target="_blank"><?php if(empty($title)){echo truncate_text($url,80);}else{ echo truncate_text($title,80);}?></a></h3>
         <div class="abstract">
           <?php if(!empty($imageurl)):?>
              <a href="<?php echo $url;?>" target="_blank"><img src="<?php echo str_replace('http://www.azadliq.info/','',$imageurl);?>" width="100" class="imageurl"/></a> 
            <?php endif;?>
         <?php if(!empty($description)):?>
           <?php echo truncate_text($description, 200);?>
      <?php endif;?>
         </div>
      <div class="url"><?php echo truncate_text($url,80);?> </div>
       <div class="xeberdatetime"><?php echo $azdate ?></div>
 </div>
    <?php endforeach; ?>

 <div class="pagination">
    <div id="photos_pager"> <?php echo pager_navigation($feed_pager, '@xeber_index?query=') ?> </div>
 </div>

</div><!-- xeber_results -->
 <?php include_component('xeber','sponsorads')?>
</div>

</div>



