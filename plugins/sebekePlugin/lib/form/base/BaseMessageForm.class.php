<?php

/**
 * Message form base class.
 *
 * @method Message getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseMessageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'subject'      => new sfWidgetFormInputText(),
      'from_userid'  => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'to_userid'    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'from_deltype' => new sfWidgetFormInputText(),
      'to_deltype'   => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'msgtext'      => new sfWidgetFormTextarea(),
      'read_unread'  => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'subject'      => new sfValidatorString(array('max_length' => 255)),
      'from_userid'  => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'to_userid'    => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'from_deltype' => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'to_deltype'   => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'msgtext'      => new sfValidatorString(),
      'read_unread'  => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Message';
  }


}
