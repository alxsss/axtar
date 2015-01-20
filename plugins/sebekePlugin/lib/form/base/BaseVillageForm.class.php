<?php

/**
 * Village form base class.
 *
 * @method Village getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseVillageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'name'      => new sfWidgetFormInputText(),
      'region_id' => new sfWidgetFormPropelChoice(array('model' => 'Region', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'      => new sfValidatorString(array('max_length' => 250)),
      'region_id' => new sfValidatorPropelChoice(array('model' => 'Region', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('village[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Village';
  }


}
