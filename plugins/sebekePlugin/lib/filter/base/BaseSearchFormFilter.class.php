<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Search filter form base class.
 *
 * @package    hemsinif
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseSearchFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'query' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'query' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('search_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Search';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'query' => 'Text',
    );
  }
}
