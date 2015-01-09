<?php

/**
 * Sessions filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSessionsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'sess_id'   => new sfWidgetFormFilterInput(),
      'sess_data' => new sfWidgetFormFilterInput(),
      'sess_time' => new sfWidgetFormFilterInput(),
      'user_id'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'sess_id'   => new sfValidatorPass(array('required' => false)),
      'sess_data' => new sfValidatorPass(array('required' => false)),
      'sess_time' => new sfValidatorPass(array('required' => false)),
      'user_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sessions_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sessions';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'sess_id'   => 'Text',
      'sess_data' => 'Text',
      'sess_time' => 'Text',
      'user_id'   => 'ForeignKey',
    );
  }
}
