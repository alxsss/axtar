<?php

/**
 * BiznesComment filter form base class.
 *
 * @package    axtar
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseBiznesCommentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'biznes_id'  => new sfWidgetFormPropelChoice(array('model' => 'Biznes', 'add_empty' => true)),
      'comment'    => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'raw_ip'     => new sfWidgetFormFilterInput(),
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'biznes_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Biznes', 'column' => 'id')),
      'comment'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'raw_ip'     => new sfValidatorPass(array('required' => false)),
      'user_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('biznes_comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BiznesComment';
  }

  public function getFields()
  {
    return array(
      'biznes_id'  => 'ForeignKey',
      'id'         => 'Number',
      'comment'    => 'Text',
      'created_at' => 'Date',
      'raw_ip'     => 'Text',
      'user_id'    => 'ForeignKey',
    );
  }
}
