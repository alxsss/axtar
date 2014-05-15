<?php

/**
 * Sponsor form base class.
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseSponsorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'url'         => new sfWidgetFormInput(),
      'description' => new sfWidgetFormTextarea(),
      'start'       => new sfWidgetFormDate(),
      'end'         => new sfWidgetFormDate(),
      'email'       => new sfWidgetFormInput(),
      'phone'       => new sfWidgetFormInput(),
      'comment'     => new sfWidgetFormTextarea(),
      'payment'     => new sfWidgetFormInput(),
      'created_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Sponsor', 'column' => 'id', 'required' => false)),
      'url'         => new sfValidatorString(array('max_length' => 256)),
      'description' => new sfValidatorString(array('required' => false)),
      'start'       => new sfValidatorDate(),
      'end'         => new sfValidatorDate(),
      'email'       => new sfValidatorString(array('max_length' => 100)),
      'phone'       => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'comment'     => new sfValidatorString(array('required' => false)),
      'payment'     => new sfValidatorInteger(array('required' => false)),
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
