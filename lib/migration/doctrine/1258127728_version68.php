<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version68 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('home', 'is_active', 'boolean', '25', array(
             'notnull' => '1',
             'default' => '0',
             ));
    }

    public function down()
    {
        $this->removeColumn('home', 'is_active');
    }
}