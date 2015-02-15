<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  static protected $zendLoaded = false;

  static public function registerZend()
  {
    if (self::$zendLoaded)
    {
      return;
    }
        require_once sfConfig::get('sf_lib_dir').'/vendor/Zend/Loader/Autoloader.php';
        Zend_Loader_Autoloader::getInstance();

        Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding("UTF-8");
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8Num_CaseInsensitive());

    self::$zendLoaded = true;

  }

  public function setup()
  {
    //setup the location for our phing and propel libs
    sfConfig::set('sf_phing_path', sfConfig::get('sf_root_dir').'/plugins/sfPropelORMPlugin/lib/vendor/phing/');
    sfConfig::set('sf_propel_path', sfConfig::get('sf_root_dir').'/plugins/sfPropelORMPlugin/lib/vendor/propel/');
    sfConfig::set('sf_propel_generator_path', sfConfig::get('sf_root_dir').'/plugins/sfPropelORMPlugin/lib/vendor/propel/generator/lib/');

    $this->enablePlugins('sfPropelORMPlugin');
    $this->enablePlugins('sfGuardPlugin');
    $this->enablePlugins('sfSocialPlugin');
    $this->enablePlugins('sfLanguageSwitchPlugin');
    $this->enablePlugins('sebekePlugin');
    $this->enablePlugins('sfApplyPlugin');
    $this->enablePlugins('sfMediaLibraryPlugin');
    $this->enablePlugins('sfThumbnailPlugin');
    //$this->enablePlugins('sfSimpleGoogleSitemapPlugin');
  }

}
