<?php



/**
 * This class defines the structure of the 'videolist' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Fri Jan  9 05:18:53 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sebekePlugin.lib.model.map
 */
class VideolistTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.sebekePlugin.lib.model.map.VideolistTableMap';

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
        $this->setName('videolist');
        $this->setPhpName('Videolist');
        $this->setClassname('Videolist');
        $this->setPackage('plugins.sebekePlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
        $this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', true, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('VideolistYtvideo', 'VideolistYtvideo', RelationMap::ONE_TO_MANY, array('id' => 'videolist_id', ), 'CASCADE', 'CASCADE', 'VideolistYtvideos');
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
            'symfony_timestampable' => array('create_column' => 'created_at', ),
        );
    } // getBehaviors()

} // VideolistTableMap