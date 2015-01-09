<?php

/**
 * Updates form base class.
 *
 * @method Updates getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseUpdatesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pid'           => new sfWidgetFormInputText(),
      'id'            => new sfWidgetFormInputHidden(),
      'user_id'       => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'friend_id'     => new sfWidgetFormTextarea(),
      'group_id'      => new sfWidgetFormTextarea(),
      'f_status_name' => new sfWidgetFormTextarea(),
      'p_owner_id'    => new sfWidgetFormTextarea(),
      'num_comment'   => new sfWidgetFormTextarea(),
      'description'   => new sfWidgetFormTextarea(),
      'created_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'pid'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'       => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'friend_id'     => new sfValidatorString(array('required' => false)),
      'group_id'      => new sfValidatorString(array('required' => false)),
      'f_status_name' => new sfValidatorString(array('required' => false)),
      'p_owner_id'    => new sfValidatorString(array('required' => false)),
      'num_comment'   => new sfValidatorString(array('required' => false)),
      'description'   => new sfValidatorString(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('updates[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Updates';
  }


}
