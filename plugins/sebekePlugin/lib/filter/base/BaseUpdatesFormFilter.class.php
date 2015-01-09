<?php

/**
 * Updates filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseUpdatesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pid'           => new sfWidgetFormFilterInput(),
      'user_id'       => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'friend_id'     => new sfWidgetFormFilterInput(),
      'group_id'      => new sfWidgetFormFilterInput(),
      'f_status_name' => new sfWidgetFormFilterInput(),
      'p_owner_id'    => new sfWidgetFormFilterInput(),
      'num_comment'   => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'pid'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'friend_id'     => new sfValidatorPass(array('required' => false)),
      'group_id'      => new sfValidatorPass(array('required' => false)),
      'f_status_name' => new sfValidatorPass(array('required' => false)),
      'p_owner_id'    => new sfValidatorPass(array('required' => false)),
      'num_comment'   => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('updates_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Updates';
  }

  public function getFields()
  {
    return array(
      'pid'           => 'Number',
      'id'            => 'Number',
      'user_id'       => 'ForeignKey',
      'friend_id'     => 'Text',
      'group_id'      => 'Text',
      'f_status_name' => 'Text',
      'p_owner_id'    => 'Text',
      'num_comment'   => 'Text',
      'description'   => 'Text',
      'created_at'    => 'Date',
    );
  }
}
