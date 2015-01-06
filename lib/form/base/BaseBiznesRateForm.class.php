<?php

/**
 * BiznesRate form base class.
 *
 * @method BiznesRate getObject() Returns the current form's model object
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseBiznesRateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'biznes_id'  => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormInputHidden(),
      'rate'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'checked'    => new sfWidgetFormInputCheckbox(),
      'deleted'    => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'biznes_id'  => new sfValidatorPropelChoice(array('model' => 'Biznes', 'column' => 'id', 'required' => false)),
      'user_id'    => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'rate'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'checked'    => new sfValidatorBoolean(array('required' => false)),
      'deleted'    => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('biznes_rate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BiznesRate';
  }


}
