<?php

/**
 * States filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseStatesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'code' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'code' => new sfValidatorPass(array('required' => false)),
      'name' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('states_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'States';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'code' => 'Text',
      'name' => 'Text',
    );
  }
}
