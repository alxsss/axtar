<?php
class xeberComponents extends sfComponents
{ 
  public function executeTopnewswithimages()
  {
      //get keyphrases
     $c=new Criteria();
     $c->add(KeyphrasePeer::ACTIVE, 1);
     $c->addDescendingOrderByColumn(KeyphrasePeer::CREATED_AT);
     $c->addDescendingOrderByColumn(KeyphrasePeer::COUNT);
     $c->setLimit(6);
     $this->acar_sozler=KeyphrasePeer::doSelect($c);
  }  
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
  public function executeSponsorads()
  {
  /*   $c=new Criteria();
     $c->add(SponsorPeer::PAYMENT, 1);
     $c->add(SponsorPeer::END, now(), Criteria::GREATER_THAN);
     $c->addDescendingOrderByColumn(SponsorPeer::RANK);
     $this->sponsors=SponsorPeer::doSelect($c);
*/
      $connection = Propel::getConnection();
      $query ='select url, description from sponsor where payment=1 and end >NOW() order by rank desc';
      $statement = $connection->prepare($query);
      $statement->execute();

      $this->sponsors=array();
      while ($sponsor=$statement->fetch(PDO::FETCH_BOTH))
      {
        $this->sponsors[]=$sponsor;
      }
  }  
}
