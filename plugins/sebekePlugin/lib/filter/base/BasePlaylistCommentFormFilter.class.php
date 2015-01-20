<?php

/**
 * PlaylistComment filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePlaylistCommentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'playlist_id' => new sfWidgetFormPropelChoice(array('model' => 'Playlist', 'add_empty' => true)),
      'body'        => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'raw_ip'      => new sfWidgetFormFilterInput(),
      'user_id'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'playlist_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Playlist', 'column' => 'id')),
      'body'        => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'raw_ip'      => new sfValidatorPass(array('required' => false)),
      'user_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('playlist_comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PlaylistComment';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'playlist_id' => 'ForeignKey',
      'body'        => 'Text',
      'created_at'  => 'Date',
      'raw_ip'      => 'Text',
      'user_id'     => 'ForeignKey',
    );
  }
}
