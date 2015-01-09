<?php

/**
 * VideolistYtvideo form base class.
 *
 * @method VideolistYtvideo getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseVideolistYtvideoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'videolist_id' => new sfWidgetFormPropelChoice(array('model' => 'Videolist', 'add_empty' => false)),
      'ytvideo_id'   => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'videolist_id' => new sfValidatorPropelChoice(array('model' => 'Videolist', 'column' => 'id')),
      'ytvideo_id'   => new sfValidatorString(array('max_length' => 30)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('videolist_ytvideo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VideolistYtvideo';
  }


}
