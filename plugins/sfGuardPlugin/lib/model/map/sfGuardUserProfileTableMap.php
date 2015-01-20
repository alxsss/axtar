<?php



/**
 * This class defines the structure of the 'sf_guard_user_profile' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Fri Jan  9 05:18:54 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.map
 */
class sfGuardUserProfileTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.sfGuardPlugin.lib.model.map.sfGuardUserProfileTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('sf_guard_user_profile');
        $this->setPhpName('sfGuardUserProfile');
        $this->setClassname('sfGuardUserProfile');
        $this->setPackage('plugins.sfGuardPlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', true, null, null);
        $this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', false, 20, null);
        $this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', false, 20, null);
        $this->addColumn('PHOTO', 'Photo', 'VARCHAR', false, 50, null);
        $this->addColumn('BIRTHDAY', 'Birthday', 'DATE', false, null, null);
        $this->addColumn('GENDER', 'Gender', 'INTEGER', false, null, null);
        $this->addColumn('STATUS', 'Status', 'INTEGER', false, null, 0);
        $this->addColumn('LOOKINGFOR', 'Lookingfor', 'LONGVARCHAR', false, null, null);
        $this->addColumn('CITY', 'City', 'VARCHAR', false, 100, null);
        $this->addColumn('STATE', 'State', 'VARCHAR', false, 10, null);
        $this->addColumn('ZIP', 'Zip', 'VARCHAR', false, 10, null);
        $this->addForeignKey('COUNTRY_ID', 'CountryId', 'INTEGER', 'country', 'ID', false, null, null);
        $this->addColumn('WEBSITE', 'Website', 'LONGVARCHAR', false, null, null);
        $this->addColumn('ACTIVITIES', 'Activities', 'LONGVARCHAR', false, null, null);
        $this->addColumn('BOOKS', 'Books', 'LONGVARCHAR', false, null, null);
        $this->addColumn('MUSIC', 'Music', 'LONGVARCHAR', false, null, null);
        $this->addColumn('MOVIES', 'Movies', 'LONGVARCHAR', false, null, null);
        $this->addColumn('TVSHOWS', 'Tvshows', 'LONGVARCHAR', false, null, null);
        $this->addColumn('ABOUTME', 'Aboutme', 'LONGVARCHAR', false, null, null);
        $this->addColumn('VALIDATE', 'Validate', 'VARCHAR', false, 17, null);
        $this->addColumn('VISIBILITY', 'Visibility', 'TINYINT', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('Country', 'Country', RelationMap::MANY_TO_ONE, array('country_id' => 'id', ), 'CASCADE', null);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
        );
    } // getBehaviors()

} // sfGuardUserProfileTableMap