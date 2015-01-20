<?php

/**
 * sfGuardUserProfile filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfGuardUserProfileFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'first_name' => new sfWidgetFormFilterInput(),
      'last_name'  => new sfWidgetFormFilterInput(),
      'photo'      => new sfWidgetFormFilterInput(),
      'birthday'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'gender'     => new sfWidgetFormFilterInput(),
      'status'     => new sfWidgetFormFilterInput(),
      'lookingfor' => new sfWidgetFormFilterInput(),
      'city'       => new sfWidgetFormFilterInput(),
      'state'      => new sfWidgetFormFilterInput(),
      'zip'        => new sfWidgetFormFilterInput(),
      'country_id' => new sfWidgetFormPropelChoice(array('model' => 'Country', 'add_empty' => true)),
      'website'    => new sfWidgetFormFilterInput(),
      'activities' => new sfWidgetFormFilterInput(),
      'books'      => new sfWidgetFormFilterInput(),
      'music'      => new sfWidgetFormFilterInput(),
      'movies'     => new sfWidgetFormFilterInput(),
      'tvshows'    => new sfWidgetFormFilterInput(),
      'aboutme'    => new sfWidgetFormFilterInput(),
      'validate'   => new sfWidgetFormFilterInput(),
      'visibility' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'first_name' => new sfValidatorPass(array('required' => false)),
      'last_name'  => new sfValidatorPass(array('required' => false)),
      'photo'      => new sfValidatorPass(array('required' => false)),
      'birthday'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'gender'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lookingfor' => new sfValidatorPass(array('required' => false)),
      'city'       => new sfValidatorPass(array('required' => false)),
      'state'      => new sfValidatorPass(array('required' => false)),
      'zip'        => new sfValidatorPass(array('required' => false)),
      'country_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Country', 'column' => 'id')),
      'website'    => new sfValidatorPass(array('required' => false)),
      'activities' => new sfValidatorPass(array('required' => false)),
      'books'      => new sfValidatorPass(array('required' => false)),
      'music'      => new sfValidatorPass(array('required' => false)),
      'movies'     => new sfValidatorPass(array('required' => false)),
      'tvshows'    => new sfValidatorPass(array('required' => false)),
      'aboutme'    => new sfValidatorPass(array('required' => false)),
      'validate'   => new sfValidatorPass(array('required' => false)),
      'visibility' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'user_id'    => 'ForeignKey',
      'first_name' => 'Text',
      'last_name'  => 'Text',
      'photo'      => 'Text',
      'birthday'   => 'Date',
      'gender'     => 'Number',
      'status'     => 'Number',
      'lookingfor' => 'Text',
      'city'       => 'Text',
      'state'      => 'Text',
      'zip'        => 'Text',
      'country_id' => 'ForeignKey',
      'website'    => 'Text',
      'activities' => 'Text',
      'books'      => 'Text',
      'music'      => 'Text',
      'movies'     => 'Text',
      'tvshows'    => 'Text',
      'aboutme'    => 'Text',
      'validate'   => 'Text',
      'visibility' => 'Number',
    );
  }
}
