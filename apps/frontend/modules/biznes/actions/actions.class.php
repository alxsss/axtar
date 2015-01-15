<?php

/**
 * biznes actions.
 *
 * @package    axtar
 * @subpackage biznes
 * @author     Your name here
 */
class biznesActions extends sfActions
{
   public function executeAutosuggest(sfWebRequest $request)
  {
    $query = $request->getParameter('term');
    $solr_query = new SolrQuerySlave4;
    $jsondata = $solr_query->runQuery($query, 0, 'autosuggest',10);
    if($jsondata)
    {
        $json = json_decode($jsondata, true);
        $this->docs = $json['response']['docs'];
    }
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->Bizness = BiznesQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BiznesForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BiznesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Biznes = BiznesQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Biznes, sprintf('Object Biznes does not exist (%s).', $request->getParameter('id')));
    $this->form = new BiznesForm($Biznes);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Biznes = BiznesQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Biznes, sprintf('Object Biznes does not exist (%s).', $request->getParameter('id')));
    $this->form = new BiznesForm($Biznes);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Biznes = BiznesQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Biznes, sprintf('Object Biznes does not exist (%s).', $request->getParameter('id')));
    $Biznes->delete();

    $this->redirect('biznes/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Biznes = $form->save();

      $this->redirect('biznes/edit?id='.$Biznes->getId());
    }
  }
}
