<?php

class BiznesFavPeer extends BaseBiznesFavPeer
{
  public static function getAllFavBiznesPager($page, $user_id)
 {
   $pager = new sfPropelPager('Biznes', sfConfig::get('app_pager_homepage_max'));  
   $c = new Criteria();
   $c->addJoin(BiznesPeer::ID, BiznesFavPeer::PHOTO_ID);
   $c->add(BiznesFavPeer::USER_ID, $user_id);
   $c->addDescendingOrderByColumn(self::CREATED_AT);
   $pager->setCriteria($c);
   $pager->setPage($page);
   $pager->setPeerMethod('doSelect');
   $pager->init(); 
   return $pager;
 }

}
