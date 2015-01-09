<?php

/**
 * EventStatusComment form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEventStatusCommentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'user_id'         => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'event_status_id' => new sfWidgetFormPropelChoice(array('model' => 'EventStatus', 'add_empty' => false)),
      'comment'         => new sfWidgetFormTextarea(),
      'created_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'EventStatusComment', 'column' => 'id', 'required' => false)),
      'user_id'         => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'event_status_id' => new sfValidatorPropelChoice(array('model' => 'EventStatus', 'column' => 'id')),
      'comment'         => new sfValidatorString(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('event_status_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EventStatusComment';
  }


}
