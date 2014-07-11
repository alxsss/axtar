<?php
//define('SOLR_META_QUERY', '127.0.0.1:8983');
define('SOLR_META_QUERY', '192.168.1.5:8984');
class SolrQueryTest {
  //All of these init privateiables are yours to define, these are just examples
  private $type = "";
  private $language_id = 0;
  private $lowerdate = 0; // lower bound of date range
  private $upperdate = 0; // upper bound of date range
  private $limit = 10; // number of result to return
  private $min_score = 0; // only add these values if they are above this score
  private $httppost=false; // set to true to send via HTTP POST (form) instead of HTTP GET (url)
  private $debug=false;//true; // turn on debugging mode (not fully complete)
  // Reset or initialize variables
  public function __construct() {
    $this->type = "";
    $this->language_id = 0;
    $this->lowerdate = 0;
    $this->upperdate = 0;
    $this->limit = 100;
    $this->min_score = 0.0; // only add these values if they are above this score
    $this->httppost=false;	        
  } 
  // Example of a query -- different queries with their own logic should be made as separate functions
  public function runQuery($query, $start, $site='')
  {
     // remove spaces change to mb_eregi_replace if using multibyte
     $query = preg_replace('@[\s]+@',' ', trim($query));
     $query = trim($query);
     $results = $this->fetchResults($query, $start, $site);
     return $results;
   } // end function sortQuery
	
   // Send the query to the server
   public  function fetchResults($query, $start, $site='')
   {
      if ($this->debug) echo "parsing string $query";
      $url = "http://".SOLR_META_QUERY."/solr";
      if($site=='image')
      {
        $querystring = "/image_test/imageaxtar/?q=".trim(urlencode($query))."&start=".$start."&rows=".$this->limit."&wt=xml&fl=thumbnail,id,parent_url";
      }
      else if(!empty($site))
      {
        $querystring = "/axtar/axtarsite/?stylesheet=&q=".trim(urlencode($query))."&fq=site:".$site."&start=".$start."&rows=".$this->limit."&fl=id,title,url+score";
      }
      else
      {
        $querystring = "/axtar/axtar/?q=".trim(urlencode($query))."&start=".$start."&rows=".$this->limit."&indent=true&wt=xml";
      }
      if (!$this->httppost) $selecturl = "$querystring";
      $url .= $selecturl;
      $header[] = "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
      $header[] = "Accept-Language: en-us,en;q=0.5";
      $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_URL, $url);
	
      if ($this->httppost) {
    	curl_setopt($ch, CURLOPT_POST, 1 );
	curl_setopt($ch, CURLOPT_POSTFIELDS,$querystring);
      }
      if($this->debug) echo "\r\n<p>Retrieving <A HREF='$url' target=_BLANK>$url</a>...\r\n</p>";
      $data = curl_exec($ch);
      if (curl_errno($ch)) {
        //$logger "setting results to false, error";
	//print curl_error($ch);
	$results=false;
      }
      else
      {
        curl_close($ch);
	$results = $data;
	//if ( strstr ( $data, '<status>0</status>')) {$results = $data;}
      } 
      if ($this->debug) echo $data;
      return $results;
    }
} // end class

?>
