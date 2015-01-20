<?php

/**
 * Playlist filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePlaylistFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                => new sfWidgetFormFilterInput(),
      'user_id'             => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'playlist_fav_list'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'playlist_music_list' => new sfWidgetFormPropelChoice(array('model' => 'Music', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                => new sfValidatorPass(array('required' => false)),
      'user_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'playlist_fav_list'   => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'playlist_music_list' => new sfValidatorPropelChoice(array('model' => 'Music', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('playlist_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addPlaylistFavListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(PlaylistPeer::ID, PlaylistFavPeer::PLAYLIST_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(PlaylistFavPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(PlaylistFavPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addPlaylistMusicListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(PlaylistPeer::ID, PlaylistMusicPeer::PLAYLIST_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(PlaylistMusicPeer::MUSIC_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(PlaylistMusicPeer::MUSIC_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Playlist';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'name'                => 'Text',
      'user_id'             => 'ForeignKey',
      'created_at'          => 'Date',
      'playlist_fav_list'   => 'ManyKey',
      'playlist_music_list' => 'ManyKey',
    );
  }
}
