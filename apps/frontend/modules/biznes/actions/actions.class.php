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
  public function preExecute()
  {
     $this->bot=array('144.76.195','62.210.170','37.58.100','92.232.53','37.58.100','46.165.197','199.192.207','31.31.72','199.58.86','162.210.196','199.21.99','81.70.141','95.91.179','108.59.8','207.46.13','78.46.94','88.198.247','142.4.209','142.4.213','148.251.124','46.235.12','66.249.79','66.249.65','66.249.67','100.43.90','157.55.39','192.99.149','192.241.242','89.163.224','198.27.82','198.27.64','144.76.95','208.115.111','88.198.160','88.198.247');
  $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
  
 }

  public function executeShow(sfWebRequest $request)
  {
    $this->id = $request->getParameter('id');
    $this->forward404Unless($this->id);
    $solr_query = new SolrQuerySlave4;
    $jsondata = $solr_query->runQuery($this->id, 0, 'similarity');
    $this->title='';

    if($jsondata)
    {
       $json = json_decode($jsondata, true);
       $this->docs = $json['response']['docs'];
       $this->num_found=$json['response']['numFound'];

       $this->similar_products = $json['moreLikeThis'][strval($this->id)]['docs'];
    }

     //set title
     $this->title=$this->docs[0]['title'];
     $this->getResponse()->setTitle(substr($this->title,0,60));
     if(isset($this->docs['description']))
     //if(array_key_exists('description', $this->docs[0])) 
     {
       $this->desc=$this->docs[0]['description'];
       $this->getResponse()->addMeta('description', substr($this->desc,0,155));
     }
  }

  public function executeSearch(sfWebRequest $request)
  {
    $this->query = $request->getParameter('query');
    $this->page=$this->getRequestParameter('page', 1);
    $results_per_page=sfConfig::get('app_pager_biznes');
    $start=($this->page-1)*$results_per_page;
    $solr_query = new SolrQuerySlave4;
    $jsondata = $solr_query->runQuery($this->query, $start, 'biznes_search',$results_per_page);

    if($jsondata)
    {
       $json = json_decode($jsondata, true);
       $this->docs = $json['response']['docs'];
       $this->num_found=$json['response']['numFound'];
    }
     //set title
     $this->getResponse()->setTitle($this->query.' -axtar.az-biznes');
     //paginate feed
    $this->feed_pager = new sfFeedPager('Feed', $results_per_page, $this->num_found);
    $this->feed_pager->setPage($this->page);
    $this->feed_pager->init();

  }

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
