<?php

/**
 * Biznes form.
 *
 * @package    axtar
 * @subpackage form
 * @author     Your name here
 */
class BiznesForm extends BaseBiznesForm
{
  public function configure()
  {

     $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
     //$this->widgetSchema['approved'] = new sfWidgetFormInputHidden();

     sfContext::getInstance()->getConfiguration()->loadHelpers('I18N');
    
     //$this->widgetSchema['address'] = new sfWidgetFormInput(array(), array('size'=>79));

     $this->widgetSchema['photo'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Biznes picture',
      'file_src'  => $this->getObject()->getPhoto()?'/uploads/assets/biznes/'.$this->getObject()->getPhoto():'',
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div>%file%<br />%input%<br />%delete% '.__('remove the current file').'</div>',
    ));
    $this->validatorSchema['photo_delete'] = new sfValidatorPass();

    $this->validatorSchema['photo'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/assets/biznes/',
      'validated_file_class' => 'FileSaveProfileThumb')
      );
   $this->validatorSchema->setPostValidator( new sfValidatorCallback(array('callback' => array($this, 'checkFile'))) );
  }

 public function checkFile($validator, $values)
 {
   if(isset($values["photo"]))
   {
     $filename=$values["photo"]->getOriginalName();
     $ext  = substr($filename, -3, 3);
     if (!($this->isMedia($ext)) )
     {
      $error = new sfValidatorError($validator, __('This is not an image file(png,jpg,gif,bmp,tiff)'));
       // throw an error bound to the password field
      throw new sfValidatorErrorSchema($validator, array('photo' => $error));
     }
   }
   return $values;
 }
 protected function isMedia($ext)
 {
   return in_array(strtolower($ext), array('png', 'jpg', 'gif','bmp','jpeg','tiff'));
 }

}
