<?php



/**
 * This class defines the structure of the 'sponsor' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Tue Jan  6 00:50:39 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class SponsorTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.SponsorTableMap';

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
        $this->setName('sponsor');
        $this->setPhpName('Sponsor');
        $this->setClassname('Sponsor');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('URL', 'Url', 'VARCHAR', true, 256, null);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('START', 'Start', 'DATE', true, null, null);
        $this->addColumn('END', 'End', 'DATE', true, null, null);
        $this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 100, null);
        $this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 15, null);
        $this->addColumn('COMMENT', 'Comment', 'LONGVARCHAR', false, null, null);
        $this->addColumn('PAYMENT', 'Payment', 'TINYINT', false, 4, 0);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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

} // SponsorTableMap
