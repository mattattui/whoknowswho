<?php

/**
 * BaseEntityCreationQueue
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $entity_id
 * @property enum $mp_info
 * @property enum $person
 * @property Entity $Entity
 * 
 * @method integer             getId()        Returns the current record's "id" value
 * @method integer             getEntityId()  Returns the current record's "entity_id" value
 * @method enum                getMpInfo()    Returns the current record's "mp_info" value
 * @method enum                getPerson()    Returns the current record's "person" value
 * @method Entity              getEntity()    Returns the current record's "Entity" value
 * @method EntityCreationQueue setId()        Sets the current record's "id" value
 * @method EntityCreationQueue setEntityId()  Sets the current record's "entity_id" value
 * @method EntityCreationQueue setMpInfo()    Sets the current record's "mp_info" value
 * @method EntityCreationQueue setPerson()    Sets the current record's "person" value
 * @method EntityCreationQueue setEntity()    Sets the current record's "Entity" value
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6716 2009-11-12 19:26:28Z jwage $
 */
abstract class BaseEntityCreationQueue extends FoafRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('entity_creation_queue');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '8',
             ));
        $this->hasColumn('entity_id', 'integer', 8, array(
             'type' => 'integer',
             'notnull' => false,
             'unique' => true,
             'length' => '8',
             ));
        $this->hasColumn('mp_info', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'pending',
              1 => 'active',
              2 => 'done',
             ),
             'notnull' => true,
             'default' => 'pending',
             ));
        $this->hasColumn('person', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'pending',
              1 => 'active',
              2 => 'done',
             ),
             'notnull' => true,
             'default' => 'pending',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Entity', array(
             'local' => 'entity_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}