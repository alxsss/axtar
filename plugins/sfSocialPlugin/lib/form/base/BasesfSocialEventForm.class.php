<?php

/**
 * sfSocialEvent form base class.
 *
 * @method sfSocialEvent getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfSocialEventForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'user_admin'                => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'title'                     => new sfWidgetFormInputText(),
      'description'               => new sfWidgetFormTextarea(),
      'visibility'                => new sfWidgetFormInputText(),
      'photo'                     => new sfWidgetFormInputText(),
      'start'                     => new sfWidgetFormDateTime(),
      'end'                       => new sfWidgetFormDateTime(),
      'location'                  => new sfWidgetFormInputText(),
      'created_at'                => new sfWidgetFormDateTime(),
      'updated_at'                => new sfWidgetFormDateTime(),
      'sf_social_event_user_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_admin'                => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'title'                     => new sfValidatorString(array('max_length' => 255)),
      'description'               => new sfValidatorString(),
      'visibility'                => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'photo'                     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'start'                     => new sfValidatorDateTime(array('required' => false)),
      'end'                       => new sfValidatorDateTime(array('required' => false)),
      'location'                  => new sfValidatorString(array('max_length' => 255)),
      'created_at'                => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                => new sfValidatorDateTime(array('required' => false)),
      'sf_social_event_user_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_social_event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfSocialEvent';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sf_social_event_user_list']))
    {
      $values = array();
      foreach ($this->object->getsfSocialEventUsers() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('sf_social_event_user_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->savesfSocialEventUserList($con);
  }

  public function savesfSocialEventUserList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sf_social_event_user_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(sfSocialEventUserPeer::EVENT_ID, $this->object->getPrimaryKey());
    sfSocialEventUserPeer::doDelete($c, $con);

    $values = $this->getValue('sf_social_event_user_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new sfSocialEventUser();
        $obj->setEventId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save($con);
      }
    }
  }

}
