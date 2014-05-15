<?php

/**
 * Sponsor form.
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class SponsorForm extends BaseSponsorForm
{
  public function configure()
  {
    unset($this['created_at'], $this['payment']);
    $this->validatorSchema['email']=new sfValidatorEmail();
    //add a post validator
    $this->validatorSchema->setPostValidator(
      new sfValidatorCallback(array('callback' => array($this, 'validateUrl')))
   );
  }
  public static function validateUrl($validator, $values)
  {
   if(!preg_match('/^http:\/\/(www\.)*\w+\.[a-z]{2,4}$/',strtolower($values['url'])))
   {
     $error = new sfValidatorError($validator, 'the url you provided does not have correct form');
     throw new sfValidatorErrorSchema($validator,  array('name' => $error));
   }
   return $values;
  }
}
