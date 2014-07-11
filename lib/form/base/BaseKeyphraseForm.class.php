<?php

/**
 * Keyphrase form base class.
 *
 * @method Keyphrase getObject() Returns the current form's model object
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseKeyphraseForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'keyphrase'  => new sfWidgetFormInputText(),
      'count'      => new sfWidgetFormInputText(),
      'active'     => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'keyphrase'  => new sfValidatorString(array('max_length' => 256)),
      'count'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'active'     => new sfValidatorBoolean(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('keyphrase[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Keyphrase';
  }


}
