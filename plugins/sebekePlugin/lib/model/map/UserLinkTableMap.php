<?php



/**
 * This class defines the structure of the 'user_link' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Fri Jan  9 03:26:41 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sebekePlugin.lib.model.map
 */
class UserLinkTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.sebekePlugin.lib.model.map.UserLinkTableMap';

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
        $this->setName('user_link');
        $this->setPhpName('UserLink');
        $this->setClassname('UserLink');
        $this->setPackage('plugins.sebekePlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
        $this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', true, null, null);
        $this->addColumn('STATUS_TEXT', 'StatusText', 'LONGVARCHAR', false, null, null);
        $this->addColumn('NUM_COMMENT', 'NumComment', 'INTEGER', false, null, null);
        $this->addColumn('IMG', 'Img', 'VARCHAR', false, 50, null);
        $this->addColumn('URL', 'Url', 'VARCHAR', false, 255, null);
        $this->addColumn('TITLE', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('UserLinkComment', 'UserLinkComment', RelationMap::ONE_TO_MANY, array('id' => 'link_id', ), 'CASCADE', null, 'UserLinkComments');
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

} // UserLinkTableMap
