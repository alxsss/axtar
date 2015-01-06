<?php
class BiznesRatePeer extends BaseBiznesRatePeer
{
  public static function getBiznesRatingPager($page, $user_id)
 {
   $pager = new sfPropelPager('BiznesRate', sfConfig::get('app_pager_homepage_max'));  
   $c=new Criteria();
   $c->add(BiznesPeer::USER_ID, $user_id);  
   $c->add(BiznesRatePeer::DELETED,0);
   $c->addDescendingOrderByColumn(BiznesRatePeer::CREATED_AT);
   $pager->setCriteria($c);
   $pager->setPage($page);  
   $pager->setPeerMethod('doSelectJoinBiznes');
   $pager->setPeerCountMethod('doCountJoinBiznes');
   $pager->init(); 
   return $pager;
 }
}
