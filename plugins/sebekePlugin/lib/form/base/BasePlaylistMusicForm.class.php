<?php

/**
 * PlaylistMusic form base class.
 *
 * @method PlaylistMusic getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePlaylistMusicForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'playlist_id' => new sfWidgetFormInputHidden(),
      'music_id'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'playlist_id' => new sfValidatorPropelChoice(array('model' => 'Playlist', 'column' => 'id', 'required' => false)),
      'music_id'    => new sfValidatorPropelChoice(array('model' => 'Music', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('playlist_music[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PlaylistMusic';
  }


}
