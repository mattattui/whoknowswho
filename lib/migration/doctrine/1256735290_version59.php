<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version59 extends Doctrine_Migration_Base
{
    public function up()
    {
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
        $this->createForeignKey('entity_index', 'entity_index_id_entity_id', array(
             'name' => 'entity_index_id_entity_id',
             'local' => 'id',
             'foreign' => 'id',
             'foreignTable' => 'entity',
             'onUpdate' => 'CASCADE',
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('entity_alias_index', 'entity_alias_index_id_entity_alias_id', array(
             'name' => 'entity_alias_index_id_entity_alias_id',
             'local' => 'id',
             'foreign' => 'id',
             'foreignTable' => 'entity_alias',
             'onUpdate' => 'CASCADE',
             'onDelete' => 'CASCADE',
             ));
        $this->addIndex('entity_index', 'entity_index_id', array(
             'fields' => 
             array(
              0 => 'id',
             ),
             ));
        $this->addIndex('entity_alias_index', 'entity_alias_index_id', array(
             'fields' => 
             array(
              0 => 'id',
             ),
             ));
    }

    public function down()
    {
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
        $this->dropForeignKey('entity_index', 'entity_index_id_entity_id');
        $this->dropForeignKey('entity_alias_index', 'entity_alias_index_id_entity_alias_id');
        $this->removeIndex('entity_index', 'entity_index_id', array(
             'fields' => 
             array(
              0 => 'id',
             ),
             ));
        $this->removeIndex('entity_alias_index', 'entity_alias_index_id', array(
             'fields' => 
             array(
              0 => 'id',
             ),
             ));
    }
}