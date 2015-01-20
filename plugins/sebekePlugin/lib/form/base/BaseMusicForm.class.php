<?php

/**
 * Music form base class.
 *
 * @method Music getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseMusicForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'url'                 => new sfWidgetFormInputText(),
      'title'               => new sfWidgetFormInputText(),
      'artist'              => new sfWidgetFormInputText(),
      'visibility'          => new sfWidgetFormInputCheckbox(),
      'raw_ip'              => new sfWidgetFormInputText(),
      'user_id'             => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'created_at'          => new sfWidgetFormDateTime(),
      'playlist_music_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Playlist')),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'url'                 => new sfValidatorString(array('max_length' => 255)),
      'title'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'artist'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'visibility'          => new sfValidatorBoolean(array('required' => false)),
      'raw_ip'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'user_id'             => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
      'playlist_music_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Playlist', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('music[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Music';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['playlist_music_list']))
    {
      $values = array();
      foreach ($this->object->getPlaylistMusics() as $obj)
      {
        $values[] = $obj->getPlaylistId();
      }

      $this->setDefault('playlist_music_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->savePlaylistMusicList($con);
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
    $c->add(PlaylistMusicPeer::MUSIC_ID, $this->object->getPrimaryKey());
    PlaylistMusicPeer::doDelete($c, $con);

    $values = $this->getValue('playlist_music_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new PlaylistMusic();
        $obj->setMusicId($this->object->getPrimaryKey());
        $obj->setPlaylistId($value);
        $obj->save($con);
      }
    }
  }

}
