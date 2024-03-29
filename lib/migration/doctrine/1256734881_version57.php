<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version57 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('story_index', 'story_index_id_story_id', array(
             'name' => 'story_index_id_story_id',
             'local' => 'id',
             'foreign' => 'id',
             'foreignTable' => 'story',
             'onUpdate' => 'CASCADE',
             'onDelete' => 'CASCADE',
             ));
        $this->addIndex('entity', 'name_idx', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->addIndex('entity_alias', 'name_idx', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->addIndex('story_index', 'story_index_id', array(
             'fields' => 
             array(
              0 => 'id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('story_index', 'story_index_id_story_id');
        $this->removeIndex('entity', 'name_idx', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->removeIndex('entity_alias', 'name_idx', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->removeIndex('story_index', 'story_index_id', array(
             'fields' => 
             array(
              0 => 'id',
             ),
             ));
    }
}