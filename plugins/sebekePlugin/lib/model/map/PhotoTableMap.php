<?php



/**
 * This class defines the structure of the 'photo' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Fri Jan  9 03:26:39 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sebekePlugin.lib.model.map
 */
class PhotoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.sebekePlugin.lib.model.map.PhotoTableMap';

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
        $this->setName('photo');
        $this->setPhpName('Photo');
        $this->setClassname('Photo');
        $this->setPackage('plugins.sebekePlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('ALBUM_ID', 'AlbumId', 'INTEGER', 'album', 'ID', false, null, null);
        $this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', true, null, null);
        $this->addColumn('FILENAME', 'Filename', 'VARCHAR', true, 255, null);
        $this->addColumn('HITS', 'Hits', 'INTEGER', false, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('RATING', 'Rating', 'INTEGER', false, null, null);
        $this->addColumn('NUM_COMMENT', 'NumComment', 'INTEGER', false, null, null);
        $this->addColumn('VOTE', 'Vote', 'INTEGER', false, null, null);
        $this->addColumn('TITLE', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('APPROVED', 'Approved', 'BOOLEAN', false, 1, true);
        $this->addColumn('VISIBILITY', 'Visibility', 'TINYINT', true, null, 0);
        $this->addColumn('POPULAR_PHOTO', 'PopularPhoto', 'BOOLEAN', false, 1, false);
        $this->addColumn('RAW_IP', 'RawIp', 'VARCHAR', false, 50, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Album', 'Album', RelationMap::MANY_TO_ONE, array('album_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('PhotoComment', 'PhotoComment', RelationMap::ONE_TO_MANY, array('id' => 'photo_id', ), 'CASCADE', null, 'PhotoComments');
        $this->addRelation('PhotoTag', 'PhotoTag', RelationMap::ONE_TO_MANY, array('id' => 'photo_id', ), 'CASCADE', null, 'PhotoTags');
        $this->addRelation('PhotoFav', 'PhotoFav', RelationMap::ONE_TO_MANY, array('id' => 'photo_id', ), 'CASCADE', null, 'PhotoFavs');
        $this->addRelation('PhotoVote', 'PhotoVote', RelationMap::ONE_TO_MANY, array('id' => 'photo_id', ), 'CASCADE', null, 'PhotoVotes');
        $this->addRelation('PhotoRate', 'PhotoRate', RelationMap::ONE_TO_MANY, array('id' => 'photo_id', ), 'CASCADE', null, 'PhotoRates');
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

} // PhotoTableMap
