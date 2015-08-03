<?php

/**
 * Advertise form.
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class AdvertiseForm extends BaseAdvertiseForm
{
  public function configure()
  {
    $this->widgetSchema['ip'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['company']->setOption('required', false);
    $this->validatorSchema['phone']->setOption('required', false);
    $this->validatorSchema['email']=new sfValidatorEmail();	
  }
}
