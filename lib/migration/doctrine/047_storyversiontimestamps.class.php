<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Storyversiontimestamps extends Doctrine_Migration
{
	public function up()
	{
    $this->addColumn('story_version', 'created_at', 'timestamp');
    $this->addColumn('story_version', 'updated_at', 'timestamp');

	}

	public function down()
	{
    $this->removeColumn('story_version', 'created_at');
    $this->removeColumn('story_version', 'updated_at');

	}
}