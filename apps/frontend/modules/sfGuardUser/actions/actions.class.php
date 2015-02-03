<?php
//require_once(dirname(__FILE__).'/../lib/BasesfGuardUserActions.class.php');
require_once(sfConfig::get('sf_plugins_dir').'/sfGuardPlugin/modules/sfGuardUser/lib/BasesfGuardUserActions.class.php');
/**
 * User management.
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 7634 2008-02-27 18:01:40Z fabien $
 */
class sfGuardUserActions extends BasesfGuardUserActions
{
public function preExecute()
  {
    /*$this->configuration = new sfGuardUserGeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new sfGuardUserGeneratorHelper();*/
  }
 
  public function executeNewAction()
  {
    return $this->renderText('This is a new sfGuardAuth action.');
  }
  
  public function executeShow()
  {
    $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser'); 
    $c=new Criteria();
    $c->setLimit(6);
    $this->username=$this->getRequestParameter('username');
    $this->subscriber = sfGuardUserPeer::retrieveByUsername($this->username);
    $this->forward404Unless($this->subscriber);	

    //num messages and requests
    $this->inbox_num_msgs = $this->subscriber->countInboxMessages();
    $this->num_requests = $this->subscriber->count_num_friend_requests();

    //get biznes	
     $cbiznes=new Criteria();
     $cbiznes->setLimit(5);
     $cbiznes->addDescendingOrderByColumn(BiznesPeer::CREATED_AT);
     $cbiznes->add(BiznesPeer::APPROVED,1);
     $this->biznes = $this->subscriber->getBizness($cbiznes);
     $cnumbiznes=new Criteria();
     $this->num_biznes=$this->subscriber->countBizness($cnumbiznes);
	
	$cphotoComment=new Criteria();
	$cphotoComment->addDescendingOrderByColumn(PhotoCommentPeer::CREATED_AT);	
	$this->photoComments=$this->subscriber->getPhotoCommentsJoinPhoto($cphotoComment);
	$page=$this->getRequestParameter('page', 1);
	$this->subscriber_updates =UpdatesPeer::getUpdatesSubscriberPager($page, $this->subscriber->getId());
	$this->num_guests = $this->subscriber->count_num_guests();
	$this->num_rates = $this->subscriber->count_num_rates();       
	$subscriber_id=$this->subscriber->getId();
	if($subscriber_id!=$this->user_id&&!empty($this->user_id)&&$this->user_id!=1)
	{
	  //check if this user is already visited the page and update time
	  $cguest=new Criteria();
	  $cguest->add(GuestPeer::USER_ID, $subscriber_id);
	  $cguest->add(GuestPeer::GUEST_ID, $this->user_id);
	  $guest=GuestPeer::doSelectOne($cguest);
	  if(empty($guest))
	  {
	    $guest=new Guest();
	    $guest->setUserId($subscriber_id);
	    $guest->setGuestId($this->user_id);	   
	  }
	  else
	  {
	    $guest->setCreatedAt(time());
		$guest->setChecked(0);	
	  }
	  $guest->save();	
	}
  } 
  public function executeUserupdates(sfWebRequest $request)
  {
    $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser'); 
	$page=$request->getParameter('page', 1);
	$user_id=$request->getParameter('id');
    $this->subscriber = sfGuardUserPeer::retrieveByPk($user_id);
	$this->subscriber_updates =UpdatesPeer::getUpdatesSubscriberPager($page, $user_id);
  } 
  public function executeInfo()
  {
    $this->username=$this->getRequestParameter('username');
    $this->subscriber = sfGuardUserPeer::retrieveByUsername($this->username);
    $this->forward404Unless($this->subscriber);
   	$this->inbox_num_msgs = $this->subscriber->countInboxMessages();
	$this->num_friendsRequests = $this->subscriber->count_num_friend_requests();
	$this->num_guests = $this->subscriber->count_num_guests(); 
	$this->num_rates = $this->subscriber->count_num_rates();       
    $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser'); 
	$this->statusForm=new sfGuardUserStatusForm();
	$this->statusForm->setDefaults(array('user_id'=>$this->user_id));
	
	$cSchoolUsers=new Criteria();
	$cSchoolUsers->addDescendingOrderByColumn(SchoolUserPeer::GRAD_YEAR);	
	$this->schoolUsers=$this->subscriber->getSchoolUsers($cSchoolUsers);
  }
  public function executeFriend()
  {
    $this->username=$this->getRequestParameter('username');
    $this->subscriber = sfGuardUserPeer::retrieveByUsername($this->username);
    $this->forward404Unless($this->subscriber);
	
	//friends
    //get friend ids in an array
    $friendsIdArray=$this->subscriber->getFriendsIdArray();	
    $this->num_friends=count($friendsIdArray);
    if($this->num_friends<6)
    {
     //since in case of one friend array_rand returns number but not array and does not change array elements when number returned is equal to array size
      $rand_friend_ids=$friendsIdArray;
    }
    else
    {
      $rand_friends_key=array_rand($friendsIdArray, 5);
      $rand_friend_ids=array();
      foreach($rand_friends_key as $key)
      {
        $rand_friend_ids[]=$friendsIdArray[$key];
      }
    }
   $cf=new Criteria();
   $cf->add(sfGuardUserPeer::ID, $rand_friend_ids, Criteria::IN);
   $this->user_friends=sfGuardUserPeer::doSelect($cf);
   //end friends
      	$this->inbox_num_msgs = $this->subscriber->countInboxMessages();
	$this->num_friendsRequests = $this->subscriber->count_num_friend_requests(); 
	$this->num_guests = $this->subscriber->count_num_guests();
	$this->num_rates = $this->subscriber->count_num_rates();        
    $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser'); 
		
	$this->statusForm=new sfGuardUserStatusForm();
	$this->statusForm->setDefaults(array('user_id'=>$this->user_id));
  }
  public function executePhoto()
  {
    $c=new Criteria();
	$c->setLimit(5);
	$this->username=$this->getRequestParameter('username');
    $this->subscriber = sfGuardUserPeer::retrieveByUsername($this->username);
    $this->forward404Unless($this->subscriber);
	
	$cbiznes=new Criteria();
	$cbiznes->setLimit(5);
	$cbiznes->add(PhotoPeer::ALBUM_ID, NULL);
	$cbiznes->addDescendingOrderByColumn(PhotoPeer::CREATED_AT);
	$this->biznes = $this->subscriber->getPhotos($cbiznes);
	$cnumphoto=new Criteria();
	$cnumphoto->add(PhotoPeer::ALBUM_ID, NULL);
	$this->num_biznes=$this->subscriber->countPhotos($cnumphoto);
	  
	$this->albums = $this->subscriber->getAlbums($c);
	$this->num_albums = $this->subscriber->countAlbums();
   	$this->inbox_num_msgs = $this->subscriber->countInboxMessages();
	$this->num_friendsRequests = $this->subscriber->count_num_friend_requests(); 
	$this->num_guests = $this->subscriber->count_num_guests();
	$this->num_rates = $this->subscriber->count_num_rates();       
    $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser'); 
		
	$this->statusForm=new sfGuardUserStatusForm();
	$this->statusForm->setDefaults(array('user_id'=>$this->user_id));
  }
   public function executeDeleteschool()
  {
    $school_id=$this->getRequestParameter('school_id');
    $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
	$school_user=SchoolUserPeer::retrieveByPK($school_id, $this->user_id);
	$school_user->delete();	   
  }    
public function executeInterested()
{
  $this->photo= PhotoPeer::retrieveByPk($this->getRequestParameter('id'));
  $this->forward404Unless($this->photo); 
  $user = $this->getUser()->getSubscriberId(); 
  $photoVotes = new PhotoVote();
  $photoVotes->setPhoto($this->photo);
  $photoVotes->setUserId($user);
  $photoVotes->save();
}
public function executeFavorite()
{
  $this->photo= PhotoPeer::retrieveByPk($this->getRequestParameter('id'));
  $this->forward404Unless($this->photo); 
  $user = $this->getUser()->getSubscriberId(); 
  $photoFav = new PhotoFav();
  $photoFav->setPhoto($this->photo);
  $photoFav->setUserId($user);
  $photoFav->save();
}

protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $this->getUser()->setFlash('notice', $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.');

      $sf_guard_user = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $sf_guard_user)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $this->getUser()->getFlash('notice').' You can add another one below.');

        $this->redirect('@sf_guard_user_new');
      }
      else
      {
        //$this->redirect('@sf_guard_user_edit?id='.$sf_guard_user->getId());
		$this->redirect('@homepage');
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.');
    }
  }
  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->sf_guard_user = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('register');
  }
   public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->getUser()->signOut();
    $this->getRoute()->getObject()->delete();
    $this->redirect('@homepage');
  }
   public function executeStatus(sfWebRequest $request)
  {    
	$user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
	$this->user = sfGuardUserPeer::retrieveByPk($user_id);
	$status_content=$request->getParameter('user_status');
    if (!empty($status_content))
    {
	  $status=new sfGuardUserStatus();
	  $status->setUserId($user_id);
	  $status->setStatusName($status_content);
	  $status->setCreatedAt(time());
	  $status->save();
	}
	$c=new Criteria();
	$c->add(sfGuardUserStatusPeer::USER_ID,$this->user->getId());
	$c->addDescendingOrderByColumn(sfGuardUserStatusPeer::CREATED_AT);
	$this->status=sfGuardUserStatusPeer::doSelectOne($c);	
  }
  public function executeRemove()
  {
    $this->photo = PhotoPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->photo);
    $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
    $this->photo->removeFavPhoto($this->user_id);
	
    $this->subscriber = sfGuardUserPeer::retrieveByUsername($this->getRequestParameter('username'));
    $this->forward404Unless($this->subscriber);
	$c=new Criteria();
	$c->setLimit(6);
    $this->fav_biznes = $this->subscriber->getPhotoFavs($c);
  }

  public function executeRemovefriend(sfWebRequest $request)
  {
	$friend_id=$request->getParameter('friend_id');
	$user_id=$request->getParameter('user_id');
    $this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
	if($friend_id)
	{
	  $c = new Criteria();
      $c->add(FriendPeer::FRIEND_ID, $friend_id);
	  $c->add(FriendPeer::USER_ID, $this->user_id);
      FriendPeer::doDelete($c);
	}
	elseif($user_id)
	{
	  $c = new Criteria();
      $c->add(FriendPeer::USER_ID, $user_id);
	  $c->add(FriendPeer::FRIEND_ID, $this->user_id);
      FriendPeer::doDelete($c);
	}
 }
  
  public function executeMtfemail()
 {
    //try
    { 
	  $mailTo=$this->getRequestParameter('remail');
	  $recepientArray=explode(',', $mailTo);
	  
      $mailFrom=$this->getRequestParameter('semail');
      $pmessage=$this->getRequestParameter('pmsg');
      $body=$this->getRequestParameter('mtf-title').' You can watch it at '.$this->getRequestParameter('mtf-url');
	 //
	   ProjectConfiguration::registerZend();
      $mail = new Zend_Mail();
      $mail->setBodyText(<<<EOF
	  $mailFrom,
      
	  Has sent you a fmpsv video.
      $body
	  
	  Personal message:
      $pmessage
EOF
);
      $mail->setFrom($mailFrom, $mailFrom);
	  for($i=0;$i<count($recepientArray);$i++)
	  {
	    $mail->addTo($recepientArray[$i]);
	  }      
      $mail->setSubject('fmpsv.com-friends music biznes shopping videos');
      $mail->send();
	//  
    }
   // catch (Exception $e)
    {
    //  $mailer->disconnect();
      // handle errors there
    }
  }
}
