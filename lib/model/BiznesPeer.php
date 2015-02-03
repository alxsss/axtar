<?php
/**
 * Subclass for performing query and update operations on the 'photo' table.
 *
 * 
 *
 * @package lib.model
 */ 
class BiznesPeer extends BaseBiznesPeer
{
 //returns six the most popular photos
 public static function getPopularBizness()
 {
   $c = new Criteria();
   $c->setLimit(4);
   $c->add(self::APPROVED, 1);
   $c->addDescendingOrderByColumn(BiznesPeer::RATING);
   $photos=BiznesPeer::doSelect($c);   
   return $photos;
 }
  public static function getNewBizness()
 {
   $c = new Criteria();
   $c->setLimit(4);
   $c->add(self::APPROVED, 1);
   $c->addDescendingOrderByColumn(BiznesPeer::CREATED_AT);
   $photos=BiznesPeer::doSelect($c);   
   return $photos;
 }
public static function getPopularBiznessPager($page)
{
  $pager = new sfPropelPager('Biznes', sfConfig::get('app_pager_popular_photos_max'));  
  $c = new Criteria();
  $c->add(self::APPROVED, 1);
  $c->addDescendingOrderByColumn(BiznesPeer::RATING);
  $pager->setCriteria($c);
  $pager->setPage($page);
  //$pager->setPeerMethod('doSelectJoinUser');
  $pager->setPeerMethod('doSelect');
  $pager->init(); 
  return $pager;
}public static function getNewBiznessPager($page)
{
  $pager = new sfPropelPager('Biznes', sfConfig::get('app_pager_popular_photos_max'));  
  $c = new Criteria();
  $c->add(self::APPROVED, 1);
  $c->addDescendingOrderByColumn(BiznesPeer::CREATED_AT);
  $pager->setCriteria($c);
  $pager->setPage($page);
  //$pager->setPeerMethod('doSelectJoinUser');
  $pager->setPeerMethod('doSelect');
  $pager->init(); 
  return $pager;
}
public static function getShowBiznesPager($user_id)
{
  $c = new Criteria();
  $c->add(self::APPROVED, 1);
  $c->add(BiznesPeer::USER_ID, $user_id);
  $c->addDescendingOrderByColumn(self::CREATED_AT);
  $photos=BiznesPeer::doSelect($c); 
  return $photos;
}
public static function getShownewBiznesPager()
{
  $c = new Criteria();
  $c->add(self::APPROVED, 1);
  $c->addDescendingOrderByColumn(BiznesPeer::CREATED_AT);
  $photos=BiznesPeer::doSelect($c); 
  return $photos;
}
public static function getShowpopularBiznesPager()
{
  $c = new Criteria();
  $c->add(self::APPROVED, 1);
  $c->addDescendingOrderByColumn(BiznesPeer::RATING);
  $photos=BiznesPeer::doSelect($c); 
  return $photos;
}
  public static function getAllBiznesPager($page, $user_id)
 {
   $pager = new sfPropelPager('Biznes', sfConfig::get('app_pager_biznes'));  
   $c = new Criteria();
   $c->add(self::APPROVED, 1);
   $c->add(BiznesPeer::USER_ID, $user_id);
   $c->addDescendingOrderByColumn(self::CREATED_AT);
   $pager->setCriteria($c);
   $pager->setPage($page);
   $pager->setPeerMethod('doSelect');
   $pager->init(); 
   return $pager;
 }
}
