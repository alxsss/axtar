<?php use_helper('I18N') ?>
<?php $advertise = $form->getObject() ?>
<div id="about">
<h2><?php echo __('Contact us')?></h2>
<?php echo __('Please fill out this contact form or email us at admin at axtar dot az.')?>
<br>
<br>
<form action="<?php echo url_for('contact/create') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
        <input type="submit" value="<?php echo __('Submit')?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><label for="advertise_name"><?php echo __('Name')?></label></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><label for="advertise_company"><?php echo __('Company')?></label></th>
        <td>
          <?php echo $form['company']->renderError() ?>
          <?php echo $form['company'] ?>
        </td>
      </tr>
      <tr>
        <th><label for="advertise_email"><?php echo __('Email')?></label></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><label for="advertise_phone"><?php echo __('Phone')?></label></th>
        <td>
          <?php echo $form['phone']->renderError() ?>
          <?php echo $form['phone'] ?>
        </td>
      </tr>
      <tr>
        <th><label for="advertise_comment"><?php echo __('Comment')?></label></th>
        <td>
          <?php echo $form['comment']->renderError() ?>
          <?php echo $form['comment'] ?>
        </td>
      </tr>      
    </tbody>
  </table>
</form>
</div>
