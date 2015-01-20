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
     $ids = $request->getParameter(‘ids’);
     $count = 0;
     foreach (KeyphrasePeer::retrieveByPks($ids) as $object)
     {
       $this->dispatcher->notify(new sfEvent($this, 'admin.edit_object', array('object' => $object)));
       $this->form = $this->configuration->getForm($object);
       $this->processForm($request, $this->form);
         $count++;
     }
    if ($count >= count($ids))
    {
      $this->getUser()->setFlash('notice', 'The selected items have been edited successfully.');
    }
    else
    {
      $this->getUser()->setFlash('error', 'A problem occurs when editing the selected items.');
    }
    $this->setTemplate('edit');
}

}
