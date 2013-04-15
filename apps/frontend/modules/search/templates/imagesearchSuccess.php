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
<?php include_partial('image_search')?>
<div id="left_col">&nbsp;</div>
<div id="image_results">
  <?php if(!empty($spellcheck)):?>  
    <?php echo __('Did you mean %keyword%?', array('%keyword%'=> link_to($spellcheck[0], url_for('@search_search?query='.$spellcheck[0]))));?>
  <?php endif;?>

      <?php $parent_url='';?>
      <?php $mage_id='';?>
      <?php $site='';?>
  <?php $cnt=0;?>
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
       /*
       if(file_exists('/uploads/assets/image_data/'.$image_id.'_tbn.jpg')) 
       {
         $src='/uploads/assets/image_data/'.$image_id.'_tbn.jpg';
       } 
       else
       {
         $src=$id;
       }*/
        $src='/uploads/assets/image_data/'.$image_id.'_tbn.jpg';
        $found=false;
        $arr=array('png', 'jpg', 'gif','jpeg','peg','bmp','tiff');
        foreach($arr as $a)
        {
          if (stripos($id,$a)!== false)
          {
            $found=true;
            break;
          }
        }
        if(!$found)
        {
            //open file and put solr delete statements
            $file=fopen('/home/www/axtar/web/solr_delte.txt','a');
            fwrite($file, '<delete><id>'.$id.'</id></delete>'."\n");
            fclose($file);
            continue;           
        }
        ?>
      <?php $cnt++;?>
      <div class="image"><a href="<?php echo  $parent_url ?>" target="_blank"><img src="<?php echo $src ?>" title="<?php echo  $parent_url ?>" /></a></div>
      <?php if($cnt==7){echo '</div><div class="image_line">';$cnt=0;}?>
    <?php endforeach; ?>
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
<?php //include_partial('search')?>
