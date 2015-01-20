<?php

/**
 * PlaylistComment form base class.
 *
 * @method PlaylistComment getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePlaylistCommentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'playlist_id' => new sfWidgetFormPropelChoice(array('model' => 'Playlist', 'add_empty' => false)),
      'body'        => new sfWidgetFormTextarea(),
      'created_at'  => new sfWidgetFormDateTime(),
      'raw_ip'      => new sfWidgetFormInputText(),
      'user_id'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'playlist_id' => new sfValidatorPropelChoice(array('model' => 'Playlist', 'column' => 'id')),
      'body'        => new sfValidatorString(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'raw_ip'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'user_id'     => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('playlist_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PlaylistComment';
  }


}
