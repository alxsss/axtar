<?php

/**
 * VideolistYtvideo filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseVideolistYtvideoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'videolist_id' => new sfWidgetFormPropelChoice(array('model' => 'Videolist', 'add_empty' => true)),
      'ytvideo_id'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'videolist_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Videolist', 'column' => 'id')),
      'ytvideo_id'   => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('videolist_ytvideo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VideolistYtvideo';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'videolist_id' => 'ForeignKey',
      'ytvideo_id'   => 'Text',
      'created_at'   => 'Date',
    );
  }
}
