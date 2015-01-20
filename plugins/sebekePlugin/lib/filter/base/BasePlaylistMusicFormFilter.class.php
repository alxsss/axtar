<?php

/**
 * PlaylistMusic filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePlaylistMusicFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('playlist_music_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PlaylistMusic';
  }

  public function getFields()
  {
    return array(
      'playlist_id' => 'ForeignKey',
      'music_id'    => 'ForeignKey',
    );
  }
}
