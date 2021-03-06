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
  public function preExecute()
  {
     $this->bot=array('148.251.236','68.180.228','194.187.168','78.46.174','188.165.15','144.76.85','144.76.195','62.210.170','37.58.100','92.232.53','37.58.100','46.165.197','199.192.207','31.31.72','199.58.86','162.210.196','199.21.99','81.70.141','95.91.179','108.59.8','207.46.13','78.46.94','88.198.247','142.4.209','142.4.213','148.251.124','46.235.12','66.249.79','66.249.65','66.249.67','100.43.90','157.55.39','192.99.149','192.241.242','89.163.224','198.27.82','198.27.64','144.76.95','208.115.111','88.198.160','88.198.247');
  $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
  }
    public function executeAddComment(sfWebRequest $request)
  {
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {

      $this->xeber_id = $request->getParameter('item_id');
      $title = $request->getParameter('item_title');
      $this->forward404Unless($this->xeber_id);
      $comment_body=$request->getParameter('comment');
      if (!empty($comment_body))
      {
        // create answer
        $this->comment = new XeberComment();
        $this->comment->setXeberId($this->xeber_id);
        $this->comment->setComment($comment_body);
        $this->comment->setUserId($this->user_id);
        $this->comment->setRawIp($_SERVER['REMOTE_ADDR']);
        $this->comment->save1($this->xeber_id,$title);
      }//end if body
   return sfView::SUCCESS;
  }
}


  public function executeShow(sfWebRequest $request)
  {
    $this->id = $request->getParameter('id');
    $this->forward404Unless($this->id);
    $xeber_query = new XeberQuery;
    $rows=5;
    $jsondata = $xeber_query->runQuery($this->id, 0, 2,$rows);
    $this->title='';
    $this->similar_products = '';
    if($jsondata)
    {
       $json = json_decode($jsondata, true);
       $this->docs = $json['response']['docs'];
       $this->num_found=$json['response']['numFound'];

       if(isset($json['moreLikeThis'][strval($this->id)]))
       {
         $this->similar_products = $json['moreLikeThis'][strval($this->id)]['docs'];
       }
    }

     //set title
     $this->title=$this->docs[0]['title'];
     $this->getResponse()->setTitle(substr($this->title,0,60));
     if(isset($this->docs['description']))
     {
       $this->desc=$this->docs[0]['description'];
       $this->getResponse()->addMeta('description', substr($this->desc,0,155));
     }

  }
 public function executeSearchgrtest(sfWebRequest $request)
  {
    if (!$this->query = $request->getParameter('query'))
    {
      return $this->redirect('xeber/indextest');
    }
    $rows=20;
    $this->page =$request->getParameter('page', 1);
    $start=$rows*($this->page-1);
    $this->query=htmlspecialchars(trim($this->query), ENT_QUOTES);
    $nb_axtar_results=0;
    $axtar_query = new XeberQuery;
    $data = $axtar_query->runQuery($this->query, $start, 3, $rows);

    if($data)
    {
       $this->axtar_xml = simplexml_load_string($data);
       $nb_axtar_results=$this->axtar_xml->xpath("//lst[@name='grouped']/lst[@name='site']/int[@name='ngroups']");
       $nb_axtar_results=$nb_axtar_results[0];
       //get suggestions
       $this->results=$this->axtar_xml->xpath("//arr[@name='groups']/lst");
       $this->spellcheck=$this->axtar_xml->xpath("//lst[@name='spellcheck']/lst[@name='suggestions']/str[@name='collation']");
    }
     //get pagination
     $this->feed_pager = new sfFeedPager('Feed', $rows, $nb_axtar_results);
     $this->feed_pager->setPage($this->page);
     $this->feed_pager->init();

      //set title
     $this->getResponse()->setTitle($this->query.' -axtar.az/xeber');
 
     //extract ip without digits after last dot
     $remote_ip=$_SERVER['REMOTE_ADDR'];
     $ip = substr($remote_ip, 0, strrpos($remote_ip, "."));
     $user_agent=$_SERVER["HTTP_USER_AGENT"];
         
     //if($this->page==1&&!in_array($ip,$this->bot)) 
     if($this->page==1&&!(strpos(strtolower($user_agent),'bot')||in_array($ip,$this->bot)) ) 
     {
       $search=new Search();
       $search->setQuery($this->query);
       $search->setModule('xeber');
       $search->setRawIp($_SERVER['REMOTE_ADDR']);
       if(isset($_SERVER['HTTP_REFERER'])) {
         $search->setReferer(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST));
       }
       $search->save();
     }
  }

 public function executeSearchgr(sfWebRequest $request)
  {
    if (!$this->query = $request->getParameter('query'))
    {
      return $this->redirect('xeber/index');
    }
    $rows=20;
    $this->page =$request->getParameter('page', 1);
    if($this->page>1000)
    {
      $this->page=1000;
    }
    $start=$rows*($this->page-1);
    //$this->query=htmlspecialchars(trim($this->query), ENT_NOQUOTES);
    $this->query=trim($this->query);
    $nb_axtar_results=0;
    $axtar_query = new XeberQuery;
    $data = $axtar_query->runQuery($this->query, $start, 3, $rows);

    if($data)
    {
       $this->axtar_xml = simplexml_load_string($data);
       $nb_axtar_results=$this->axtar_xml->xpath("//lst[@name='grouped']/lst[@name='site']/int[@name='ngroups']");
       $nb_axtar_results=$nb_axtar_results[0];
       //get suggestions
       $this->results=$this->axtar_xml->xpath("//arr[@name='groups']/lst");
       $this->spellcheck=$this->axtar_xml->xpath("//lst[@name='spellcheck']/lst[@name='suggestions']/str[@name='collation']");
    }
/*
 $pages_in_axtar=floor($nb_axtar_results/$rows); 
     //add this variable to show results that are less than 10
    $residual=$nb_axtar_results%$rows;
    $additional_number=0;
    if($residual>0)$additional_number=1;
    if($this->page<=($pages_in_axtar+$additional_number))
    {
      $this->results=$this->axtar_xml->xpath("//arr[@name='groups']/lst");
    }
  */
     //get pagination
     $this->feed_pager = new sfFeedPager('Feed', $rows, $nb_axtar_results);
     $this->feed_pager->setPage($this->page);
     $this->feed_pager->init();

      //set title
     $this->getResponse()->setTitle($this->query.' -axtar.az/xeber');
 
     //extract ip without digits after last dot
     $remote_ip=$_SERVER['REMOTE_ADDR'];
     $ip = substr($remote_ip, 0, strrpos($remote_ip, "."));
     $user_agent=$_SERVER["HTTP_USER_AGENT"];
         
     //if($this->page==1&&!in_array($ip,$this->bot)) 
     if($this->page==1&&!(strpos(strtolower($user_agent),'bot')||in_array($ip,$this->bot)) ) 
     {
       $search=new Search();
       $search->setQuery($this->query);
       $search->setModule('xeber');
       $search->setRawIp($_SERVER['REMOTE_ADDR']);
       if(isset($_SERVER['HTTP_REFERER'])) {
         $search->setReferer(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST));
       }
       $search->save();
     }
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $rows=20;
    $this->page =$request->getParameter('page', 1);
    //restrict page for more than 1000, since robots make requests for the last documents, which is a bug in solr ann possible gives OM heap space error
    if($this->page>1000)
    { 
      $this->page=1000; 
    }
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
     $this->feed_pager = new sfFeedPager('Feed', $rows, $nb_axtar_results);
     $this->feed_pager->setPage($this->page);
     $this->feed_pager->init();
     //set title
     $this->getResponse()->setTitle('Butun xeberler ve onlarda olan acar sozler -axtar.az');

/*    $cal = new sfCalendarPlugin();

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
*/
  }
 public function executeSearchsite(sfWebRequest $request)
  {
    if (!$this->query = $request->getParameter('query'))
    {
      return $this->redirect('search/index');	  
    }
    $this->page =$request->getParameter('page', 1);
    $this->site=$request->getParameter('site');
    if($this->page>1000)
    {
      $this->page=1000;
    }
    $start=10*($this->page-1);
    $this->query=trim($this->query);
    //$this->query=str_replace(' ','+',$this->query);
    $this->query=str_replace('[','',$this->query);
    $this->query=str_replace(']','',$this->query);
    $solr_query = new XeberQuery;
    $data = $solr_query->runQuery($this->query, $start,5, 20, $this->site);
    if($data)
    {
       $xml = simplexml_load_string($data);
       $nb_axtar_results=$xml->result[0]->attributes()->numFound;
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
        $results[] = $xmlarray;
      } // end foreach

      $this->results=$results;
      $this->axtar_feed=1;
    }
     //get pagination
     $this->feed_pager = new sfFeedPager('Feed', sfConfig::get('app_pager_search_max'), $nb_axtar_results);
     $this->feed_pager->setPage($this->page);
     $this->feed_pager->init();
  }

 public function executeSearch(sfWebRequest $request)
  {
    if (!$this->query = $request->getParameter('query'))
    {
      return $this->redirect('xeber/index');
    }
    $rows=20;
    $this->page =$request->getParameter('page', 1);
    if($this->page>1000)
    {
      $this->page=1000;
    }

    $this->site=$request->getParameter('site');
    $start=$rows*($this->page-1);
    $this->query=trim($this->query);
    //$this->query=str_replace(' ','+',$this->query);
    $nb_axtar_results=0;
    $this->axtar_feed=0;
//
    $axtar_query = new XeberQuery;
    $data = $axtar_query->runQuery($this->query, $start, 2, $rows);
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
      //set title
     $this->getResponse()->setTitle($this->query.' -axtar.az/xeber');
     
     $remote_ip=$_SERVER['REMOTE_ADDR'];
     $ip = substr($remote_ip, 0, strrpos($remote_ip, "."));
     $user_agent=$_SERVER["HTTP_USER_AGENT"];
    // if($this->page==1&&!in_array($_SERVER['REMOTE_ADDR'],$this->bot))
     if($this->page==1&&!(strpos(strtolower($user_agent),'bot')||in_array($ip,$this->bot)) )
 
     {
       $search=new Search();
       $search->setQuery($this->query);
       $search->setModule('xeber');
       $search->setRawIp($_SERVER['REMOTE_ADDR']);
       $search->setReferer(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST));
       $search->save();
     }
  }
 public function executeSearchClst(sfWebRequest $request)
  {
    if (!$this->query = $request->getParameter('query'))
    {
      return $this->redirect('xeber/index');
    }
    $rows=100;
    $this->page =$request->getParameter('page', 1);
    if($this->page>1000)
    {
      $this->page=1000;
    }

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
    if($this->page>1000)
    {
      $this->page=1000;
    }

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
    if($this->page>1000)
    {
      $this->page=1000;
    }

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
      $search->setModule('xeberimage');
      $search->setRawIp($_SERVER['REMOTE_ADDR']);
      $search->setReferer(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST));
      $search->save();
    }
  }

}
