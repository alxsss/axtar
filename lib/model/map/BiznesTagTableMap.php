<?php



/**
 * This class defines the structure of the 'biznes_tag' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Jan 21 04:01:20 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class BiznesTagTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.BiznesTagTableMap';

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
        $this->setName('biznes_tag');
        $this->setPhpName('BiznesTag');
        $this->setClassname('BiznesTag');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('BIZNES_ID', 'BiznesId', 'INTEGER' , 'biznes', 'ID', true, null, null);
        $this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', true, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('TAG', 'Tag', 'VARCHAR', false, 100, null);
        $this->addPrimaryKey('NORMALIZED_TAG', 'NormalizedTag', 'VARCHAR', true, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Biznes', 'Biznes', RelationMap::MANY_TO_ONE, array('biznes_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', null);
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

} // BiznesTagTableMap
