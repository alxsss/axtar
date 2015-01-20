<?php

/**
 * Advertise form base class.
 *
 * @package    hemsinif
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAdvertiseForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInput(),
      'company'    => new sfWidgetFormInput(),
      'email'      => new sfWidgetFormInput(),
      'phone'      => new sfWidgetFormInput(),
      'comment'    => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Advertise', 'column' => 'id', 'required' => false)),
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
