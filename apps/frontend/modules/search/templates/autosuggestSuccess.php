<?php $data=array(); ?>
<?php foreach($keywords as $keywords): ?>
  <?php $data[] = sfOutputEscaper::unescape($keywords->getQuery());?> 
  <?php endforeach; ?>
<?php header("Content-type: application/json");
echo json_encode($data);
?>

