<?php


/**
 * This class adds structure of 'sf_guard_user_profile' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Sat Sep 29 17:08:37 2012
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sfGuardPlugin.lib.model.map
 */
class sfGuardUserProfileMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfGuardPlugin.lib.model.map.sfGuardUserProfileMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(sfGuardUserProfilePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(sfGuardUserProfilePeer::TABLE_NAME);
		$tMap->setPhpName('sfGuardUserProfile');
		$tMap->setClassname('sfGuardUserProfile');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', true, null);

		$tMap->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', false, 20);

		$tMap->addColumn('LAST_NAME', 'LastName', 'VARCHAR', false, 20);

		$tMap->addColumn('PHOTO', 'Photo', 'VARCHAR', false, 50);

		$tMap->addColumn('BIRTHDAY', 'Birthday', 'DATE', false, null);

		$tMap->addColumn('GENDER', 'Gender', 'INTEGER', false, null);

		$tMap->addColumn('STATUS', 'Status', 'INTEGER', false, null);

		$tMap->addColumn('LOOKINGFOR', 'Lookingfor', 'LONGVARCHAR', false, null);

		$tMap->addColumn('CITY', 'City', 'VARCHAR', false, 100);

		$tMap->addColumn('STATE', 'State', 'VARCHAR', false, 10);

		$tMap->addColumn('ZIP', 'Zip', 'VARCHAR', false, 10);

		$tMap->addForeignKey('COUNTRY_ID', 'CountryId', 'INTEGER', 'country', 'ID', false, null);

		$tMap->addColumn('WEBSITE', 'Website', 'LONGVARCHAR', false, null);

		$tMap->addColumn('ACTIVITIES', 'Activities', 'LONGVARCHAR', false, null);

		$tMap->addColumn('BOOKS', 'Books', 'LONGVARCHAR', false, null);

		$tMap->addColumn('MUSIC', 'Music', 'LONGVARCHAR', false, null);

		$tMap->addColumn('MOVIES', 'Movies', 'LONGVARCHAR', false, null);

		$tMap->addColumn('TVSHOWS', 'Tvshows', 'LONGVARCHAR', false, null);

		$tMap->addColumn('ABOUTME', 'Aboutme', 'LONGVARCHAR', false, null);

		$tMap->addColumn('VALIDATE', 'Validate', 'VARCHAR', false, 17);

		$tMap->addColumn('VISIBILITY', 'Visibility', 'TINYINT', true, null);

	} // doBuild()

} // sfGuardUserProfileMapBuilder
