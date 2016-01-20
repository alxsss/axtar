<?php use_helper('I18N','Text') ?>
 <?php include_partial('biznes/biznes_search_small')?>
 <div class="col-xs-9 col-xs-offset-1">
      <div class="notice">
          <div class="biznes_entry_title"><?php echo __('Axtar.az is the most powerful place to search for Businesses by their name, category and address.')?></div>
          <div class="biznes_entry_msg"><?php echo __('If you see your Businesses in the list but you have never added it here, it means it was given to us by a third party. Please add your business with details and the original one will be deleted.')?></div>
      <div class="news_chronology"><a href="<?php echo url_for('biznes/new');?>"><?php  echo __('Add Business');?></a> </div>
    </div>
</div>
 <div class="col-xs-2"></div>

   <?php include_component('biznes', 'newbiznes')?> 


