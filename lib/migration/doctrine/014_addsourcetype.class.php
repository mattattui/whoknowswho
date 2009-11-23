<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addsourcetype extends Doctrine_Migration
{
	public function up()
	{
		$this->createTable('source_type', array(
             'id' => 
             array(
              'type' => 'integer',
              'primary' => true,
              'autoincrement' => true,
              'length' => 4,
             ),
             'type' => 
             array(
              'type' => 'string',
              'notnull' => true,
              'length' => 255,
             ),
             'description' => 
             array(
              'type' => 'string',
              'length' => 2147483647,
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
		$this->dropTable('source_type');
	}
}