<?php use_helper('I18N','Text') ?>
<?php
  function pager_navigation($pager, $uri)
  {
    $navigation = '';
    if ($pager->haveToPaginate())
    {
      $uri .= (preg_match('/\?/', $uri) ? '&' : '?').'page=';
     // First and previous page
      if ($pager->getPage() != 1)
      {
       $navigation .= link_to(__('First'), $uri.'1');
       $navigation .= link_to(__('Prev'), $uri.$pager->getPreviousPage()).'&nbsp;';
      }
    // Pages one by one
    $links = array();
    foreach ($pager->getLinks() as $page)
    {
      $links[] = link_to_unless($page == $pager->getPage(), $page, $uri.$page);
    }
    $navigation .= join('&nbsp;&nbsp;', $links);
    // Next and last page
    if ($pager->getPage() != $pager->getCurrentMaxLink())
    {
      $navigation .= '&nbsp;'.link_to(__('Next'), $uri.$pager->getNextPage());
      //$navigation .= link_to(__('Last'), $uri.$pager->getLastPage());
    }
  }
  return $navigation;
}
?>
<div id="search_results">
  <?php include_partial('search_small')?>
  <div id="results">
    <?php include_component('xeber', 'acarsozler')?>
   
    <!-- Generate the date picker input field -->
    <!-- The parameter represents the name & id of the input field generated -->
    <?php //echo $cal->RenderAjax("mydate")?>

    <div id="xeber_results">

    <?php foreach($results->doc as $result): ?>
      <?php $azdate='';$imageurl='';?>
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
      }?>  
      
      <?php $content=$axtar_xml->xpath("//lst[@name='highlighting']/lst[@name='$id']/arr[@name='content']/str");?>
     
       <?php if(!empty($date)):?>
          <?php $time = strtotime($date); $azdate= date("d-m-Y, H:i", $time); ?>
       <?php endif;?>
     
      <h3><a href="<?php echo $url;?>" target="_blank"><?php if(empty($title)){echo truncate_text($url,60);}else{ echo truncate_text(str_replace('<!', '<',$title),60);}?></a></h3>
      <?php if(!empty($content)):?>
         <div class="abstract">
           <?php if(!empty($imageurl)):?>
              <a href="<?php echo $url;?>" target="_blank"> <img src="<?php echo $imageurl;?>" width="100" class="imageurl"/> </a> 
            <?php endif;?>
           <?php
              $hhmm=substr($azdate,strpos($azdate,':')-2,5);
              $poshhmm=strpos($content[0],$hhmm);

              echo substr($content[0],$poshhmm+5, 250);?>
         </div>
      <?php endif;?>
      <div class="url"><?php echo truncate_text($url,60);?> </div>
       <div class="xeberdatetime"><?php echo $azdate ?></div>
    <?php endforeach; ?>

 <div class="pagination">
    <div id="photos_pager"> <?php echo pager_navigation($feed_pager, '@xeber_index?query=') ?> </div>
 </div>

</div><!-- xeber_results -->
</div>

 <?php include_partial('search/sponsor_ads')?>
</div>



