<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addentitycreationqueue extends Doctrine_Migration
{
	public function up()
	{
		$this->createTable('entity_creation_queue', array(
             'id' => 
             array(
              'type' => 'integer',
              'primary' => true,
              'autoincrement' => true,
              'length' => 8,
             ),
             'entity_id' => 
             array(
              'type' => 'integer',
              'unique' => true,
              'length' => 8,
             ),
             'mp_info' => 
             array(
              'type' => 'enum',
              'values' => 
              array(
              0 => 'pending',
              1 => 'active',
              2 => 'done',
              ),
              'notnull' => true,
              'default' => 'pending',
              'length' => NULL,
             ),
             'person' => 
             array(
              'type' => 'enum',
              'values' => 
              array(
              0 => 'pending',
              1 => 'active',
              2 => 'done',
              ),
              'notnull' => true,
              'default' => 'pending',
              'length' => NULL,
             ),
             'created_at' => 
             array(
              'type' => 'timestamp',
              'length' => 25,
             ),
             'updated_at' => 
             array(
              'type' => 'timestamp',
              'length' => 25,
             ),
             ), array(
             'type' => 'INNODB',
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
	}

	public function down()
	{
		$this->dropTable('entity_creation_queue');
	}
}