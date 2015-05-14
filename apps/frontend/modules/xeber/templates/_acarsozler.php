<div id="acar_sozler">
  <div class="title_acar_sozler"><?php echo __('Most frequent keywords in news');?> 

<span class="hasTooltip"><?php echo __('What is this?');?></span>
<div class="hidden"> 
  <p>  <?php echo __('These are frequently used keywords in todays news articles. By  clicking on each keyword you can see news articles related to it on the right side, ordered by publication date. Since usually a few articles on the same subject is published, this functionality helps readers to find conceptually related articles.')?></p>
</div>

</div>

     <?php foreach($acar_sozler as $acar_soz):?>
        <div class="acar_soz"> <?php echo link_to($acar_soz->getKeyphrase(),'@xeber_search?query="'.$acar_soz->getKeyphrase().'"');?></div>
      <?php endforeach;?>
    </div>
