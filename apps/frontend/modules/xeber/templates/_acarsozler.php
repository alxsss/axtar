 <div id="acar_sozler">
  <div class="title_acar_sozler"><?php echo __('Most frequent keywords in news');?> </div>
      <?php foreach($acar_sozler as $acar_soz):?>
        <div class="acar_soz"> <?php echo link_to($acar_soz->getKeyphrase(),'@xeber_search?query='.$acar_soz->getKeyphrase());?></div>
      <?php endforeach;?>
    </div>

