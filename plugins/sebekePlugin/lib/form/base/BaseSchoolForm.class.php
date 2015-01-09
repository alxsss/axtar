<?php

/**
 * School form base class.
 *
 * @method School getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSchoolForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'village_id'       => new sfWidgetFormPropelChoice(array('model' => 'Village', 'add_empty' => true)),
      'school_user_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 250)),
      'village_id'       => new sfValidatorPropelChoice(array('model' => 'Village', 'column' => 'id', 'required' => false)),
      'school_user_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('school[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'School';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['school_user_list']))
    {
      $values = array();
      foreach ($this->object->getSchoolUsers() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('school_user_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveSchoolUserList($con);
  }

  public function saveSchoolUserList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['school_user_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(SchoolUserPeer::SCHOOL_ID, $this->object->getPrimaryKey());
    SchoolUserPeer::doDelete($c, $con);

    $values = $this->getValue('school_user_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SchoolUser();
        $obj->setSchoolId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save($con);
      }
    }
  }

}
