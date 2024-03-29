<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version63 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('entity', 'connectedness', 'integer', '2', array(
             'notnull' => '1',
             'default' => '0',
             ));
        $this->addColumn('entity_version', 'connectedness', 'integer', '2', array(
             'notnull' => '1',
             'default' => '0',
             ));
    }

    public function down()
    {
        $this->removeColumn('entity', 'connectedness');
        $this->removeColumn('entity_version', 'connectedness');
    }
}