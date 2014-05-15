<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Sponsor filter form base class.
 *
 * @package    axtar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseSponsorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'url'         => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'start'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'end'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'email'       => new sfWidgetFormFilterInput(),
      'phone'       => new sfWidgetFormFilterInput(),
      'comment'     => new sfWidgetFormFilterInput(),
      'payment'     => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'url'         => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'start'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'end'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'email'       => new sfValidatorPass(array('required' => false)),
      'phone'       => new sfValidatorPass(array('required' => false)),
      'comment'     => new sfValidatorPass(array('required' => false)),
      'payment'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('sponsor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sponsor';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'url'         => 'Text',
      'description' => 'Text',
      'start'       => 'Date',
      'end'         => 'Date',
      'email'       => 'Text',
      'phone'       => 'Text',
      'comment'     => 'Text',
      'payment'     => 'Number',
      'created_at'  => 'Date',
    );
  }
}
