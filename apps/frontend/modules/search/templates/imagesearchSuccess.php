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

<?php include_partial('image_search')?>
<div id="image_results">
  <?php if(!empty($spellcheck)):?>  
    <?php echo __('Did you mean %keyword%?', array('%keyword%'=> link_to($spellcheck[0], url_for('@search_search?query='.$spellcheck[0]))));?>
  <?php endif;?>

      <?php $parent_url='';?>
      <?php $mage_id='';?>
      <?php $site='';?>
  <?php $cnt=0;?>
  <?php  
      $update_cnt=0;
      $thumbfile_cnt=0
  ?>
  <div class="image_line">
    <?php foreach($results as $result): ?>
      <?php $str=$result->str;?>
        <?php foreach($str as $s){ 
          if($s->attributes()=='id')
          { 
            $id=$s;
          }
          else if($s->attributes()=='site')
          {
            $site=$s;
          }
          else if($s->attributes()=='parent_url')
          {
            $parent_url=$s;
          }
          else if($s->attributes()=='image_id')
          {      
            $image_id=$s;
          }
        }
      //replace with image url if thumbnail is missing 
       //$style='';
       if(!file_exists('/home/www/axtar/web/uploads/assets/image_data/'.$image_id.'_tbn.jpg')) 
       {
         //$style='style="max-height: 100px; max-width: 100px"';
         //$src=$id;
         if(!$thumbfile_cnt){
           $thumbfile=fopen('/home/www/axtar/web/missing_thumb.txt','a');
           $thumbfile_cnt=1;
         }
         fwrite($thumbfile, $id."\n");

       }
        $src='/uploads/assets/image_data/'.$image_id.'_tbn.jpg';
        //$found=false;
        $found=true;
        //$arr=array('png', 'jpg', 'gif','jpeg','peg','bmp','tiff');
        /*
        foreach($arr as $a)
        {
          if (stripos($id,$a)== false)
          {
            $found=true;
            break;
          }
        }
        */
        $a='.html';
        if (stripos($id,$a)== true)
        {
            $found=true;
            break;
        }

        if(!$found)
        {
            if(!$update_cnt){
              $file=fopen('/home/www/axtar/web/solr_delete.txt','a');
              fwrite($file, '<update>'."\n");
              $update_cnt=1;
            }
            fwrite($file, '<delete><id>'.htmlentities($id).'</id></delete>'."\n");
            //do not increase cnt
            continue;           
        }
        ?>
      <?php $cnt++;?>
      <div class="image"><a href="<?php echo  $parent_url ?>" target="_blank"><img src="<?php echo $src ?>" title="<?php echo  $parent_url ?>" /></a></div>
      <?php if($cnt==7){echo '</div><div class="image_line">';$cnt=0;}?>
    <?php endforeach; ?>
    <?php 
         if($update_cnt)
         {
           fwrite($file, '</update>'."\n");
           fclose($file);
           //exec("/usr/bin/curl -H 'Content-Type: text/xml' http://serverslave:8983/solr/image/update?commit=true --data @/home/www/axtar/web/solr_delete.txt"); 
           unlink("/home/www/axtar/web/solr_delete.txt");
          } 
          if($thumbfile_cnt)
          {
            fclose($file);
            //exec("cd /home/kingson");
          }
?>
  </div>
  <div class="pagination">
    <div id="photos_pager">
      <?php echo pager_navigation($feed_pager, '@image_search?query='.$query) ?>
    </div>
  </div>
</div>
<div class="sponsor_ads">
 <div class="sponsor_ads_title"><?php echo __('Sponsor ads')?></div>
  <h3><a href="http://hemsinif.com" target="blank">hemsinif.com</a></h3>
  Sinif yoldaşlarını, dostları tapmaq və onlarla əlaqədə olmaq üçün sosial şəbəkə.
</div>

</div>
