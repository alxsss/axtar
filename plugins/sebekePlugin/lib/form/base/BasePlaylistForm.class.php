<?php

/**
 * Playlist form base class.
 *
 * @method Playlist getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePlaylistForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'name'                => new sfWidgetFormInputText(),
      'user_id'             => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'created_at'          => new sfWidgetFormDateTime(),
      'playlist_fav_list'   => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
      'playlist_music_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Music')),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_id'             => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
      'playlist_fav_list'   => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
      'playlist_music_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Music', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('playlist[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Playlist';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['playlist_fav_list']))
    {
      $values = array();
      foreach ($this->object->getPlaylistFavs() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('playlist_fav_list', $values);
    }

    if (isset($this->widgetSchema['playlist_music_list']))
    {
      $values = array();
      foreach ($this->object->getPlaylistMusics() as $obj)
      {
        $values[] = $obj->getMusicId();
      }

      $this->setDefault('playlist_music_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->savePlaylistFavList($con);
    $this->savePlaylistMusicList($con);
  }

  public function savePlaylistFavList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['playlist_fav_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(PlaylistFavPeer::PLAYLIST_ID, $this->object->getPrimaryKey());
    PlaylistFavPeer::doDelete($c, $con);

    $values = $this->getValue('playlist_fav_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new PlaylistFav();
        $obj->setPlaylistId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save($con);
      }
    }
  }

  public function savePlaylistMusicList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['playlist_music_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(PlaylistMusicPeer::PLAYLIST_ID, $this->object->getPrimaryKey());
    PlaylistMusicPeer::doDelete($c, $con);

    $values = $this->getValue('playlist_music_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new PlaylistMusic();
        $obj->setPlaylistId($this->object->getPrimaryKey());
        $obj->setMusicId($value);
        $obj->save($con);
      }
    }
  }

}
