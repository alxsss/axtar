<?php

/**
 * GroupStatusComment form base class.
 *
 * @method GroupStatusComment getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGroupStatusCommentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'user_id'         => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'group_status_id' => new sfWidgetFormPropelChoice(array('model' => 'GroupStatus', 'add_empty' => false)),
      'comment'         => new sfWidgetFormTextarea(),
      'created_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'         => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'group_status_id' => new sfValidatorPropelChoice(array('model' => 'GroupStatus', 'column' => 'id')),
      'comment'         => new sfValidatorString(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('group_status_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GroupStatusComment';
  }


}
