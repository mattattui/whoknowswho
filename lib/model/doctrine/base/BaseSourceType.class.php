<?php

/**
 * BaseSourceType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $type
 * @property string $description
 * @property Doctrine_Collection $Sources
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getType()        Returns the current record's "type" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method Doctrine_Collection getSources()     Returns the current record's "Sources" collection
 * @method SourceType          setId()          Sets the current record's "id" value
 * @method SourceType          setType()        Sets the current record's "type" value
 * @method SourceType          setDescription() Sets the current record's "description" value
 * @method SourceType          setSources()     Sets the current record's "Sources" collection
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6716 2009-11-12 19:26:28Z jwage $
 */
abstract class BaseSourceType extends FoafRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('source_type');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('description', 'string', 2147483647, array(
             'type' => 'string',
             'length' => '2147483647',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('FactSource as Sources', array(
             'local' => 'id',
             'foreign' => 'source_type_id'));
    }
}