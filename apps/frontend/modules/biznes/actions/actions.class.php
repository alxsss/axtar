<?php

/**
 * biznes actions.
 *
 * @package    axtar
 * @subpackage biznes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 8507 2008-04-17 17:32:20Z fabien $
 */
class biznesActions extends sfActions
{
  public function preExecute()
  {
    if ($this->getUser()->isAuthenticated())
    {
      $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');	
      $this->subscriber = sfGuardUserPeer::retrieveByPk($this->user_id);
      $this->forward404Unless($this->subscriber);	   
    }
  }
 
  public function executeIndex()
  { 
    $this->page=$this->getRequestParameter('page', 1); 
    $this->popular_bizness = BiznesPeer::getNewBiznessPager($this->page);
   /* 
     $memcache = new Memcache();
     $memcache->connect('127.0.0.1', 11211);// or die ("Could not connect");
      //set the key then check the cache
     $key = md5("biznes_index".$this->page);
     $get_result = $memcache->get($key);
     if($get_result)
     {
       $this->popular_biznes =  $get_result;
     }
     else
     {
       // Run the query and get the data from the database then cache it
       $this->popular_biznes = BiznesPeer::getNewBiznessPager($this->page);
       $memcache->set($key, $this->popular_biznes, TRUE, 200000); // Store the result of the query for 200000 seconds
     }
   */
    $this->processSort();
    $this->popular_biznes = BiznesPeer::getNewBiznessPager($this->page);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $c->add(BiznesPeer::APPROVED, 1);
    $c->addDescendingOrderByColumn(BiznesPeer::CREATED_AT);
    $this->popular_biznes->setCriteria($c);
    $this->popular_biznes->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'biznes')));
    $this->popular_biznes->init();
    // save page
    if ($this->getRequestParameter('page')) {$this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'biznes');} 	
  }

  public function executePopularbiznes()
  { 
    $this->page=$this->getRequestParameter('page', 1); 
    $this->processSort();
    $this->popular_biznes = BiznesPeer::getPopularBiznessPager($this->page);
	$c = new Criteria();
    $this->addSortCriteria($c);
	$c->add(BiznesPeer::APPROVED, 1);
    $c->addDescendingOrderByColumn(BiznesPeer::RATING);
    $this->popular_biznes->setCriteria($c);
    $this->popular_biznes->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'biznes')));
    $this->popular_biznes->init();
    // save page
    if ($this->getRequestParameter('page')) {$this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'biznes');} 	
  }
  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'biznes/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'biznes/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'biznes/sort'))
    {
    }
  }
  
   protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'biznes/sort'))
    {
      $sort_column = sfInflector::camelize(strtolower($sort_column));
      $sort_column = BiznesPeer::translateFieldName($sort_column, BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'biznes/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  public function executeRate($request)
  {
    $this->biznes= BiznesPeer::retrieveByPk($this->getRequestParameter('biznes_id'));
    $this->forward404Unless($this->biznes); 
    $rate=$request->getParameter('rate');    
    $biznesRate = new BiznesRate();
    $biznesRate->setBiznes($this->biznes);
    $biznesRate->setUserId($this->user_id);
    $biznesRate->setRate($rate);
    $biznesRate->save();
  }

  public function executeRatings($request)
  {
    if ($this->getUser()->isAuthenticated())
    {
	  $this->rated_biznes_pager=BiznesRatePeer::getBiznesRatingPager($this->getRequestParameter('page', 1), $this->user_id);	
	}
	else
	{
	  return $this->forward('sfGuardAuth','signin');
	}
  }

  public function executeDeleterating(sfWebRequest $request)
  {
    $markdel=$request->getParameter('markdel');
    if(isset($markdel))
    {	  
      while(list($key, $value)=each($markdel))
      {
        $this->forward404Unless($rating = BiznesRatePeer::retrieveByPK($value, $key));	
		//do not delete in order not to allow to the same user to rate again    
        $rating->setDeleted(1);
    	$rating->save();         
      }	     
    }
    $this->redirect('@ratings');
  }

  public function executeCreate()
  {
    $this->form = new BiznesForm();
    $this->setTemplate('edit');
  }

  public function executeEdit($request)
  {
    if ($this->getUser()->isAuthenticated())
    {
       $this->form = new BiznesForm(BiznesPeer::retrieveByPk($request->getParameter('id')));
       $this->biznes = BiznesPeer::retrieveByPk($this->getRequestParameter('id'));
       $this->forward404Unless($this->biznes);
       //$biznes_user_id=$this->biznes->getAlbum()->getUserId();
       $biznes_user_id=$this->biznes->getUserId();
       if($biznes_user_id!=$this->user_id)
       {
         $this->redirect('biznes/show?id='.$this->getRequestParameter('id'));
       }
       $this->albumForm = new AlbumForm();
        $this->albumForm->setDefaults(array('user_id'=>$this->user_id));
     }
     else
     {
       $this->redirect('@homepage');
     } 
  }
  
   public function executeList()
   { 
     $this->page=$this->getRequestParameter('page', 1); 
     $this->biznes_owner = sfGuardUserPeer::retrieveByUsername($this->getRequestParameter('username'));
     $this->forward404Unless($this->biznes_owner);
     //id of a user whose biznes are retrived
     $biznes_owner_user_id=$this->biznes_owner->getId();
     $this->biznes=BiznesPeer::getAllBiznessPager($this->page, $biznes_owner_user_id); 
     //id of a user who signed in
     $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');	
   }
	
   public function executeUpdate($request)
   {
     $this->forward404Unless($request->isMethod('post'));
     $this->form = new BiznesForm(BiznesPeer::retrieveByPk($request->getParameter('id')));
     $this->form->bind($request->getParameter('biznes'));
     if ($this->form->isValid())
     {
       $biznes = $this->form->save();
      //$this->redirect('biznes/edit?id='.$biznes->getId());
	  //$this->logMessage('checking delete indexes before deleting');
       $this->redirect('biznes/show?id='.$biznes->getId());
     }
     $this->albumForm = new AlbumForm();
     $this->setTemplate('edit');
  }

  public function executeDelete($request)
  {
    $this->forward404Unless($biznes = BiznesPeer::retrieveByPk($request->getParameter('id')));
    $biznes->delete();	
	if($biznes->getAlbumId())
	{
	  $this->redirect('albums/show?id='.$biznes->getAlbumId());
	}
	else
	{ 
	  $this->redirect('user/'.$biznes->getsfGuardUser()->getUsername());
	}
  }  
  
  public function executeAddComment(sfWebRequest $request)
  {
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
      $this->biznes = BiznesPeer::retrieveByPk($request->getParameter('item_id'));
      $this->forward404Unless($this->biznes);
      $biznes_user_id=$request->getParameter('item_user_id');	;//$this->biznes->getUserId();
      $comment_body=$request->getParameter('comment');
      if (!empty($comment_body))
      {
        // create answer
        $this->comment = new BiznesComment();
        $this->comment->setBiznes($this->biznes);
        $this->comment->setComment($comment_body);
        $this->comment->setUserId($this->user_id);
        $this->comment->save();        
        $user=sfGuardUserPeer::retrieveByPk($this->user_id);
        $biznes_owner_user = sfGuardUserPeer::retrieveByPk($biznes_user_id);
        //extract name if exists
        $this->name= $user->getProfile()->getName(); 
        $this->name= trim($this->name);
        $username=$user->getUsername();	
        if(empty($this->name))
        {
          $this->name=$username;
        }
        //send emails to users of previous comments
        //collect emails in an array
        $emails_comment_users=array();
        $usernames_comment_users=array();
        //send emails to users of previous comments 
        foreach($this->biznes->getBiznesComments() as $comment)
        {
          //collect emails in an array
          $emails_comment_users[]=$comment->getsfGuardUser()->getEmail();
          $usernames_comment_users[]=$comment->getsfGuardUser()->getUsername();
        } 
         //eliminate the same emails
          $emails_comment_users_unique=array_unique($emails_comment_users);
          $usernames_comment_users_unique=array_unique($usernames_comment_users);
          $own_email=array($user->getEmail(), $biznes_owner_user->getEmail());
          $own_username=array($user->getUsername(),$biznes_owner_user->getUsername());
          //do not send email to user himself/herself  and to owner
          $emails_comment_users_unique_exOwn=array_diff($emails_comment_users_unique,$own_email);
          $usernames_comment_users_unique_exOwn=array_diff($usernames_comment_users_unique, $own_username);
          foreach($emails_comment_users_unique_exOwn as $i=>$email)
          {
            if(!empty($email))
	    {
	      $this->sendBiznesComment(trim($email),$usernames_comment_users_unique_exOwn[$i],  $this->name, $request->getParameter('item_id'));
             }
          }	  
          //if the user is not the owner of the biznes, send email to owner
	  if($this->user_id!=$biznes_user_id)
          {	   
            $email=$biznes_owner_user->getEmail();
            if(!empty($email))
	    {
              $recepient_username=$biznes_owner_user->getUsername();
              $url='http://axtar.az/az/biznes/show/id/'.$request->getParameter('item_id');
	      $subject=$this->name.' axtar.az saytinda sizin biznese rəyini bildirdi';
              $body=<<<EOF
Salam $recepient_username,

$this->name, axtar.az saytinda sizin şəkilinizə rəyini bildirdi.  Ona  bu linkdə 

$url

baxa bilərsiniz.

Sag olun,
axtar.az kollektivi
EOF;
             ProjectConfiguration::registerZend();
              $tr = new Zend_Mail_Transport_Sendmail('-fadmin@axtar.az');
              Zend_Mail::setDefaultTransport($tr);
             $mail = new Zend_Mail('utf-8');
	         $mail->setBodyText($body);
             $mail->setFrom('admin@axtar.az', 'axtar.az kollektivi');
             $mail->addTo($email);
             $mail->setSubject($subject);
             $mail->send();
	   }//end empty(email)
	  }
	}//end if body
   return sfView::SUCCESS;
  } 
}
 public function executeDeleteComment()
 {
    if (!$this->getRequestParameter('id'))
    {
      return sfView::NONE;
    }
    $this->comment = BiznesCommentPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->comment);
    $this->comment->delete();
    $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');	  
}   
   public function executeAllfavbiznes()
  { 
    $this->subscriber = sfGuardUserPeer::retrieveByUsername($this->getRequestParameter('username'));
    $this->forward404Unless($this->subscriber);
    $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
    $this->biznes_pager = BiznesFavPeer::getAllFavBiznesPager($this->getRequestParameter('page', 1),  $this->subscriber->getId());
  }
  public function executeFavorite()
  {
    $this->biznes= BiznesPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->biznes);
    $user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');     
    $biznesFav = new BiznesFav();
    $biznesFav->setBiznes($this->biznes);
    $biznesFav->setUserId($user_id);
    $biznesFav->save();
  }
  
   public function executeDeletefavbiznes()
  {
    $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
    $this->fav_biznes = BiznesFavPeer::retrieveByPk($this->getRequestParameter('id'), $this->user_id);
    $this->forward404Unless($this->fav_biznes);
    $this->forward404Unless($this->user_id==$this->fav_biznes->getUserId());
    $this->fav_biznes->delete();
  }
 
   public function executeShow()
   {
     $this->biznes = BiznesPeer::retrieveByPk($this->getRequestParameter('id'));
     //$this->biznes_id=$this->getRequestParameter('id');
     $this->forward404Unless($this->biznes);
     $this->biznes_owner_id=$this->biznes->getUserId();
     //$this->biznes_user_id=$this->biznes->getUserId();
     //define this here if user is not signed in in order not to get undefined user_id notice
     $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
   }
   public function executeShownew()
   {
     $this->biznes_id=$this->getRequestParameter('id');
     $this->biznes=BiznesPeer::retrieveByPk($this->biznes_id);
     $this->forward404Unless($this->biznes);
     $this->biznes_user_id=$this->biznes->getUserId();
     //get all new biznes pages
     $this->biznes_pager=BiznesPeer::getShownewBiznesPager();
     $this->biznes_user = sfGuardUserPeer::retrieveByPk($this->biznes_user_id);
     //define this here if user is not signed in in order not to get undefined user_id notice
     $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');	 
   }
   public function executeShowpopular()
   {
     $this->biznes_id=$this->getRequestParameter('id');
     $this->biznes=BiznesPeer::retrieveByPk($this->biznes_id);
     $this->forward404Unless($this->biznes);
     $this->biznes_user_id=$this->biznes->getUserId();
     //get all new biznes pages
     $this->biznes_pager=BiznesPeer::getShowpopularBiznesPager();
     $this->biznes_user = sfGuardUserPeer::retrieveByPk($this->biznes_user_id);
     //define this here if user is not signed in in order not to get undefined user_id notice
     $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');	 
   }
   public function executeShowalbumbiznes()
   {
     $this->biznes = BiznesPeer::retrieveByPk($this->getRequestParameter('id'));
     $this->forward404Unless($this->biznes);
	 //define this here if user is not signed in in order not to ger undefined user_id notice
	 $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
	 if ($this->getUser()->isAuthenticated())
     {
	   $this->c=1;
	 }
	 else
	 {
	   $this->c=0;
	 }
   }
   public function executeAddalbum($request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new AlbumForm();
    //this done because data comes from jquery post ajax request
    $album_array=$request->getParameter('album_data');
    $album=array();
    $album['title']=$album_array[0]['value'];
    $album['description']=$album_array[1]['value'];
    $album['visibility']=$album_array[2]['value'];
    $album['user_id']=$album_array[3]['value'];   
    $album['id']=$album_array[4]['value'];

    $this->form->bind($album);
    if ($this->form->isValid())
    {
      $album = $this->form->save();

      //$this->redirect('biznes/edit?id='.$this->getRequestParameter('id'));
    }
    $this->biznesForm = new BiznesForm();
    //$this->biznesForm = new BiznesForm(BiznesPeer::retrieveByPk($request->getParameter('id')));
    //$this->redirect('biznes/edit?id='.$this->getRequestParameter('id'));
   // $this->setTemplate('edit');
  }
 protected function  sendBiznesComment($email, $recepient_name,  $name, $biznes_id)
 {
    $url='http://axtar.az/az/biznes/show/id/'.$biznes_id;
	$subject=$name.' axtar.az da sizin rəyinizdən sonra oz rəyini bildirdi';
    $body=<<<EOF
Salam $recepient_name,

$name, axtar.az da sizin rəyinizdən sonra oz rəyini 
bildirdi.  Ona bu linkdə
  
$url

baxa bilərsiniz.
Sag olun,
axtar.az kollektivi
EOF;
    ProjectConfiguration::registerZend();
    $tr = new Zend_Mail_Transport_Sendmail('-fadmin@axtar.az');
    Zend_Mail::setDefaultTransport($tr);
    $mail = new Zend_Mail('utf-8');
	$mail->setBodyText($body);
    $mail->setFrom('admin@axtar.az', 'axtar.az kollektivi');
    $mail->addTo($email);
    $mail->setSubject($subject);
    $mail->send(); 
 }
 
  public function executeSearch(sfWebRequest $request)
  {
    if (!$query = $request->getParameter('query'))
    {
      return $this->redirect('@recent_biznes');
    } 
    $this->biznes = BiznesPeer::getForLuceneQuery($query);
  }
}
