<?php
class xeberComponents extends sfComponents
{ 
  public function executeAcarsozler()
  {
      //get keyphrases
     $c=new Criteria();
     $c->add(KeyphrasePeer::ACTIVE, 1);
     $c->addDescendingOrderByColumn(KeyphrasePeer::CREATED_AT);
     $c->addDescendingOrderByColumn(KeyphrasePeer::COUNT);
     $c->setLimit(15);
     $this->acar_sozler=KeyphrasePeer::doSelect($c);

  }  
  public function executeAcarsozlersearch()
  {
      //get keyphrases
     $c=new Criteria();
     $c->add(KeyphrasePeer::ACTIVE, 1);
     $c->addDescendingOrderByColumn(KeyphrasePeer::CREATED_AT);
     $c->addDescendingOrderByColumn(KeyphrasePeer::COUNT);
     $c->setLimit(15);
     $this->acar_sozler=KeyphrasePeer::doSelect($c);

  }  
  public function executeTopnews()
  {
      //get keyphrases
     $c=new Criteria();
     $c->add(KeyphrasePeer::ACTIVE, 1);
     $c->addDescendingOrderByColumn(KeyphrasePeer::CREATED_AT);
     $c->addDescendingOrderByColumn(KeyphrasePeer::COUNT);
     $c->setLimit(5);
     $this->acar_sozler=KeyphrasePeer::doSelect($c);
  }  
}
