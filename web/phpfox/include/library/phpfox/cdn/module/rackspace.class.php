<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * Class to work with Rackspace Cloud Files
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: s3.class.php 2572 2011-04-28 09:04:06Z Raymond_Benc $
 */
class Phpfox_Cdn_Module_Rackspace extends Phpfox_Cdn_Abstract
{
	/**
	 * Object for the amazon s3 class
	 *
	 * @var object
	 */
	private $_oObject = null;
	
	/**
	 * Name of the bucket we plan to store all the uploaded data
	 *
	 * @var string
	 */
	private $_sBucket = null;
	
	/**
	 * Bool value if the bucket has already been created or not.
	 *
	 * @var bool
	 */
	private $_bHasBucket = false;
	
	/**
	 * Bool value if we were able to upload the file or not.
	 *
	 * @var false
	 */
	private $_bIsUploaded = false;
	
	private $_oContainer = null;
	
	/**
	 * Loads the amazons3 library developed by another group.
	 *
	 */
	public function __construct()
	{
		require_once(PHPFOX_DIR_LIB . 'rackspace/cloudfiles.php');
		
		$oAuth = new CF_Authentication(Phpfox::getParam('core.rackspace_username'), Phpfox::getParam('core.rackspace_key'));
		$oAuth->authenticate();
		$this->_oObject = new CF_Connection($oAuth);
		$this->_sBucket = Phpfox::getParam('core.rackspace_container');	
		
		$this->_oContainer = $this->_oObject->get_container($this->_sBucket);		
	}
	
	public function remove($sFile)
	{
		$sName = str_replace("\\", '/', str_replace(PHPFOX_DIR, '', $sFile));
		
		$this->_oContainer->delete_object($sName);
	}	
	
	/**
	 * Uploads the file to Rackspace server.
	 *
	 * @param string $sFile Full path to where the file is located.
	 * @param string $sName Optional name of the file once it is uploaded. By default we just use the original file name.
	 * @return bool We only return a bool false if we were not able to upload the item.
	 */
	public function put($sFile, $sName = null)
	{	
		if (empty($sName))
		{
			$sName = str_replace("\\", '/', str_replace(PHPFOX_DIR, '', $sFile));
		}
		
		$object = $this->_oContainer->create_object($sName);

		$object->load_from_filename($sName);
		
		$this->_bIsUploaded = true;
		
		return true;
	}
	
	/**
	 * Returns a server ID. We always run "1" (int) if the file was uploaded to the amazon server, if not return "0" (int) so we display the local file instead.
	 *
	 * @return string
	 */
	public function getServerId()
	{
		return ($this->_bIsUploaded ? '1' : '0');
	}
	
	/**
	 * Get the full URL to the amazon bucket with support to load a CDN CNAME URL.
	 *
	 * @param string $sPath Path to the fule we are going to display.
	 * @return string Full path to the file on amazons server.
	 */
	public function getUrl($sPath)
	{	
		$sName = str_replace("\\", '/', str_replace(Phpfox::getParam('core.path'), '', $sPath));
		
		// $oPic = $this->_oContainer->create_object($sName);		
		// return $oPic->public_uri();
		return rtrim(Phpfox::getParam('core.rackspace_url'), '/') . '/' . $sName;
	}
}

?>