<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addsfguarduser extends Doctrine_Migration
{
	public function up()
	{
		$this->createTable('sf_guard_user', array(
             'id' => 
             array(
              'type' => 'integer',
              'primary' => true,
              'autoincrement' => true,
              'length' => 4,
             ),
             'username' => 
             array(
              'type' => 'string',
              'notnull' => true,
              'unique' => true,
              'length' => 128,
             ),
             'algorithm' => 
             array(
              'type' => 'string',
              'default' => 'sha1',
              'notnull' => true,
              'length' => 128,
             ),
             'salt' => 
             array(
              'type' => 'string',
              'length' => 128,
             ),
             'password' => 
             array(
              'type' => 'string',
              'length' => 128,
             ),
             'is_active' => 
             array(
              'type' => 'boolean',
              'default' => '1',
              'length' => 25,
             ),
             'is_super_admin' => 
             array(
              'type' => 'boolean',
              'default' => 0,
              'length' => 25,
             ),
             'last_login' => 
             array(
              'type' => 'timestamp',
              'length' => 25,
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
             'indexes' => 
             array(
              'is_active_idx' => 
              array(
              'fields' => 
              array(
               0 => 'is_active',
              ),
              ),
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
	}

	public function down()
	{
		$this->dropTable('sf_guard_user');
	}
}