<?php

/**
 * sfGuardUserProfile form base class.
 *
 * @method sfGuardUserProfile getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfGuardUserProfileForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'first_name' => new sfWidgetFormInputText(),
      'last_name'  => new sfWidgetFormInputText(),
      'photo'      => new sfWidgetFormInputText(),
      'birthday'   => new sfWidgetFormDate(),
      'gender'     => new sfWidgetFormInputText(),
      'status'     => new sfWidgetFormInputText(),
      'lookingfor' => new sfWidgetFormTextarea(),
      'city'       => new sfWidgetFormInputText(),
      'state'      => new sfWidgetFormInputText(),
      'zip'        => new sfWidgetFormInputText(),
      'country_id' => new sfWidgetFormPropelChoice(array('model' => 'Country', 'add_empty' => true)),
      'website'    => new sfWidgetFormTextarea(),
      'activities' => new sfWidgetFormTextarea(),
      'books'      => new sfWidgetFormTextarea(),
      'music'      => new sfWidgetFormTextarea(),
      'movies'     => new sfWidgetFormTextarea(),
      'tvshows'    => new sfWidgetFormTextarea(),
      'aboutme'    => new sfWidgetFormTextarea(),
      'validate'   => new sfWidgetFormInputText(),
      'visibility' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'    => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'first_name' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'last_name'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'photo'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'birthday'   => new sfValidatorDate(array('required' => false)),
      'gender'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'status'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'lookingfor' => new sfValidatorString(array('required' => false)),
      'city'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'state'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'zip'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'country_id' => new sfValidatorPropelChoice(array('model' => 'Country', 'column' => 'id', 'required' => false)),
      'website'    => new sfValidatorString(array('required' => false)),
      'activities' => new sfValidatorString(array('required' => false)),
      'books'      => new sfValidatorString(array('required' => false)),
      'music'      => new sfValidatorString(array('required' => false)),
      'movies'     => new sfValidatorString(array('required' => false)),
      'tvshows'    => new sfValidatorString(array('required' => false)),
      'aboutme'    => new sfValidatorString(array('required' => false)),
      'validate'   => new sfValidatorString(array('max_length' => 17, 'required' => false)),
      'visibility' => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }


}
