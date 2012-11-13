<?php

/**
 * submiturl actions.
 *
 * @package    axtar
 * @subpackage submiturl
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class submiturlActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    
  }
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UrlForm();
    $this->form->setDefaults(array('name'=>'http://'));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new UrlForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($url = UrlPeer::retrieveByPk($request->getParameter('id')), sprintf('Object url does not exist (%s).', $request->getParameter('id')));
    $this->form = new UrlForm($url);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeSubmitted(sfWebRequest $request)
  {
  }
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $url = $form->save();

      $this->redirect('submiturl/submitted');
    }
  }
}
