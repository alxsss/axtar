<?php
define('SOLR_META_QUERY', 'slave4:8983');

class SolrQuerySlave4 {
	
	public $limit = 10; // number of result to return
	public $min_score = 0; // only add these values if they are above this score
	public $httppost=false; // set to true to send via HTTP POST (form) instead of HTTP GET (url)
	public $debug=false; // turn on debugging mode (not fully complete)
	
	// Reset or initialize variables
	public function init() {
		$this->limit = 100;
		$this->min_score = 0.0; // only add these values if they are above this score
		$this->httppost=false;
	        
	} 
	// Example of a query -- different queries with their own logic should be made as separate functions
       public function runQuery($keyword, $start, $handler='', $limit=10,$sort='',$filter='') {
                // remove spaces
		// change to mb_eregi_replace if using multibyte
		$keyword = preg_replace('@[\s]+@',' ', trim($keyword));
		$results = $this->fetchResults($keyword, $start, $handler, $limit,$sort,$filter);
		return $results;
	} 
	
       // Send the query to the server
       public function fetchResults($query, $start, $handler='', $limit=10, $sort='',$filter='')
       {
		
          if ($this->debug) echo "parsing string $query";
          
          $url = "http://".SOLR_META_QUERY."/solr";
          if($handler=='similarity')
          {
             $querystring = "/gift/similarity/?q=".trim(urlencode($query))."&wt=xml";
          }
          else if($handler=='search')
          {
            $querystring = "/gift/product_search/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&wt=xml&facet=true&facet.field=subcategory&facet.mincount=1&facet.range=price&f.price.facet.range.start=0&f.price.facet.range.end=1000&f.price.facet.range.gap=100&facet.limit=20";
          }
          else if($handler=='filter')
          {
            $querystring = "/gift/product_search/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&wt=xml&fq=".urlencode($filter)."&sort=".urlencode($sort);
          }
          else if($handler=='autosuggest')
          {
            $querystring = "/acbiznes/autosuggest/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&wt=json";
          }
          else if($handler=='recommend')
          {
            $querystring = "/gift/product_search/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&wt=xml&sort=".urlencode($sort)."&wt=xml&facet=true&facet.field=subcategory&facet.mincount=1&facet.range=price&f.price.facet.range.start=0&f.price.facet.range.end=1000&f.price.facet.range.gap=100&facet.limit=20";
          }
          else if($handler=='giftlist')
          {
            $querystring = "/gift/giftlist/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&sort=".urlencode($sort)."&wt=xml&facet=true&facet.field=subcategory&facet.mincount=1&facet.range=price&f.price.facet.range.start=0&f.price.facet.range.end=1000&f.price.facet.range.gap=100&facet.limit=20";
          }
          else if($handler=='giftlistfilter')
          {
            $querystring = "/gift/giftlist/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&wt=xml&fq=".urlencode($filter);
          }
          else if($handler=='image')//image handler here
          {
            $querystring = "/image/imageaxtar/?q=".trim(urlencode($query))."&start=".$start."&rows=35&wt=xml";
          }
          else 
          {
            $querystring = "/gift/product_search/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&wt=xml";
          }
		//if (!$this->httppost) $selecturl = "/?$querystring";
		if (!$this->httppost) $selecturl = "$querystring";
		$url .= $selecturl;
		$header[] = "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
		$header[] = "Accept-Language: en-us,en;q=0.5";
		$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
		
		$ch = curl_init();
	//	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	//	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	//	curl_setopt($ch, CURLOPT_ENCODING,"");          
	//	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,30);
	//	curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, 0);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
       curl_setopt($ch, CURLOPT_HEADER, 0);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_URL, $url);
		
		if ($this->httppost) {
			curl_setopt($ch, CURLOPT_POST, 1 );
			curl_setopt($ch, CURLOPT_POSTFIELDS,$querystring);
		}
	
		if ($this->debug) echo "\r\n<p>Retrieving <A HREF='$url' target=_BLANK>$url</a>...\r\n</p>";
		
		$data = curl_exec($ch);
		
		if (curl_errno($ch)) {
			//$logger "setting results to false, error";
			//print curl_error($ch);
			$results=false;
		} else {
			curl_close($ch);
			$results = $data;
		} 
		if ($this->debug) echo $data;
		return $results;
	}
} // end class

?>
