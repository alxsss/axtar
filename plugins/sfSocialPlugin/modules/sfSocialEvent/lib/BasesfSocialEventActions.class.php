<?php

/**
 * Base actions for the sfSocialPlugin sfSocialEvent module.
 *
 * @package     sfSocialPlugin
 * @subpackage  sfSocialEvent
 * @author      Massimiliano Arione <garakkio@gmail.com>
 */
class BasesfSocialEventActions extends sfActions
{

  public function preExecute()
  {
    $this->user = $this->getUser()->getGuardUser();
	$this->user_id=$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
  }

  /**
   * List of events in which user is invited
   * @param sfRequest $request A request object
   */
  public function executeInvitedlist(sfWebRequest $request)
  {
    $page = $request->getParameter('page', 1);
    $this->pager = sfSocialEventInvitePeer::getEvents($this->user, $page);
  }

  /**
   * List of future events
   * @param sfRequest $request A request object
   */
  public function executeList(sfWebRequest $request)
  {
    $page = $request->getParameter('page', 1);
    $this->pager = sfSocialEventPeer::getEvents($page);
  }

  /**
   * List of past events
   * @param sfRequest $request A request object
   */
  public function executePastlist(sfWebRequest $request)
  {
    $page = $request->getParameter('page', 1);
    $this->pager = sfSocialEventPeer::getPastEvents($page);
  }

  /**
   * View an event
   * @param sfRequest $request A request object
   */
  public function executeView(sfWebRequest $request)
  {
    $this->event = sfSocialEventPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->event, 'event not found');
    // confirm form
    $this->getContext()->set('Event', $this->event);
    $eventUser = sfSocialEventUserPeer::retrieveByPK($this->event->getId(), $this->user_id);
    $this->form = new sfSocialEventUserForm($eventUser, array('user_id' => $this->user_id, 'event' => $this->event));
    if ($request->isMethod('post'))
    {
      $this->form->bindAndSave($request->getParameter($this->form->getName()));
    }
    $this->event_status_pager = sfSocialEventPeer::getStatusPager($this->getRequestParameter('page', 1), $request->getParameter('id'));
  }

  /**
   * Create a new event
   * @param sfRequest $request A request object
   */
  public function executeCreate(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated())
    {
      $this->form = new sfSocialEventForm(null, array('user' => $this->user));
      if ($request->isMethod('post'))
      {
        if ($this->form->bindAndSave($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName())))
        {
          $this->getUser()->setFlash('notice', 'Event created');
          $this->redirect('@sf_social_event?id=' . $this->form->getObject()->getId());
        }
      }
     }
     else
     {
        return $this->forward('sfGuardAuth','signin');
     }
  }

  /**
   * Edit an event
   * @param sfRequest $request A request object
   */
  public function executeEdit(sfWebRequest $request)
  {
    $this->event = sfSocialEventPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->event, 'event not found');
    $this->forwardUnless($this->event->isAdmin($this->user_id), 'sfGuardAuth', 'secure');
    $this->form = new sfSocialEventForm($this->event, array('user' => $this->user));
    if ($request->isMethod('post'))
    {
      if ($this->form->bindAndSave($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName())))
      {
        $this->getUser()->setFlash('notice', 'Event modified');
        $this->redirect('@sf_social_event?id=' . $this->form->getObject()->getId());
      }
    }
  }

  /**
   * Invite another user to an event
   * @param sfRequest $request A request object
   */
  public function executeInvite_old(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'), 'invalid request');
    $values = $request->getParameter('sf_social_event_invite');
    $this->event = sfSocialEventPeer::retrieveByPK($values['event_id']);
    $this->forward404Unless($this->event, 'event not found');
    $this->forwardUnless($this->event->isAdmin($this->user_id), 'sfGuardAuth', 'secure');
    $this->form = new sfSocialEventInviteForm(null, array('user' => $this->user,
                                                          'event' => $this->event));
    if ($this->form->bindAndSave($values))
    {
      $this->dispatcher->notify(new sfEvent($this->form->getObjects(), 'social.event_invite'));
      $this->getUser()->setFlash('notice', '%1% users invited.');
      $this->getUser()->setFlash('nr', count($this->form->getValue('user_id')));
    }
    $this->redirect('@sf_social_event?id=' . $this->event->getId());
  }

  /**
   * Javascript for "Invite users"
   * @param sfRequest $request A request object
   */
  public function executeInvitejs(sfWebRequest $request)
  {
  }

}
