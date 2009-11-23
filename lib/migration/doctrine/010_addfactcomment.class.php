<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addfactcomment extends Doctrine_Migration
{
	public function up()
	{
		$this->createTable('fact_comment', array(
             'id' => 
             array(
              'type' => 'integer',
              'primary' => true,
              'autoincrement' => true,
              'length' => 8,
             ),
             'fact_id' => 
             array(
              'type' => 'integer',
              'notnull' => true,
              'length' => 8,
             ),
             'fact_score' => 
             array(
              'type' => 'integer',
              'default' => '0',
              'notnull' => true,
              'length' => 2,
             ),
             'comment_score' => 
             array(
              'type' => 'integer',
              'default' => '0',
              'notnull' => true,
              'length' => 2,
             ),
             'created_by' => 
             array(
              'type' => 'integer',
              'notnull' => true,
              'length' => 4,
             ),
             'comment' => 
             array(
              'type' => 'string',
              'length' => 2147483647,
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
		$this->dropTable('fact_comment');
	}
}