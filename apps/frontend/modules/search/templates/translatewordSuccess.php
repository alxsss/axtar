<?php use_helper('I18N', 'Global') ?>
<?php include_partial('search')?>
<?php print_r($xml)?>
    <?php foreach($xml->resultset_web->result as $result):?>
      <div> <h3><a href="<?php echo $result->url;?>"><?php echo $result->title;?></a></h3> </div>
      <div class="abstract"> <?php echo $result->abstract;?> </div>
      <div class="url"> <?php echo $result->url;?> </div>
    <?php endforeach;?>
