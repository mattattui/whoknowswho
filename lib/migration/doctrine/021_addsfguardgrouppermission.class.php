<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addsfguardgrouppermission extends Doctrine_Migration
{
	public function up()
	{
		$this->createTable('sf_guard_group_permission', array(
             'group_id' => 
             array(
              'type' => 'integer',
              'primary' => true,
              'length' => 4,
             ),
             'permission_id' => 
             array(
              'type' => 'integer',
              'primary' => true,
              'length' => 4,
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
             ),
             'primary' => 
             array(
              0 => 'group_id',
              1 => 'permission_id',
             ),
             ));
	}

	public function down()
	{
		$this->dropTable('sf_guard_group_permission');
	}
}