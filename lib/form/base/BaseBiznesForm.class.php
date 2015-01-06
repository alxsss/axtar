<?php

/**
 * Biznes form base class.
 *
 * @method Biznes getObject() Returns the current form's model object
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseBiznesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'user_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'address'          => new sfWidgetFormInputText(),
      'telefon'          => new sfWidgetFormInputText(),
      'website'          => new sfWidgetFormInputText(),
      'photo'            => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'rating'           => new sfWidgetFormInputText(),
      'num_comment'      => new sfWidgetFormInputText(),
      'title'            => new sfWidgetFormInputText(),
      'approved'         => new sfWidgetFormInputCheckbox(),
      'visibility'       => new sfWidgetFormInputText(),
      'biznes_fav_list'  => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
      'biznes_rate_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'          => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'address'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefon'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'website'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photo'            => new sfValidatorString(array('max_length' => 255)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'rating'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'num_comment'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'title'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'approved'         => new sfValidatorBoolean(array('required' => false)),
      'visibility'       => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'biznes_fav_list'  => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
      'biznes_rate_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('biznes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Biznes';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['biznes_fav_list']))
    {
      $values = array();
      foreach ($this->object->getBiznesFavs() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('biznes_fav_list', $values);
    }

    if (isset($this->widgetSchema['biznes_rate_list']))
    {
      $values = array();
      foreach ($this->object->getBiznesRates() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('biznes_rate_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveBiznesFavList($con);
    $this->saveBiznesRateList($con);
  }

  public function saveBiznesFavList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['biznes_fav_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(BiznesFavPeer::BIZNES_ID, $this->object->getPrimaryKey());
    BiznesFavPeer::doDelete($c, $con);

    $values = $this->getValue('biznes_fav_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new BiznesFav();
        $obj->setBiznesId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save($con);
      }
    }
  }

  public function saveBiznesRateList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['biznes_rate_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(BiznesRatePeer::BIZNES_ID, $this->object->getPrimaryKey());
    BiznesRatePeer::doDelete($c, $con);

    $values = $this->getValue('biznes_rate_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new BiznesRate();
        $obj->setBiznesId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save($con);
      }
    }
  }

}
