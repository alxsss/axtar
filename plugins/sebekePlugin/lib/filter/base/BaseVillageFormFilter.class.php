<?php

/**
 * Village filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseVillageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'region_id' => new sfWidgetFormPropelChoice(array('model' => 'Region', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'      => new sfValidatorPass(array('required' => false)),
      'region_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Region', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('village_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Village';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'name'      => 'Text',
      'region_id' => 'ForeignKey',
    );
  }
}
