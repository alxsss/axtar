<?php $data=array(); ?>
 <?php foreach ($docs as $result): ?>
  <?php $data[] =  sfOutputEscaper::unescape($result['textsuggest']);?>
 <?php endforeach; ?>
<?php
   header("Content-type: application/json");
  echo json_encode($data);
?>
