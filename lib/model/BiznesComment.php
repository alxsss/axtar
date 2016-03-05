<?php

/**
 * Subclass for representing a row from the 'photo_comment' table.
 *
 * 
 *
 * @package lib.model
 */ 
class BiznesComment extends BaseBiznesComment
{
  //override photoComment's save function to increment num_comment valuer in photo table
  public function save(PropelPDO  $con = null)
  {
    $ret = parent::save($con);
    //update num_comment column in photo table
    $biznes = $this->getBiznes();
    $num_comment = $biznes->getNumComment();
    $biznes->setNumComment($num_comment + 1);
    $old_score=$biznes->getScore();
    $new_score=($old_score*$num_comment+$this->getScore() )/($num_comment+1);
    $biznes->setScore($new_score);
    $biznes->save($con);
    return $ret;
 }
  public function delete(PropelPDO  $con = null)
  {
    $ret = parent::delete($con);
    //update num_comment column in photo table
    $biznes = $this->getBiznes();
    $num_comment = $biznes->getNumComment();
    if($num_comment>0)
    {
      $biznes->setNumComment($num_comment - 1);
      $old_score=$biznes->getScore();
      $new_score=($old_score*$num_comment-$this->getScore())/($num_comment-1);
      $biznes->setScore($new_score);
      $biznes->save($con);
    }
    return $ret;
 }
}
