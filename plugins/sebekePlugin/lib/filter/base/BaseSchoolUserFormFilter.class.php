<?php

/**
 * SchoolUser filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSchoolUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'grad_year' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'grad_year' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('school_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SchoolUser';
  }

  public function getFields()
  {
    return array(
      'school_id' => 'ForeignKey',
      'user_id'   => 'ForeignKey',
      'grad_year' => 'Number',
    );
  }
}
