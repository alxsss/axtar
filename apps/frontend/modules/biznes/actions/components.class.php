<?php
class biznesComponents extends sfComponents
{ 
  public function executeNewbiznes()
  {
    $connection = Propel::getConnection();
    $query ='SELECT id , title, address, phone, category, photo FROM biznes where approved=1 ORDER BY RAND() LIMIT 10';
    $statement = $connection->prepare($query);
    $statement->execute();
    $this->biznes=array();
    while ($biznes=$statement->fetch(PDO::FETCH_BOTH))
    {
       $this->biznes[]=$biznes;
    }
  }  
  //the same function as above but display is different
  public function executeNewbiznessearch()
  {
    $connection = Propel::getConnection();
    $query ='SELECT id , title, address, phone, category, photo FROM biznes where approved=1 ORDER BY RAND() LIMIT 10';
    $statement = $connection->prepare($query);
    $statement->execute();
    $this->biznes=array();
    while ($biznes=$statement->fetch(PDO::FETCH_BOTH))
    {
       $this->biznes[]=$biznes;
    }
  }  
}
