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
     $c->setLimit(30);
     $this->acar_sozler=KeyphrasePeer::doSelect($c);

  }  
  public function executeAcarsozlersearch()
  {
      //get keyphrases
     $c=new Criteria();
     $c->add(KeyphrasePeer::ACTIVE, 1);
     $c->addDescendingOrderByColumn(KeyphrasePeer::CREATED_AT);
     $c->addDescendingOrderByColumn(KeyphrasePeer::COUNT);
     $c->setLimit(30);
     $this->acar_sozler=KeyphrasePeer::doSelect($c);

  }  
}
