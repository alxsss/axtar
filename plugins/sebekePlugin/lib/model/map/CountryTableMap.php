<?php



/**
 * This class defines the structure of the 'country' table.
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
class CountryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.sebekePlugin.lib.model.map.CountryTableMap';

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
        $this->setName('country');
        $this->setPhpName('Country');
        $this->setClassname('Country');
        $this->setPackage('plugins.sebekePlugin.lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, 0);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 64, '');
        $this->addColumn('ISO_CODE_2', 'IsoCode2', 'CHAR', true, 2, '');
        $this->addColumn('ISO_CODE_3', 'IsoCode3', 'CHAR', true, 3, '');
        $this->addColumn('ADDRESS_FORMAT_ID', 'AddressFormatId', 'INTEGER', true, 10, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Region', 'Region', RelationMap::ONE_TO_MANY, array('id' => 'country_id', ), 'CASCADE', null, 'Regions');
        $this->addRelation('sfGuardUserProfile', 'sfGuardUserProfile', RelationMap::ONE_TO_MANY, array('id' => 'country_id', ), 'CASCADE', null, 'sfGuardUserProfiles');
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

} // CountryTableMap
