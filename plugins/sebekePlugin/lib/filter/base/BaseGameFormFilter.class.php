<?php

/**
 * Game filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGameFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'game_category_id'    => new sfWidgetFormPropelChoice(array('model' => 'GameCategory', 'add_empty' => true)),
      'name'                => new sfWidgetFormFilterInput(),
      'description'         => new sfWidgetFormFilterInput(),
      'embed_code'          => new sfWidgetFormFilterInput(),
      'thumb'               => new sfWidgetFormFilterInput(),
      'creative_screenshot' => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'score'               => new sfWidgetFormFilterInput(),
      'game_user_list'      => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'game_category_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'GameCategory', 'column' => 'id')),
      'name'                => new sfValidatorPass(array('required' => false)),
      'description'         => new sfValidatorPass(array('required' => false)),
      'embed_code'          => new sfValidatorPass(array('required' => false)),
      'thumb'               => new sfValidatorPass(array('required' => false)),
      'creative_screenshot' => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'score'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'game_user_list'      => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('game_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addGameUserListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(GamePeer::ID, GameUserPeer::GAME_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(GameUserPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(GameUserPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Game';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'game_category_id'    => 'ForeignKey',
      'name'                => 'Text',
      'description'         => 'Text',
      'embed_code'          => 'Text',
      'thumb'               => 'Text',
      'creative_screenshot' => 'Text',
      'created_at'          => 'Date',
      'score'               => 'Number',
      'game_user_list'      => 'ManyKey',
    );
  }
}
