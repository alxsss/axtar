<?php

/**
 * Biznes filter form base class.
 *
 * @package    axtar
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseBiznesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'            => new sfWidgetFormFilterInput(),
      'address'          => new sfWidgetFormFilterInput(),
      'phone'            => new sfWidgetFormFilterInput(),
      'website'          => new sfWidgetFormFilterInput(),
      'category'         => new sfWidgetFormFilterInput(),
      'photo'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'rating'           => new sfWidgetFormFilterInput(),
      'num_comment'      => new sfWidgetFormFilterInput(),
      'approved'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'user_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'biznes_fav_list'  => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'biznes_rate_list' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'title'            => new sfValidatorPass(array('required' => false)),
      'address'          => new sfValidatorPass(array('required' => false)),
      'phone'            => new sfValidatorPass(array('required' => false)),
      'website'          => new sfValidatorPass(array('required' => false)),
      'category'         => new sfValidatorPass(array('required' => false)),
      'photo'            => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'rating'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'num_comment'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'approved'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'user_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'biznes_fav_list'  => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'biznes_rate_list' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('biznes_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addBiznesFavListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(BiznesPeer::ID, BiznesFavPeer::BIZNES_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(BiznesFavPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(BiznesFavPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addBiznesRateListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(BiznesPeer::ID, BiznesRatePeer::BIZNES_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(BiznesRatePeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(BiznesRatePeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Biznes';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'title'            => 'Text',
      'address'          => 'Text',
      'phone'            => 'Text',
      'website'          => 'Text',
      'category'         => 'Text',
      'photo'            => 'Text',
      'created_at'       => 'Date',
      'rating'           => 'Number',
      'num_comment'      => 'Number',
      'approved'         => 'Boolean',
      'user_id'          => 'ForeignKey',
      'biznes_fav_list'  => 'ManyKey',
      'biznes_rate_list' => 'ManyKey',
    );
  }
}
