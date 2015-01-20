<?php



class EventStatusCommentMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.sfSocialPlugin.lib.model.map.EventStatusCommentMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(EventStatusCommentPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(EventStatusCommentPeer::TABLE_NAME);
		$tMap->setPhpName('EventStatusComment');
		$tMap->setClassname('EventStatusComment');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', true, null);

		$tMap->addForeignKey('EVENT_STATUS_ID', 'EventStatusId', 'INTEGER', 'event_status', 'ID', true, null);

		$tMap->addColumn('COMMENT', 'Comment', 'LONGVARCHAR', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

	} 
} 