<?php

/**
 * BaseFactSourceVerified
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $fact_source_id
 * @property integer $score
 * @property integer $created_by
 * @property string $comment
 * @property sfGuardUser $Creator
 * @property FactSource $FactSource
 * 
 * @method integer            getId()             Returns the current record's "id" value
 * @method integer            getFactSourceId()   Returns the current record's "fact_source_id" value
 * @method integer            getScore()          Returns the current record's "score" value
 * @method integer            getCreatedBy()      Returns the current record's "created_by" value
 * @method string             getComment()        Returns the current record's "comment" value
 * @method sfGuardUser        getCreator()        Returns the current record's "Creator" value
 * @method FactSource         getFactSource()     Returns the current record's "FactSource" value
 * @method FactSourceVerified setId()             Sets the current record's "id" value
 * @method FactSourceVerified setFactSourceId()   Sets the current record's "fact_source_id" value
 * @method FactSourceVerified setScore()          Sets the current record's "score" value
 * @method FactSourceVerified setCreatedBy()      Sets the current record's "created_by" value
 * @method FactSourceVerified setComment()        Sets the current record's "comment" value
 * @method FactSourceVerified setCreator()        Sets the current record's "Creator" value
 * @method FactSourceVerified setFactSource()     Sets the current record's "FactSource" value
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6716 2009-11-12 19:26:28Z jwage $
 */
abstract class BaseFactSourceVerified extends FoafRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('fact_source_verified');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '8',
             ));
        $this->hasColumn('fact_source_id', 'integer', 8, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '8',
             ));
        $this->hasColumn('score', 'integer', 2, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => '2',
             ));
        $this->hasColumn('created_by', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('comment', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as Creator', array(
             'local' => 'created_by',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('FactSource', array(
             'local' => 'fact_source_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}