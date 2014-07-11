<?php

/**
 * xeber actions.
 *
 * @package    axtar
 * @subpackage xeber
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class xeberActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $rows=20;
    $this->page =$request->getParameter('page', 1);
    $start=$rows*($this->page-1);
    $this->query="*:*";
    $query_db=$this->query;
    $search  = array('.com', '.net', '.az', '.info', '.ru','.tk','.ws');
    $this->query=str_replace('[','',$this->query);
    $this->query=str_replace(']','',$this->query);
    $nb_axtar_results=0;
    $nbResults=0;

    $axtar_query = new XeberQuery;
    $data = $axtar_query->runQuery($this->query, $start,0, $rows);
    if($data)
    {
       $this->axtar_xml = simplexml_load_string($data);
       $this->results=$this->axtar_xml->result->doc;
       $nb_axtar_results=$this->axtar_xml->result[0]->attributes()->numFound;
       error_log('numfound='.$nb_axtar_results.'and results='.count($this->results));
       //get suggestions
       $this->spellcheck=$this->axtar_xml->xpath("//lst[@name='spellcheck']/lst[@name='suggestions']/str[@name='collation']");
    }
    $pages_in_axtar=floor($nb_axtar_results/$rows);
    
    //add this variable to show results that are less than 10
    $residual=$nb_axtar_results%$rows;
    $additional_number=0;
    if($residual>0)$additional_number=1;
    if($this->page<=($pages_in_axtar+$additional_number))
    {
      $this->results=$this->axtar_xml->result;
    }
    
     //get pagination
     $this->feed_pager = new sfFeedPager('Feed', 20, $nb_axtar_results);
     $this->feed_pager->setPage($this->page);
     $this->feed_pager->init();
     //set title
     $this->getResponse()->setTitle('Butun xeberler -axtar.az');

    $cal = new sfCalendarPlugin();

    //Add events to calendar
    $cal->addEvent("2014-06-25","First Event");
    $cal->addEvent("2010-06-28","Second Event");

    //Force user to select a date greater than 2010-01-01 (Optional)
    $cal->setPastLimit("2014-06-25");

    //Force user to select a date smaller than 2011-01-01 (Optional)
    //$cal->setFutureLimit("2011-01-01");

    //We save the calendar class to session (To be used in ajax navigation of months and years)
    $cal->save($this->getUser());

    //We pass on the calendar to the template
    $this->cal = $cal;

  }

 public function executeSearch(sfWebRequest $request)
  {
    if (!$this->query = $request->getParameter('query'))
    {
      return $this->redirect('xeber/index');
    }
    $rows=100;
    $this->page =$request->getParameter('page', 1);
    $this->site=$request->getParameter('site');
    $start=$rows*($this->page-1);
    $this->query=trim($this->query);
    //$this->query=str_replace(' ','+',$this->query);
    $nb_axtar_results=0;
    $this->axtar_feed=0;
//
    $axtar_query = new XeberQuery;
    $data = $axtar_query->runQuery($this->query, $start, 2, 50);
    if($data)
    {
       $this->axtar_xml = simplexml_load_string($data);
       $nb_axtar_results=$this->axtar_xml->result[0]->attributes()->numFound;
       //get suggestions
       $this->spellcheck=$this->axtar_xml->xpath("//lst[@name='spellcheck']/lst[@name='suggestions']/str[@name='collation']");
    }
    $pages_in_axtar=floor($nb_axtar_results/$rows);

    //add this variable to show results that are less than 10
    $residual=$nb_axtar_results%$rows;
    $additional_number=0;
    if($residual>0)$additional_number=1;
    if($this->page<=($pages_in_axtar+$additional_number))
    {
      $this->results=$this->axtar_xml->result;
    }

     //get pagination
     $this->feed_pager = new sfFeedPager('Feed', sfConfig::get('app_pager_search_max'), $nb_axtar_results);
     $this->feed_pager->setPage($this->page);
     $this->feed_pager->init();
  }
 public function executeSearchClst(sfWebRequest $request)
  {
    if (!$this->query = $request->getParameter('query'))
    {
      return $this->redirect('xeber/index');
    }
    $rows=100;
    $this->page =$request->getParameter('page', 1);
    $this->site=$request->getParameter('site');
    $start=$rows*($this->page-1);
    $this->query=trim($this->query);
    //$this->query=str_replace(' ','+',$this->query);
    $nb_axtar_results=0;
    $this->axtar_feed=0;
//
    $axtar_query = new XeberQuery;
    $data = $axtar_query->runQuery($this->query, $start, true, 50);
    if($data)
    {
       $this->axtar_xml = simplexml_load_string($data);
       $nb_axtar_results=$this->axtar_xml->result[0]->attributes()->numFound;
       //get suggestions
       $this->spellcheck=$this->axtar_xml->xpath("//lst[@name='spellcheck']/lst[@name='suggestions']/str[@name='collation']");
    }
    $pages_in_axtar=floor($nb_axtar_results/$rows);

    //add this variable to show results that are less than 10
    $residual=$nb_axtar_results%$rows;
    $additional_number=0;
    if($residual>0)$additional_number=1;
    if($this->page<=($pages_in_axtar+$additional_number))
    {
      $this->results=$this->axtar_xml->result;
      $this->clusters=$this->axtar_xml->xpath("//arr[@name='clusters']/lst");
    }

//
  /*
    $data = $solr_query->runQuery($this->query, $start, true, 100);
    if($data)
    {
       $xml = simplexml_load_string($data );
       $nb_axtar_results=$xml->result[0]->attributes()->numFound;
       //get suggestions
    }

    $pages_in_axtar=floor($nb_axtar_results/10);
    //add this variable to show results that are less than 10
    $residual=$nb_axtar_results%10;
    $additional_number=0;
    if($residual>0)$additional_number=1;
    if($this->page<=($pages_in_axtar+$additional_number))
    {
      $results = array();
      foreach ($xml->result->doc as $story)
      {
        $xmlarray = array();
        try
        {
          foreach ($story as $item)
          {
            $name = $item->attributes()->name;
            $value = $item;
            if($name=='id')
            {
              $xmlarray["content"] =$xml->xpath("//lst[@name='highlighting']/lst[@name='$value']/arr[@name='content']/*");
            }
            if($name=='content')
            {
              continue;
            }
            $xmlarray["$name"] = "$value";
           } // end foreach
        }
        catch (Exception $e)
        {
           echo 'Problem handling  array.';
        }
        //if ($this->debug) echo "checking if ".$xmlarray['score']." > ".$this->min_score;
        //if ($xmlarray['score'] > $this->min_score)
         $results[] = $xmlarray;
      } // end foreach

      $this->results=$results;
      $this->axtar_feed=1;
    }
*/
     //get pagination
     $this->feed_pager = new sfFeedPager('Feed', sfConfig::get('app_pager_search_max'), $nb_axtar_results);
     $this->feed_pager->setPage($this->page);
     $this->feed_pager->init();
  }

   public function executeSearch1(sfWebRequest $request)
  {
    if (!$this->query = trim($request->getParameter('query')))
    {
      return $this->redirect('xeber/index');
    }
    $this->page =$request->getParameter('page', 1);
    $start=10*($this->page-1);
    $this->query=trim($this->query);
    $query_db=$this->query;
    $search  = array('.com', '.net', '.az', '.info', '.ru','.tk','.ws');
    $this->query=str_replace('[','',$this->query);
    $this->query=str_replace(']','',$this->query);
    $nb_axtar_results=0;
    $nbResults=0;

    $axtar_query = new XeberQuery;
    $data = $axtar_query->runQuery($this->query, $start, true, 100);
    if($data)
    {
       $this->axtar_xml = simplexml_load_string($data);
       $nb_axtar_results=$this->axtar_xml->xpath("//lst[@name='grouped']/lst[@name='site']/int[@name='ngroups']");
       $nb_axtar_results=$nb_axtar_results[0];
       //$nb_axtar_results=$xml->result[0]->attributes()->numFound;
       //get suggestions
       $this->spellcheck=$this->axtar_xml->xpath("//lst[@name='spellcheck']/lst[@name='suggestions']/str[@name='collation']");
    }
    $pages_in_axtar=floor($nb_axtar_results/10);
    
    //add this variable to show results that are less than 10
    $residual=$nb_axtar_results%10;
    $additional_number=0;
    if($residual>0)$additional_number=1;
    if($this->page<=($pages_in_axtar+$additional_number))
    {
      $this->results=$this->axtar_xml->xpath("//arr[@name='groups']/lst");
      $this->clusters=$this->axtar_xml->xpath("//arr[@name='clusters']/lst");
    }
        //get pagination
     $this->feed_pager = new sfFeedPager('Feed', sfConfig::get('app_pager_search_max'), $nbResults+$nb_axtar_results);
     $this->feed_pager->setPage($this->page);
     $this->feed_pager->init();
     //set title
     $this->getResponse()->setTitle($this->query.' -axtar.az/xeber');
  }

   public function executeImagesearch(sfWebRequest $request)
  {
    if (!$this->query = trim($request->getParameter('query')))
    {
      return $this->redirect('search/imageindex');
    }
    $limit=sfConfig::get('app_pager_image_search_max');
    $this->page =$request->getParameter('page', 1);
    $start=$limit*($this->page-1);
    $this->query=trim($this->query);
    $query_db=$this->query;
    $search  = array('.com', '.net', '.az', '.info', '.ru','.tk','.ws');
    $this->query=str_replace($search, '',strtolower($this->query));
    $this->query=str_replace('[','',$this->query);
    $this->query=str_replace(']','',$this->query);
    $nb_axtar_results=0;
    $nbResults=0;
    //declare boolean variables for each feed
    $axtar_feed=0;
    $solr_query = new SolrQuery;
    $data = $solr_query->runQuery($this->query, $start,'image');
    if($data)
    {
       $axtar_feed=1;
       $this->axtar_xml = simplexml_load_string($data);
       $nb_axtar_result=$this->axtar_xml->xpath("//result");
       $nb_axtar_results=$nb_axtar_result[0]->attributes()->numFound;
       //get suggestions
       $pages_in_axtar=floor($nb_axtar_results/10);
       $this->results=$this->axtar_xml->xpath("//doc");
    }
    //get pagination
    $this->feed_pager = new sfFeedPager('Feed', $limit, $nb_axtar_results);
    $this->feed_pager->setPage($this->page);
    $this->feed_pager->init();
    //set title
    $this->getResponse()->setTitle($this->query.' -image-axtar.az');
    //save search keyword
    if($this->page==1)
    {
      $search=new Search();
      $search->setQuery($query_db);
      $search->setRawIp($_SERVER['REMOTE_ADDR']);
      $search->save();
    }
  }

}
