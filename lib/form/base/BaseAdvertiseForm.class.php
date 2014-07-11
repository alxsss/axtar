<?php

/**
 * Advertise form base class.
 *
 * @method Advertise getObject() Returns the current form's model object
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAdvertiseForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'company'    => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'phone'      => new sfWidgetFormInputText(),
      'comment'    => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 100)),
      'company'    => new sfValidatorString(array('max_length' => 100)),
      'email'      => new sfValidatorString(array('max_length' => 100)),
      'phone'      => new sfValidatorString(array('max_length' => 15)),
      'comment'    => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('advertise[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Advertise';
  }


}
