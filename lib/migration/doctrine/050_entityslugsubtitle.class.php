<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Entityslugsubtitle extends Doctrine_Migration
{
	public function up()
	{
    $this->addColumn('entity', 'subtitle', 'string', array('length' => 255));
    $this->addColumn('entity_version', 'subtitle', 'string', array('length' => 255));
    
    $this->addColumn('entity', 'slug', 'string', array('length' => 255));
    $this->addColumn('entity_version', 'slug', 'string', array('length' => 255));
    
    $this->addColumn('entity_version', 'created_at', 'timestamp');
    $this->addColumn('entity_version', 'updated_at', 'timestamp');
    
    $this->addIndex('entity', 'slug', array('fields' => array('slug'), 'type' => 'unique'));
	}

	public function down()
	{
	  throw new Doctrine_Migration_IrreversibleMigrationException(
        'The remove column operation cannot be undone!'
    );
    $this->removeColumn('entity', 'slug');
    $this->removeColumn('entity_version', 'slug');

    $this->removeColumn('entity', 'subtitle');
    $this->removeColumn('entity_version', 'subtitle');

    $this->removeColumn('entity_version', 'created_at');

    $this->removeColumn('entity_version', 'updated_at');
    

	}
}