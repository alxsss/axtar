<?php

/**
 * BiznesTag form base class.
 *
 * @method BiznesTag getObject() Returns the current form's model object
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseBiznesTagForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'biznes_id'      => new sfWidgetFormInputHidden(),
      'user_id'        => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'created_at'     => new sfWidgetFormDateTime(),
      'tag'            => new sfWidgetFormInputText(),
      'normalized_tag' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'biznes_id'      => new sfValidatorPropelChoice(array('model' => 'Biznes', 'column' => 'id', 'required' => false)),
      'user_id'        => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'tag'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'normalized_tag' => new sfValidatorChoice(array('choices' => array($this->getObject()->getNormalizedTag()), 'empty_value' => $this->getObject()->getNormalizedTag(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('biznes_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BiznesTag';
  }


}
