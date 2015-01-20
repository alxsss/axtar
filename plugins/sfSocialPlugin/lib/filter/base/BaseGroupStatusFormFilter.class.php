<?php

/**
 * GroupStatus filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGroupStatusFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'group_id'   => new sfWidgetFormPropelChoice(array('model' => 'sfSocialGroup', 'add_empty' => true)),
      'status'     => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'group_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfSocialGroup', 'column' => 'id')),
      'status'     => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('group_status_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GroupStatus';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'group_id'   => 'ForeignKey',
      'status'     => 'Text',
      'created_at' => 'Date',
    );
  }
}
