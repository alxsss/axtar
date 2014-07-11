<?php

/**
 * Sponsor form base class.
 *
 * @method Sponsor getObject() Returns the current form's model object
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSponsorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'url'         => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'start'       => new sfWidgetFormDate(),
      'end'         => new sfWidgetFormDate(),
      'email'       => new sfWidgetFormInputText(),
      'phone'       => new sfWidgetFormInputText(),
      'comment'     => new sfWidgetFormTextarea(),
      'payment'     => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'url'         => new sfValidatorString(array('max_length' => 256)),
      'description' => new sfValidatorString(array('required' => false)),
      'start'       => new sfValidatorDate(),
      'end'         => new sfValidatorDate(),
      'email'       => new sfValidatorString(array('max_length' => 100)),
      'phone'       => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'comment'     => new sfValidatorString(array('required' => false)),
      'payment'     => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sponsor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sponsor';
  }


}
