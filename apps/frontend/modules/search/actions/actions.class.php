<?php

/**
 * search actions.
 *
 * @package    axtar
 * @subpackage search
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class searchActions extends sfActions
{
  public function executeIndextest(sfWebRequest $request)
  {
  }
  public function executeSearchtest(sfWebRequest $request)
  {
    if (!$this->query = $request->getParameter('query'))
    {
      return $this->redirect('search/indextest');	  
    }
    $this->page =$request->getParameter('page', 1);
    $start=10*($this->page-1);
    $this->query=trim($this->query);
    $query_db=$this->query;
    $search  = array('.com', '.net', '.az', '.info', '.ru','.tk','.ws');
    $this->query=str_replace($search, '',strtolower($this->query));
    //$this->query=str_replace(' ','+',$this->query);
    $nb_axtar_results=0;
    $nbResults=0;
    //declare boolean variables for each feed
    $this->axtar_site_feed=0;
    $this->axtar_feed=0;
    $this->feed_feed=0;

    $solr_query = new SolrQueryTest;
    //send additional request for phrase words to display websites with words in url first
    if(count(explode(' ',$this->query))>1&&$this->page<2)
    {
      $site_data=$solr_query->runQuery($this->query, 0,'site');
      if($site_data)
      { 
         $this->axtar_site_feed=1;
         $this->axtar_site_xml = simplexml_load_string($site_data);
         $this->site_results=$this->axtar_site_xml->xpath("//result");
      }
    }
    $data = $solr_query->runQuery($this->query, $start);
    if($data)
    {
       $this->axtar_xml = simplexml_load_string($data);
       $nb_axtar_results=$this->axtar_xml->xpath("//lst[@name='grouped']/lst[@name='site']/int[@name='ngroups']");
       $nb_axtar_results=$nb_axtar_results[0];
       //$nb_axtar_results=$xml->result[0]->attributes()->numFound;
       //get suggestions
       //$this->spellcheck=$xml->xpath("//lst[@name='spellcheck']/lst[@name='suggestions']/str[@name='collation']/*");	
       $this->spellcheck=$this->axtar_xml->xpath("//lst[@name='spellcheck']/lst[@name='suggestions']/str[@name='collation']");	
    }
       
    $pages_in_axtar=floor($nb_axtar_results/10);
    //add this variable to show results that are less than 10
    $residual=$nb_axtar_results%10;	
    $additional_number=0;
    if($residual>0)$additional_number=1;
    if($this->page<=($pages_in_axtar+$additional_number))
    {
      //$this->results=$this->axtar_xml->xpath("//result");
      $this->results=$this->axtar_xml->xpath("//arr[@name='groups']/lst");
      $this->axtar_feed=1;
    }
      //get pagination
     $this->feed_pager = new sfFeedPager('Feed', sfConfig::get('app_pager_search_max'), $nbResults+$nb_axtar_results);
     $this->feed_pager->setPage($this->page);
     $this->feed_pager->init();
     //set title
     $this->getResponse()->setTitle($this->query.' -axtar.az');

  }
  public function executeApi(sfWebRequest $request)
  {
    if (!$this->query = $request->getParameter('query'))
    {
      return $this->redirect('search/index');	  
    }
    $this->page =$request->getParameter('page', 1);
    $start=10*($this->page-1);
    $this->query=trim($this->query);
    $query_db=$this->query;
    $search  = array('.com', '.net', '.az', '.info', '.ru','.tk','.ws');
    $this->query=str_replace($search, '',strtolower($this->query));
    $this->query=str_replace('[','',$this->query);
    $this->query=str_replace(']','',$this->query);

    $solr_query = new SolrQuery;
    //send additional request for phrase words to display websites with words in url first
    $site=$request->getParameter('site');
    $this->data = $solr_query->runQuery($this->query,$start, $site);
  }
  public function executeImageindex(sfWebRequest $request)
  {
  }
  public function executeTestimageindex(sfWebRequest $request)
  {
  }
  public function executeTestimagesearch(sfWebRequest $request)
  {
    if (!$this->query = trim($request->getParameter('query')))
    {
      return $this->redirect('search/testimageindex');	  
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
    $solr_query = new SolrQueryTest;
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
  public function executeAutosuggest(sfWebRequest $request)
  {
    $query = $request->getParameter('term');
    $c=new Criteria();
    $c->add(SearchPeer::QUERY, $query.'%',Criteria::LIKE);
    $c->addGroupByColumn(SearchPeer::QUERY);
    $c->setLimit(5);
    $this->keywords=SearchPeer::doSelect($c);
  }
  public function executeIndex(sfWebRequest $request)
  {
  }
  public function executeMap(sfWebRequest $request)
  {
  }
  
  public function executeSearch(sfWebRequest $request)
  {
    if (!$this->query = trim($request->getParameter('query')))
    {
      return $this->redirect('search/index');	  
    }
    $this->page =$request->getParameter('page', 1);
    $start=10*($this->page-1);
    $this->query=trim($this->query);
    $query_db=$this->query;
    $search  = array('.com', '.net', '.az', '.info', '.ru','.tk','.ws');
    //$this->query=str_replace($search, '',$this->query);
    //$this->query=str_replace(' ','+',$this->query);
    $this->query=str_replace('[','',$this->query);
    $this->query=str_replace(']','',$this->query);
    $nb_axtar_results=0;
    $nbResults=0;
    //declare boolean variables for each feed
    $this->axtar_site_feed=0;
    $this->axtar_feed=0;
    $this->feed_feed=0;

    $solr_query = new SolrQuery;
    //send additional request for phrase words to display websites with words in url first
    if(count(explode(' ',$this->query))>1&&$this->page<2)
    {
      $site_data=$solr_query->runQuery($this->query, 0,'site');
      if($site_data)
      { 
         $this->axtar_site_feed=1;
         $this->axtar_site_xml = simplexml_load_string($site_data);
         //$this->site_results=$this->axtar_site_xml->xpath("//result");
         $this->site_results=$this->axtar_site_xml->xpath("//arr[@name='groups']/lst");
      }
    }
    $data = $solr_query->runQuery($this->query, $start, 'axtar');
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
      //$this->results=$this->axtar_xml->xpath("//result");
      $this->results=$this->axtar_xml->xpath("//arr[@name='groups']/lst");
      $this->axtar_feed=1;
    }
    if($this->page>$pages_in_axtar)
    {
      //$start_yahoo=10*($this->page-$pages_in_axtar-1);
      //bv2
      $cc_key ="dj0yJmk9dkNjZ01PWjZrVllWJmQ9WVdrOWFGRTNiVFJPTlRnbWNHbzlOVFV3TlRVME56WXkmcz1jb25zdW1lcnNlY3JldCZ4PWY3";
      $cc_secret="e3c4e087f77c0eb9da70afedcbf891527e21966a";
      $url = "http://yboss.yahooapis.com/ysearch/web";
      $args = array();
      $args["q"] =$this->query;
      $args["format"] = "xml";
      $start_yahoo=10*($this->page-$pages_in_axtar-1);
      $args["start"] =$start_yahoo;
      $args["count"] =10;
      $consumer = new OAuthConsumer($cc_key, $cc_secret);
      $request = OAuthRequest::from_consumer_and_token($consumer, NULL,"GET", $url, $args);
      $request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);
      $url = sprintf("%s?%s", $url, OAuthUtil::build_http_query($args));
      $ch = curl_init();
      $headers = array($request->to_header());
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_URL, $url);
      $this->xml= simplexml_load_string(curl_exec($ch));
      if($this->xml)
      {
        $nbResults=$this->xml->web['totalresults'];
        if($nbResults>500){$nbResults=500;}
      }
      $this->feed_feed=1;
    }
    else if($this->page+2>$pages_in_axtar)//do not call bss when there is enough result in axtar
    {
       //we need number of pages in bss in this case
       //bv2
       $cc_key ="dj0yJmk9dkNjZ01PWjZrVllWJmQ9WVdrOWFGRTNiVFJPTlRnbWNHbzlOVFV3TlRVME56WXkmcz1jb25zdW1lcnNlY3JldCZ4PWY3";
       $cc_secret="e3c4e087f77c0eb9da70afedcbf891527e21966a";
       $url = "http://yboss.yahooapis.com/ysearch/web";
       $args = array();
       $args["q"] =$this->query;
       $args["format"] = "xml";
       $args["start"] =$start;
       $args["count"] =10;
       $consumer = new OAuthConsumer($cc_key, $cc_secret);
       $request = OAuthRequest::from_consumer_and_token($consumer, NULL,"GET", $url, $args);
       $request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);
       $url = sprintf("%s?%s", $url, OAuthUtil::build_http_query($args));
       $ch = curl_init();
       $headers = array($request->to_header());
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_HEADER, 0);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_URL, $url);
       $this->xml= simplexml_load_string(curl_exec($ch));
       if($this->xml)
       {
         $nbResults=$this->xml->web['totalresults'];
         if($nbResults>500){$nbResults=500;}
       }
    }
      //get pagination
     $this->feed_pager = new sfFeedPager('Feed', sfConfig::get('app_pager_search_max'), $nbResults+$nb_axtar_results);
     $this->feed_pager->setPage($this->page);
     $this->feed_pager->init();
     //set title
     $this->getResponse()->setTitle($this->query.' -axtar.az');
    //save search keyword
    if($this->page==1)
    {
      $search=new Search();
      $search->setQuery($query_db);
      $search->setRawIp($_SERVER['REMOTE_ADDR']);
      $search->save();	
    }
  }
 public function executeSearchsite(sfWebRequest $request)
  {
    if (!$this->query = $request->getParameter('query'))
    {
      return $this->redirect('search/index');	  
    }
    $this->page =$request->getParameter('page', 1);
    $this->site=$request->getParameter('site');
    $start=10*($this->page-1);
    $this->query=trim($this->query);
    //$this->query=str_replace(' ','+',$this->query);
    $this->query=str_replace('[','',$this->query);
    $this->query=str_replace(']','',$this->query);
    $nb_axtar_results=0;
    $this->axtar_feed=0;
    $solr_query = new SolrQuery;
    $data = $solr_query->runQuery($this->query, $start,$this->site);
    if($data)
    {
       $xml = simplexml_load_string($data );
       $nb_axtar_results=$xml->result[0]->attributes()->numFound;
       //get suggestions
       //$this->spellcheck=$xml->xpath("//lst[@name='spellcheck']/lst[@name='suggestions']/str[@name='collation']/*");	
       //$this->spellcheck=$xml->xpath("//lst[@name='spellcheck']/lst[@name='suggestions']/str[@name='collation']");	
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
        if ($xmlarray['score'] > $this->min_score) $results[] = $xmlarray;
      } // end foreach

      $this->results=$results;
      $this->axtar_feed=1;
    }
     //get pagination
     $this->feed_pager = new sfFeedPager('Feed', sfConfig::get('app_pager_search_max'), $nb_axtar_results);
     $this->feed_pager->setPage($this->page);
     $this->feed_pager->init();
  }
    
  public function executeTranslate(sfWebRequest $request)
  {
  }
  public function executeTranslateword(sfWebRequest $request)
  {
    if(!$request->isXmlHttpRequest())
    {
      $source_lang=$request->getParameter('source_lang');
      $target_lang=$request->getParameter('target_lang');
      $url='https://www.googleapis.com/language/translate/v2?key=AIzaSyAhUzPLVkbSsIH9dkLE4e3iNQkJ7sOL3sU&q='.$word.'&source='.$source_lang.'&target='.$target_lang;
      $this->xml=simplexml_load_file($uri) or die("feed not loading");
    }
  }
    
  public function executeSearchfacetsearch(sfWebRequest $request)
  {
    if (!$this->query = $request->getParameter('query'))
    {
      return $this->redirect('search/searchfacet');	  
    }
    $this->query=trim($this->query);
    $this->filter=trim($request->getParameter('filter'));
    $nbResults=0;
    if(!empty($this->filter))
    {
      $this->query=$this->query.','.$this->filter;
      $fp = fopen('/var/axtar/data/facetsearch.txt', 'a');
      fwrite($fp, $this->query."\n");
      fclose($fp);
    }
    //boss
    $uri='http://boss.yahooapis.com/ysearch/web/v1/'.$this->query.'?appid=VfS3XdnV34FuehbJhYqk_y2NPcdfzDCLYs7BCDbrARVn4NbVu99Xlp11sb4i0Lw-&lang=en&format=xml';
    $this->xml=simplexml_load_file($uri) or die("feed not loading");
  }
}
