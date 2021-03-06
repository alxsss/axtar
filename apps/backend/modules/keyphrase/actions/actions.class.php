<?php

require_once dirname(__FILE__).'/../lib/keyphraseGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/keyphraseGeneratorHelper.class.php';

/**
 * keyphrase actions.
 *
 * @package    axtar
 * @subpackage keyphrase
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class keyphraseActions extends autoKeyphraseActions
{
   public function executeEdit(sfWebRequest $request)
  {
    $this->Keyphrase = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Keyphrase);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->Keyphrase = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Keyphrase);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }



  public function executeBatchEdit(sfWebRequest $request)
  {
     $ids = $request->getParameter('ids');
     $count = 0;
     foreach (KeyphrasePeer::retrieveByPks($ids) as $object)
     {
       $object->setActive(1);
       $this->dispatcher->notify(new sfEvent($this, 'admin.edit_object', array('object' => $object)));
       //$this->form = $this->configuration->getForm($object);
       //$this->processForm($request, $this->form);
         $count++;
       $object->save();
      
       if(!$this->deleteDir('/home/www/axtar/cache/frontend/'))
       {
         error_log('error removing cache folder');
       }
     }
     if ($count >= count($ids))
     {
       $this->getUser()->setFlash('notice', 'The selected items have been edited successfully.');
     }
     else
     {
       $this->getUser()->setFlash('error', 'A problem occurs when editing the selected items.');
     }
     $this->setTemplate('index');
  }

  protected function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        //throw new InvalidArgumentException("$dirPath must be a directory");
        return false;
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
  }
}
