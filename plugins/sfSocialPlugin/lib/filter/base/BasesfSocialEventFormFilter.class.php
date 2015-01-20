<?php

/**
 * sfSocialEvent filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfSocialEventFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_admin'                => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'title'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'visibility'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'photo'                     => new sfWidgetFormFilterInput(),
      'start'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'location'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'sf_social_event_user_list' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'user_admin'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'title'                     => new sfValidatorPass(array('required' => false)),
      'description'               => new sfValidatorPass(array('required' => false)),
      'visibility'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'photo'                     => new sfValidatorPass(array('required' => false)),
      'start'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'end'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'location'                  => new sfValidatorPass(array('required' => false)),
      'created_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'sf_social_event_user_list' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_social_event_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addsfSocialEventUserListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(sfSocialEventPeer::ID, sfSocialEventUserPeer::EVENT_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(sfSocialEventUserPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(sfSocialEventUserPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'sfSocialEvent';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'user_admin'                => 'ForeignKey',
      'title'                     => 'Text',
      'description'               => 'Text',
      'visibility'                => 'Number',
      'photo'                     => 'Text',
      'start'                     => 'Date',
      'end'                       => 'Date',
      'location'                  => 'Text',
      'created_at'                => 'Date',
      'updated_at'                => 'Date',
      'sf_social_event_user_list' => 'ManyKey',
    );
  }
}
