<?php

/**
 * Photo filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePhotoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'album_id'        => new sfWidgetFormPropelChoice(array('model' => 'Album', 'add_empty' => true)),
      'user_id'         => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'filename'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hits'            => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'rating'          => new sfWidgetFormFilterInput(),
      'num_comment'     => new sfWidgetFormFilterInput(),
      'vote'            => new sfWidgetFormFilterInput(),
      'title'           => new sfWidgetFormFilterInput(),
      'approved'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'visibility'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'popular_photo'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'raw_ip'          => new sfWidgetFormFilterInput(),
      'photo_fav_list'  => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'photo_vote_list' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'photo_rate_list' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'album_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Album', 'column' => 'id')),
      'user_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'filename'        => new sfValidatorPass(array('required' => false)),
      'hits'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'rating'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'num_comment'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vote'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'title'           => new sfValidatorPass(array('required' => false)),
      'approved'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'visibility'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'popular_photo'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'raw_ip'          => new sfValidatorPass(array('required' => false)),
      'photo_fav_list'  => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'photo_vote_list' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'photo_rate_list' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addPhotoFavListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(PhotoPeer::ID, PhotoFavPeer::PHOTO_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(PhotoFavPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(PhotoFavPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addPhotoVoteListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(PhotoPeer::ID, PhotoVotePeer::PHOTO_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(PhotoVotePeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(PhotoVotePeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addPhotoRateListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(PhotoPeer::ID, PhotoRatePeer::PHOTO_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(PhotoRatePeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(PhotoRatePeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Photo';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'album_id'        => 'ForeignKey',
      'user_id'         => 'ForeignKey',
      'filename'        => 'Text',
      'hits'            => 'Number',
      'created_at'      => 'Date',
      'rating'          => 'Number',
      'num_comment'     => 'Number',
      'vote'            => 'Number',
      'title'           => 'Text',
      'approved'        => 'Boolean',
      'visibility'      => 'Number',
      'popular_photo'   => 'Boolean',
      'raw_ip'          => 'Text',
      'photo_fav_list'  => 'ManyKey',
      'photo_vote_list' => 'ManyKey',
      'photo_rate_list' => 'ManyKey',
    );
  }
}
