<?php

/**
 * Keyphrase filter form base class.
 *
 * @package    axtar
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseKeyphraseFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'keyphrase'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'count'      => new sfWidgetFormFilterInput(),
      'active'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'keyphrase'  => new sfValidatorPass(array('required' => false)),
      'count'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'active'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('keyphrase_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Keyphrase';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'keyphrase'  => 'Text',
      'count'      => 'Number',
      'active'     => 'Boolean',
      'created_at' => 'Date',
    );
  }
}
