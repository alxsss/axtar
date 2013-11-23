<?php

/**
 * content actions.
 *
 * @package    twm
 * @subpackage content
 * @author     Your name here
 * @version    SVN: $Id$
 */
class contentActions extends sfActions
{
  public function executeCollaboration()
  {
    $file = sfConfig::get('sf_data_dir').'/content/collaboration_'.$this->getUser()->getCulture().'.txt';
    if (!is_readable($file))
    {
      $file = sfConfig::get('sf_data_dir').'/content/collaboration_en.txt';
    }
    $this->html = file_get_contents($file);
  }
  public function executeInvestor()
  {
    $file = sfConfig::get('sf_data_dir').'/content/investor_'.$this->getUser()->getCulture().'.txt';
    if (!is_readable($file))
    {
      $file = sfConfig::get('sf_data_dir').'/content/investor_en.txt';
    }
    $this->html = file_get_contents($file);
  }
  public function executeFaq()
  {
    $file = sfConfig::get('sf_data_dir').'/content/faq_'.$this->getUser()->getCulture().'.txt';
    if (!is_readable($file))
    {
      $file = sfConfig::get('sf_data_dir').'/content/faq_en.txt';
    }
    $this->html = file_get_contents($file);
  }
  public function executeAbout()
  {
    $file = sfConfig::get('sf_data_dir').'/content/about_'.$this->getUser()->getCulture().'.txt';
    if (!is_readable($file))
    {
      $file = sfConfig::get('sf_data_dir').'/content/about_en.txt';
    }
    $this->html = file_get_contents($file);
  }
  public function executeNews()
  {
    $file = sfConfig::get('sf_data_dir').'/content/news_'.$this->getUser()->getCulture().'.txt';
    if (!is_readable($file))
    {
      $file = sfConfig::get('sf_data_dir').'/content/news_en.txt';
    }
    $this->html = file_get_contents($file);
  }
  public function executeCopyright()
  {
    
    $file = sfConfig::get('sf_data_dir').'/content/copyright_'.$this->getUser()->getCulture().'.txt';
    if (!is_readable($file))
    {
      $file = sfConfig::get('sf_data_dir').'/content/copyright_en.txt';
    }

    //$this->html = markdown(file_get_contents($file));
    $this->html = file_get_contents($file);
  }
  public function executeTs()
  {
    
    $file = sfConfig::get('sf_data_dir').'/content/ts_'.$this->getUser()->getCulture().'.txt';
    if (!is_readable($file))
    {
      $file = sfConfig::get('sf_data_dir').'/content/ts_en.txt';
    }
    $this->html = file_get_contents($file);
  }
  public function executePrivacyp()
  {
    
    $file = sfConfig::get('sf_data_dir').'/content/privacyp_'.$this->getUser()->getCulture().'.txt';
    if (!is_readable($file))
    {
      $file = sfConfig::get('sf_data_dir').'/content/privacyp_en.txt';
    }
    $this->html = file_get_contents($file);
  }
  public function executeContact()
  {
    
    $file = sfConfig::get('sf_data_dir').'/content/contact_'.$this->getUser()->getCulture().'.txt';
    if (!is_readable($file))
    {
      $file = sfConfig::get('sf_data_dir').'/content/contact_en.txt';
    }
    $this->html = file_get_contents($file);
  }
  public function executeUnavailable()
  {
    require_once('markdown.php');

    $file = sfConfig::get('sf_data_dir').'/content/unavailable_'.$this->getUser()->getCulture().'.txt';
    if (!is_readable($file))
    {
      $file = sfConfig::get('sf_data_dir').'/content/unavailable_en.txt';
    }

    $this->setTitle('fmpsv! &raquo; maintenance');
  }
}
?>
