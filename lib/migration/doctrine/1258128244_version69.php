<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version69 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->changeColumn('home', 'feature_copy_intro', 'string', '10240', array(
             ));
    }

    public function down()
    {

    }
}