<?php use_helper('I18N','Text', 'Global') ?>
 <?php include_component('xeber', 'topnewswithimagesxeber',array('num_news' => 12))?>
 <?php include_partial('xeber/search_small')?>

<div class="col-xs-12 news_chronology"><?php echo $site;?> </div>
 <div class="col-xs-12 col-md-12">
   <div class="col-xs-12 col-md-8">

 <?php foreach($results as $result): ?>
      <?php $title=''; $azdate='';$imageurl=''; $description='';?>
      <?php $date=$result['tstamp'];?>
      <?php $title=$result['title'];?>
      <?php $imageurl=$result['imageurl'];?>
      <?php $url=$result['url'];?>
      <?php $content=$result['content'][0];?>
      <?php $id=$result['id'];?>

      <div id="xeber_row" class="row">
        <div class="col-xs-12 col-sm-2 col-md-2">
           <?php if(!empty($imageurl)):?>
              <a href="<?php echo $url;?>" target="_blank"><img src="<?php  echo $imageurl;?>" class="xeber_imageurl"/></a>
           <?php endif;?>
        </div>

        <div class="col-xs-12 col-sm-10 col-md-10">
          
      <div class="news_title"><a href="<?php echo $url;?>" target="_blank"><?php if(empty($title)){echo truncate_text($url,80);}else{echo truncate_text($title,80); }?></a></div>
          <?php if(!empty($content)):?>
            <div class="abstract"><?php echo sfOutputEscaper::unescape($content);?></div>
          <?php endif;?>
          <div class="url"><?php echo truncate_text($url,40);?></div>
          <?php if(!empty($date)):?>     
             <?php $time = strtotime($date); $azdate= date("d-m-Y, H:i", $time); ?> 
             <div class="xeberdatetime"><?php echo $azdate ?></div>
          <?php endif;?>
          <?php if (0&&$sf_user->isAuthenticated()): ?>
          <?php //if ($sf_user->isAuthenticated()): ?>
            <div class="xeberdatetime"><a href="<?php echo url_for('xeber/show').'?id='.$id.'&title='.str_replace(array(' ','.'),array('-','_'),$title)?>"><?php echo __('discuss');?></a></div>
          <?php endif;?>
           <div class="xeberdatetime"><a  target="blank" href="<?php echo url_for('xeber/show').'?id='.urlencode($id).'&title='.str_replace(array(' ','.'),array('-','_'),$title)?>"><?php echo __('discuss');?></a></div>

        </div>     
      </div><!--close inner row-->     

    <?php endforeach; ?>

   </div> <!--close class col-md-8-->
  <div class="col-xs-6 col-md-2">
    <?php //include_component('xeber', 'acarsozler')?>
 <?php include_component('xeber', 'popularnews')?>

  </div>
  <div class="col-xs-6 col-md-2">
    <?php include_component('xeber', 'sponsorads')?>
  </div>
</div> <!--close class col-md-12-->

    <div class="col-xs-10 col-xs-offset-2 pagination" id="photos_pager">
       <?php echo pager_navigation($feed_pager, '@xeber_site?query='.sfOutputEscaper::unescape($query).'&site='.$site ) ?>
    </div>



