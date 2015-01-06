<?php

/**
 * BiznesComment form base class.
 *
 * @method BiznesComment getObject() Returns the current form's model object
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseBiznesCommentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'biznes_id'  => new sfWidgetFormPropelChoice(array('model' => 'Biznes', 'add_empty' => false)),
      'id'         => new sfWidgetFormInputHidden(),
      'comment'    => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'raw_ip'     => new sfWidgetFormInputText(),
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'biznes_id'  => new sfValidatorPropelChoice(array('model' => 'Biznes', 'column' => 'id')),
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'comment'    => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'raw_ip'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'user_id'    => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('biznes_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BiznesComment';
  }


}
