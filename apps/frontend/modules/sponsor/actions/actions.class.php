<?php

/**
 * sponsor actions.
 *
 * @package    axtar
 * @subpackage sponsor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class sponsorActions extends sfActions
{
  

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SponsorForm();
    $this->form->setDefaults(array('url'=>'http://'));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new SponsorForm();

    //$this->processForm($request, $this->form);
   $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
    if ($this->form->isValid())
    {
      $sponsor = $this->form->save();
       return 'After';
      //$this->redirect('sponsor/edit?id='.$sponsor->getId());
    }
    else
    {
      $this->setTemplate('new');
    }

      // $this->setTemplate('new');
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($sponsor = SponsorPeer::retrieveByPk($request->getParameter('id')), sprintf('Object sponsor does not exist (%s).', $request->getParameter('id')));
    $this->form = new SponsorForm($sponsor);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($sponsor = SponsorPeer::retrieveByPk($request->getParameter('id')), sprintf('Object sponsor does not exist (%s).', $request->getParameter('id')));
    $sponsor->delete();

    $this->redirect('sponsor/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $sponsor = $form->save();
      //$this->redirect('sponsor/edit?id='.$sponsor->getId());
    }
    else
    {
      $this->setTemplate('new');
    }

  }
}
