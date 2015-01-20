<?php



/**
 * This class defines the structure of the 'sf_social_group_user' table.
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
 * @package    propel.generator.plugins.sfSocialPlugin.lib.model.map
 */
class sfSocialGroupUserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.sfSocialPlugin.lib.model.map.sfSocialGroupUserTableMap';

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
        $this->setName('sf_social_group_user');
        $this->setPhpName('sfSocialGroupUser');
        $this->setClassname('sfSocialGroupUser');
        $this->setPackage('plugins.sfSocialPlugin.lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('GROUP_ID', 'GroupId', 'INTEGER' , 'sf_social_group', 'ID', true, null, null);
        $this->addForeignPrimaryKey('USER_ID', 'UserId', 'INTEGER' , 'sf_guard_user', 'ID', true, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('sfSocialGroup', 'sfSocialGroup', RelationMap::MANY_TO_ONE, array('group_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', 'CASCADE');
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

} // sfSocialGroupUserTableMap