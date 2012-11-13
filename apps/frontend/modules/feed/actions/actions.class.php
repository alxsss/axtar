<?php

/**
 * feed actions.
 *
 * @package    fmpsv
 * @subpackage feed
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class feedActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeLastPosts(sfWebRequest $request)
{
  //$uri = 'http://groups.google.com/group/symfony-users/feed/rss_v2_0_msgs.xml';
  $uri = 'http://localhost:8080/nutch-0.9/opensearch?query=tarkan&hitsPerSite=2&lang=en&hitsPerPage=10';
  $browser = new sfWebBrowser(array(
      'user_agent' => 'sfFeedReader/0.9',
      'timeout'    => 5
  ));
  $feedString = $browser->get($uri)->getResponseText();

  $feed = new sfRssFeed();
  //$feed->setUrl($uri);
  $feed->fromXml($feedString);
  $this->feed = $feed;
  
  //$this->feed = sfFeedPeer::createFromWeb('http://groups.google.com/group/symfony-users/feed/rss_v2_0_msgs.xml');
}

}
