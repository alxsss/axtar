<?php
/**
 * Subclass for representing a row from the 'photo' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Biznes extends BaseBiznes
{
  public function __toString()
  {
    //return $this->getTitle();
  }
public function  removeFavBiznes($user_id)
{
  $c = new Criteria();
  $c->add(BiznesFavPeer::BIZNES_ID, $this->getId());
  $c->add(BiznesFavPeer::USER_ID, $user_id);
  BiznesFavPeer::doDelete($c);
}

public function delete(PropelPDO $con = null)
{
   //delete file from hard disk
  $uploadDirName='/uploads/assets';
  $uploadDir     = sfConfig::get('sf_web_dir').$uploadDirName;
  $biznes_imageFile = $uploadDir.'/biznes/'.$this->getPhoto();
  if(is_readable($biznes_imageFile))
  {
    unlink($biznes_imageFile);
  }
  $biznes_normal_imageFile = $uploadDir.'/biznes/normal/'.$this->getPhoto();
  if(is_readable($biznes_normal_imageFile))
  {
    unlink($biznes_normal_imageFile);
  }
  $thumbnailsDir = sfConfig::get('app_sfMediaLibrary_thumbnails_dir', 'thumbnail');
  $itemThumbnailFile = $uploadDir.'/biznes/'.$thumbnailsDir.'/'.$this->getPhoto();
  if (is_readable($itemThumbnailFile))
  {
     unlink($itemThumbnailFile);
  }
    //
  return parent::delete($con);
}
}
