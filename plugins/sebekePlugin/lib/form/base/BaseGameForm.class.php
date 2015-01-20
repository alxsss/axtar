<?php

/**
 * Game form base class.
 *
 * @method Game getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGameForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'game_category_id'    => new sfWidgetFormPropelChoice(array('model' => 'GameCategory', 'add_empty' => true)),
      'name'                => new sfWidgetFormInputText(),
      'description'         => new sfWidgetFormTextarea(),
      'embed_code'          => new sfWidgetFormTextarea(),
      'thumb'               => new sfWidgetFormTextarea(),
      'creative_screenshot' => new sfWidgetFormTextarea(),
      'created_at'          => new sfWidgetFormDateTime(),
      'score'               => new sfWidgetFormInputText(),
      'game_user_list'      => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'game_category_id'    => new sfValidatorPropelChoice(array('model' => 'GameCategory', 'column' => 'id', 'required' => false)),
      'name'                => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'description'         => new sfValidatorString(array('required' => false)),
      'embed_code'          => new sfValidatorString(array('required' => false)),
      'thumb'               => new sfValidatorString(array('required' => false)),
      'creative_screenshot' => new sfValidatorString(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
      'score'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'game_user_list'      => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('game[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Game';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['game_user_list']))
    {
      $values = array();
      foreach ($this->object->getGameUsers() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('game_user_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveGameUserList($con);
  }

  public function saveGameUserList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['game_user_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(GameUserPeer::GAME_ID, $this->object->getPrimaryKey());
    GameUserPeer::doDelete($c, $con);

    $values = $this->getValue('game_user_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new GameUser();
        $obj->setGameId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save($con);
      }
    }
  }

}
