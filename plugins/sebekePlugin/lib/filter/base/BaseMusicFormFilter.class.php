<?php

/**
 * Music filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseMusicFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'url'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'               => new sfWidgetFormFilterInput(),
      'artist'              => new sfWidgetFormFilterInput(),
      'visibility'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'raw_ip'              => new sfWidgetFormFilterInput(),
      'user_id'             => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'playlist_music_list' => new sfWidgetFormPropelChoice(array('model' => 'Playlist', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'url'                 => new sfValidatorPass(array('required' => false)),
      'title'               => new sfValidatorPass(array('required' => false)),
      'artist'              => new sfValidatorPass(array('required' => false)),
      'visibility'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'raw_ip'              => new sfValidatorPass(array('required' => false)),
      'user_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'playlist_music_list' => new sfValidatorPropelChoice(array('model' => 'Playlist', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('music_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
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

    $criteria->addJoin(MusicPeer::ID, PlaylistMusicPeer::MUSIC_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(PlaylistMusicPeer::PLAYLIST_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(PlaylistMusicPeer::PLAYLIST_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Music';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'url'                 => 'Text',
      'title'               => 'Text',
      'artist'              => 'Text',
      'visibility'          => 'Boolean',
      'raw_ip'              => 'Text',
      'user_id'             => 'ForeignKey',
      'created_at'          => 'Date',
      'playlist_music_list' => 'ManyKey',
    );
  }
}
