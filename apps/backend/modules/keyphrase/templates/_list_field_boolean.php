<?php if ($value): ?>

<?php echo  '<input type="checkbox" id="keyphrase_active" checked="'.$value.'" name="biznes[active]">' ?>

<?php else: ?>
  <?php echo  '<input type="checkbox" id="keyphrase_active"  name="biznes[active]">' ?>
<?php endif; ?>
