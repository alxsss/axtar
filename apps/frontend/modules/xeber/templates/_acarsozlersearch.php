 <div id="acar_sozler_search">
      <div class="title_acar_sozler"><?php echo __('Most frequent keywords in news');?> </div>
      <?php foreach($acar_sozler as $acar_soz):?>
        <span class="acar_soz_search"> <?php echo link_to($acar_soz->getKeyphrase(),'@xeber_search?query='.$acar_soz->getKeyphrase());?></span>
      <?php endforeach;?>
    </div>

