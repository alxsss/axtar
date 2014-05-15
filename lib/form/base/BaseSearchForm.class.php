<?php

/**
 * Search form base class.
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseSearchForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'query'      => new sfWidgetFormInput(),
      'raw_ip'     => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Search', 'column' => 'id', 'required' => false)),
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
