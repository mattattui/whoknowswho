<?php

/**
 * BaseFactActionRequired
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $fact_id
 * @property integer $needs_sources
 * @property integer $needs_description
 * @property Fact $Fact
 * 
 * @method integer            getFactId()            Returns the current record's "fact_id" value
 * @method integer            getNeedsSources()      Returns the current record's "needs_sources" value
 * @method integer            getNeedsDescription()  Returns the current record's "needs_description" value
 * @method Fact               getFact()              Returns the current record's "Fact" value
 * @method FactActionRequired setFactId()            Sets the current record's "fact_id" value
 * @method FactActionRequired setNeedsSources()      Sets the current record's "needs_sources" value
 * @method FactActionRequired setNeedsDescription()  Sets the current record's "needs_description" value
 * @method FactActionRequired setFact()              Sets the current record's "Fact" value
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6716 2009-11-12 19:26:28Z jwage $
 */
abstract class BaseFactActionRequired extends FoafRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('fact_action_required');
        $this->hasColumn('fact_id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'length' => '8',
             ));
        $this->hasColumn('needs_sources', 'integer', 1, array(
             'type' => 'integer',
             'length' => '1',
             ));
        $this->hasColumn('needs_description', 'integer', 1, array(
             'type' => 'integer',
             'length' => '1',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Fact', array(
             'local' => 'fact_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));
    }
}