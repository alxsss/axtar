<div id="acar_sozler">
  <div class="title_acar_sozler"><?php echo __('Most popular');?></div>

     <?php foreach($xeber_num_comment as $xeber):?>
      <div class="mostpopular_xeber_title"><a target="blank" href="<?php echo url_for('xeber/show').'?id='.urlencode($xeber->getXeberId()).'&title='.str_replace(array(' ','.'),array('-','_'),$xeber->getXeberTitle())?>"><?php echo $xeber->getXeberTitle();?></a></div>

        <div class="mostpopular_xeber_num_comments"> <?php echo __('comments').$xeber->getNumComment() ;?></div>
      <?php endforeach;?>
    </div>
