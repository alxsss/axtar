<?php

/**
 * Country filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseCountryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'iso_code_2'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'iso_code_3'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address_format_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'              => new sfValidatorPass(array('required' => false)),
      'iso_code_2'        => new sfValidatorPass(array('required' => false)),
      'iso_code_3'        => new sfValidatorPass(array('required' => false)),
      'address_format_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('country_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Country';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'name'              => 'Text',
      'iso_code_2'        => 'Text',
      'iso_code_3'        => 'Text',
      'address_format_id' => 'Number',
    );
  }
}
