<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Storycolumndropscores extends Doctrine_Migration
{
	public function up()
	{
    $this->removeColumn('story_comment', 'story_score');
    $this->removeColumn('story_comment', 'comment_score');

	}

	public function down()
	{
    $this->addColumn('story_comment', 'story_score', 'integer', array( 'type' => 'integer', 'default' => '0', 'notnull' => true, 'length' => 2, ));
    $this->addColumn('story_comment', 'comment_score', 'integer', array( 'type' => 'integer', 'default' => '0', 'notnull' => true, 'length' => 2, ));
	}
}