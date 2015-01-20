<?php

/**
 * SchoolUser form base class.
 *
 * @method SchoolUser getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSchoolUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'school_id' => new sfWidgetFormInputHidden(),
      'user_id'   => new sfWidgetFormInputHidden(),
      'grad_year' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'school_id' => new sfValidatorPropelChoice(array('model' => 'School', 'column' => 'id', 'required' => false)),
      'user_id'   => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'grad_year' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('school_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SchoolUser';
  }


}
