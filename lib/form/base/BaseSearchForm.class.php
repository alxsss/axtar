<?php

/**
 * Search form base class.
 *
 * @method Search getObject() Returns the current form's model object
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSearchForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'query'      => new sfWidgetFormInputText(),
      'raw_ip'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'query'      => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'raw_ip'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('search[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Search';
  }


}
