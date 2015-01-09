<?php

/**
 * Sessions form base class.
 *
 * @method Sessions getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSessionsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'sess_id'   => new sfWidgetFormInputText(),
      'sess_data' => new sfWidgetFormTextarea(),
      'sess_time' => new sfWidgetFormInputText(),
      'user_id'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'sess_id'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sess_data' => new sfValidatorString(array('required' => false)),
      'sess_time' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_id'   => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sessions[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sessions';
  }


}
