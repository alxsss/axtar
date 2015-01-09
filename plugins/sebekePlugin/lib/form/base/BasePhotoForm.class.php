<?php

/**
 * Photo form base class.
 *
 * @method Photo getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePhotoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'album_id'        => new sfWidgetFormPropelChoice(array('model' => 'Album', 'add_empty' => true)),
      'user_id'         => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'filename'        => new sfWidgetFormInputText(),
      'hits'            => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'rating'          => new sfWidgetFormInputText(),
      'num_comment'     => new sfWidgetFormInputText(),
      'vote'            => new sfWidgetFormInputText(),
      'title'           => new sfWidgetFormInputText(),
      'approved'        => new sfWidgetFormInputCheckbox(),
      'visibility'      => new sfWidgetFormInputText(),
      'popular_photo'   => new sfWidgetFormInputCheckbox(),
      'raw_ip'          => new sfWidgetFormInputText(),
      'photo_fav_list'  => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
      'photo_vote_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
      'photo_rate_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'album_id'        => new sfValidatorPropelChoice(array('model' => 'Album', 'column' => 'id', 'required' => false)),
      'user_id'         => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'filename'        => new sfValidatorString(array('max_length' => 255)),
      'hits'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'rating'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'num_comment'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'vote'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'title'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'approved'        => new sfValidatorBoolean(array('required' => false)),
      'visibility'      => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'popular_photo'   => new sfValidatorBoolean(array('required' => false)),
      'raw_ip'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'photo_fav_list'  => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
      'photo_vote_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
      'photo_rate_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photo';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['photo_fav_list']))
    {
      $values = array();
      foreach ($this->object->getPhotoFavs() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('photo_fav_list', $values);
    }

    if (isset($this->widgetSchema['photo_vote_list']))
    {
      $values = array();
      foreach ($this->object->getPhotoVotes() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('photo_vote_list', $values);
    }

    if (isset($this->widgetSchema['photo_rate_list']))
    {
      $values = array();
      foreach ($this->object->getPhotoRates() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('photo_rate_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->savePhotoFavList($con);
    $this->savePhotoVoteList($con);
    $this->savePhotoRateList($con);
  }

  public function savePhotoFavList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['photo_fav_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(PhotoFavPeer::PHOTO_ID, $this->object->getPrimaryKey());
    PhotoFavPeer::doDelete($c, $con);

    $values = $this->getValue('photo_fav_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new PhotoFav();
        $obj->setPhotoId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save($con);
      }
    }
  }

  public function savePhotoVoteList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['photo_vote_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(PhotoVotePeer::PHOTO_ID, $this->object->getPrimaryKey());
    PhotoVotePeer::doDelete($c, $con);

    $values = $this->getValue('photo_vote_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new PhotoVote();
        $obj->setPhotoId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save($con);
      }
    }
  }

  public function savePhotoRateList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['photo_rate_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(PhotoRatePeer::PHOTO_ID, $this->object->getPrimaryKey());
    PhotoRatePeer::doDelete($c, $con);

    $values = $this->getValue('photo_rate_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new PhotoRate();
        $obj->setPhotoId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save($con);
      }
    }
  }

}
