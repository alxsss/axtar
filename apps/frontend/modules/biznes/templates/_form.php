<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('biznes/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('biznes/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'biznes/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['title']->renderLabel() ?></th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['address']->renderLabel() ?></th>
        <td>
          <?php echo $form['address']->renderError() ?>
          <?php echo $form['address'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['phone']->renderError() ?>
          <?php echo $form['phone'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['website']->renderLabel() ?></th>
        <td>
          <?php echo $form['website']->renderError() ?>
          <?php echo $form['website'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['category']->renderLabel() ?></th>
        <td>
          <?php echo $form['category']->renderError() ?>
          <?php echo $form['category'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['photo']->renderLabel() ?></th>
        <td>
          <?php echo $form['photo']->renderError() ?>
          <?php echo $form['photo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rating']->renderLabel() ?></th>
        <td>
          <?php echo $form['rating']->renderError() ?>
          <?php echo $form['rating'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['num_comment']->renderLabel() ?></th>
        <td>
          <?php echo $form['num_comment']->renderError() ?>
          <?php echo $form['num_comment'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['approved']->renderLabel() ?></th>
        <td>
          <?php echo $form['approved']->renderError() ?>
          <?php echo $form['approved'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['user_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['user_id']->renderError() ?>
          <?php echo $form['user_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['biznes_fav_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['biznes_fav_list']->renderError() ?>
          <?php echo $form['biznes_fav_list'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['biznes_rate_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['biznes_rate_list']->renderError() ?>
          <?php echo $form['biznes_rate_list'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>