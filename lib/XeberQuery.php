<?php
// Change this to your server
define('SOLR_META_QUERY', '192.168.1.5:8984');

//   This class runs an external fulltext search on Solr

class XeberQuery {
	
	// All of these init variables are yours to define, these are just examples
	var $type = "";
	var $language_id = 0;
	var $lowerdate = 0; // lower bound of date range
	var $upperdate = 0; // upper bound of date range
	var $limit = 10; // number of result to return
	var $min_score = 0; // only add these values if they are above this score
	var $httppost=false; // set to true to send via HTTP POST (form) instead of HTTP GET (url)
	var $debug=false; // turn on debugging mode (not fully complete)
	
	// Reset or initialize variables
	function init() {
	  $this->type = "";
		$this->language_id = 0;
		$this->lowerdate = 0;
		$this->upperdate = 0;
		$this->limit = 100;
		$this->min_score = 0.0; // only add these values if they are above this score
		$this->httppost=false;
	        
	} 
	// Example of a query -- different queries with their own logic should be made as separate functions
       function runQuery($titlekeywords, $start, $koma=false,$limit=10) {
		//$string = "+(a_name:($titlekeywords)) ";
                // remove spaces
		// change to mb_eregi_replace if using multibyte
		$titlekeywords = preg_replace('@[\s]+@',' ', trim($titlekeywords));
	//	$string = "+(title:($titlekeywords)) ";
		$string =$titlekeywords;
		$query=$string;
		$query = trim($query);
		$results = $this->fetchResults($query, $start, $koma, $limit);
		return $results;
	} // end function sortQuery
	
	// Handle the response from the server and transform it into useful fields
	function handleResponse($data) {
		if ($data) {
			$xml = simplexml_load_string($data );
			
			
			$results = array();
			foreach ($xml->result->doc as $story) {
				$xmlarray = array();
				try{
				        foreach ($story as $item) {
				                $name = $item->attributes()->name;
				                $value = $item;
				                $xmlarray["$name"] = "$value";
				
				        } // end foreach
				} catch (Exception $e) {
				        echo 'Problem handling XML array.'; 
				}
				
				// 
				if ($this->debug) echo "checking if ".$xmlarray['score']." > ".$this->min_score;
				if ($xmlarray['score'] > $this->min_score) $results[] = $xmlarray;
			
			} // end foreach
		
		} else {
		        $results=false;
		} // end if / else data
		
		 
		return $results;
	}
	
	// Send the query to the server
    function fetchResults($query, $start, $koma=0, $limit=10)
    {
		
      if ($this->debug) echo "parsing string $query";
      $url = "http://".SOLR_META_QUERY."/solr";
      if($koma==0)//select all news
      {
        $querystring = "/xeber/select/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&indent=true&wt=xml&sort=tstamp%20desc&fl=id%20url%20title%20tstamp%20imageurl%20description";
      }
      else if($koma==3)//search in news
      {
         $querystring = "/xeber/axtar_nogr/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&indent=true&wt=xml&fl=id%20url%20title%20tstamp%20imageurl&group=true&group.field=site&group.ngroups=true&boost=recip(ms(NOW,tstamp),2.7100271002710027e-8,0.9878048780487805,1)";
      }
      else if($koma==2)//show page/similarity
      {
             $querystring = "/xeber/similarity/?q=".trim(urlencode($query))."&wt=json";
      }
      else if($koma==4)//top news
      {
        $querystring = "/xeber/axtar_nogr/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&indent=true&wt=json&fl=id%20url%20title%20tstamp%20imageurl%20thumbnail&boost=recip(ms(NOW,tstamp),2.7100271002710027e-8,0.9878048780487805,1)";
        //$querystring = "/xeber/axtar_nogr/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&indent=true&wt=json&fl=id%20url%20title%20tstamp%20imageurl%20thumbnail&group=true&group.field=site&group.ngroups=true&boost=recip(ms(NOW,tstamp),2.7100271002710027e-8,0.9878048780487805,1)";
      } 
      else if($koma==1)
      {
        $querystring = "/xeber/clst_axtar_nogr/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&indent=true&wt=xml&sort=tstamp%20desc";
      }
      else
      {
        $querystring = "/xeber/axtar_nogr/?q=".trim(urlencode($query))."&start=".$start."&rows=".$limit."&indent=true&wt=xml&fl=id%20url%20title%20tstamp%20imageurl";
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
