<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Search filter form base class.
 *
 * @package    axtar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseSearchFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'query'      => new sfWidgetFormFilterInput(),
      'raw_ip'     => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'query'      => new sfValidatorPass(array('required' => false)),
      'raw_ip'     => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
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
      'id'         => 'Number',
      'query'      => 'Text',
      'raw_ip'     => 'Text',
      'created_at' => 'Date',
    );
  }
}
