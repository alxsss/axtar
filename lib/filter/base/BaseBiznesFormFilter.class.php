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
      'user_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'address'          => new sfWidgetFormFilterInput(),
      'telefon'          => new sfWidgetFormFilterInput(),
      'website'          => new sfWidgetFormFilterInput(),
      'photo'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'rating'           => new sfWidgetFormFilterInput(),
      'num_comment'      => new sfWidgetFormFilterInput(),
      'title'            => new sfWidgetFormFilterInput(),
      'approved'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'visibility'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'biznes_fav_list'  => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'biznes_rate_list' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'user_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'address'          => new sfValidatorPass(array('required' => false)),
      'telefon'          => new sfValidatorPass(array('required' => false)),
      'website'          => new sfValidatorPass(array('required' => false)),
      'photo'            => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'rating'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'num_comment'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'title'            => new sfValidatorPass(array('required' => false)),
      'approved'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'visibility'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
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
      'user_id'          => 'ForeignKey',
      'address'          => 'Text',
      'telefon'          => 'Text',
      'website'          => 'Text',
      'photo'            => 'Text',
      'created_at'       => 'Date',
      'rating'           => 'Number',
      'num_comment'      => 'Number',
      'title'            => 'Text',
      'approved'         => 'Boolean',
      'visibility'       => 'Number',
      'biznes_fav_list'  => 'ManyKey',
      'biznes_rate_list' => 'ManyKey',
    );
  }
}
