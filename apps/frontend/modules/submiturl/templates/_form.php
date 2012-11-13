<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('submiturl/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>
   <?php echo $form->renderHiddenFields() ?>
   <?php echo $form->renderGlobalErrors() ?>
   <?php echo $form['name']->renderError() ?>
     <input type="text" id="url_name" size="60" maxlength="256" value="http://" name="url[name]">
     <input type="submit" value="<?php echo __('Submit')?>" />
     <div class="submiturl_help"><?php echo __('Please include the http:// prefix (for example, http://www.axtar.az).')?></div>
  <?php //echo $form['name'] ?>
</form>
