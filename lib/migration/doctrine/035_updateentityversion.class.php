<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Updateentityversion extends Doctrine_Migration
{
	public function up()
	{
    /* photo_url: string(255)
     * photo_caption: string(255)
     * photo_licence: string(255)
     */
     
   $this->addColumn('entity_version', 'photo_url', 'string',  array(
        'type' => 'string',
        'length' => '255',
        ));
   $this->addColumn('entity_version', 'photo_caption', 'string',  array(
        'type' => 'string',
        'length' => '255',
        ));
   $this->addColumn('entity_version', 'photo_licence', 'string',  array(
        'type' => 'string',
        'length' => '255',
        ));     
	}

	public function down()
	{
	  $this->removeColumn('entity_version', 'photo_url');
    $this->removeColumn('entity_version', 'photo_caption');
    $this->removeColumn('entity_version', 'photo_licence');

	}
}