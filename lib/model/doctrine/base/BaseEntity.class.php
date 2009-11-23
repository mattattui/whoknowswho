<?php

/**
 * BaseEntity
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $entity_type_id
 * @property integer $is_locked
 * @property integer $superceded_by_id
 * @property integer $authority_id
 * @property integer $created_by
 * @property string $name
 * @property string $subtitle
 * @property string $version_comment
 * @property string $description
 * @property string $photo_url
 * @property string $photo_caption
 * @property string $photo_licence
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $views
 * @property integer $interest
 * @property integer $connectedness
 * @property Entity $SupercededBy
 * @property sfGuardUser $Creator
 * @property Entity $Authority
 * @property EntityType $EntityType
 * @property Doctrine_Collection $Disambiguation
 * @property Doctrine_Collection $Urls
 * @property Doctrine_Collection $Facts
 * @property Doctrine_Collection $Mentions
 * @property Doctrine_Collection $Aliases
 * @property Doctrine_Collection $EntityCreationQueue
 * @property Doctrine_Collection $DisambiguationEntity
 * @property Doctrine_Collection $Entity
 * @property EntityActionRequired $ActionRequired
 * 
 * @method integer              getId()                   Returns the current record's "id" value
 * @method integer              getEntityTypeId()         Returns the current record's "entity_type_id" value
 * @method integer              getIsLocked()             Returns the current record's "is_locked" value
 * @method integer              getSupercededById()       Returns the current record's "superceded_by_id" value
 * @method integer              getAuthorityId()          Returns the current record's "authority_id" value
 * @method integer              getCreatedBy()            Returns the current record's "created_by" value
 * @method string               getName()                 Returns the current record's "name" value
 * @method string               getSubtitle()             Returns the current record's "subtitle" value
 * @method string               getVersionComment()       Returns the current record's "version_comment" value
 * @method string               getDescription()          Returns the current record's "description" value
 * @method string               getPhotoUrl()             Returns the current record's "photo_url" value
 * @method string               getPhotoCaption()         Returns the current record's "photo_caption" value
 * @method string               getPhotoLicence()         Returns the current record's "photo_licence" value
 * @method timestamp            getCreatedAt()            Returns the current record's "created_at" value
 * @method timestamp            getUpdatedAt()            Returns the current record's "updated_at" value
 * @method integer              getViews()                Returns the current record's "views" value
 * @method integer              getInterest()             Returns the current record's "interest" value
 * @method integer              getConnectedness()        Returns the current record's "connectedness" value
 * @method Entity               getSupercededBy()         Returns the current record's "SupercededBy" value
 * @method sfGuardUser          getCreator()              Returns the current record's "Creator" value
 * @method Entity               getAuthority()            Returns the current record's "Authority" value
 * @method EntityType           getEntityType()           Returns the current record's "EntityType" value
 * @method Doctrine_Collection  getDisambiguation()       Returns the current record's "Disambiguation" collection
 * @method Doctrine_Collection  getUrls()                 Returns the current record's "Urls" collection
 * @method Doctrine_Collection  getFacts()                Returns the current record's "Facts" collection
 * @method Doctrine_Collection  getMentions()             Returns the current record's "Mentions" collection
 * @method Doctrine_Collection  getAliases()              Returns the current record's "Aliases" collection
 * @method Doctrine_Collection  getEntityCreationQueue()  Returns the current record's "EntityCreationQueue" collection
 * @method Doctrine_Collection  getDisambiguationEntity() Returns the current record's "DisambiguationEntity" collection
 * @method Doctrine_Collection  getEntity()               Returns the current record's "Entity" collection
 * @method EntityActionRequired getActionRequired()       Returns the current record's "ActionRequired" value
 * @method Entity               setId()                   Sets the current record's "id" value
 * @method Entity               setEntityTypeId()         Sets the current record's "entity_type_id" value
 * @method Entity               setIsLocked()             Sets the current record's "is_locked" value
 * @method Entity               setSupercededById()       Sets the current record's "superceded_by_id" value
 * @method Entity               setAuthorityId()          Sets the current record's "authority_id" value
 * @method Entity               setCreatedBy()            Sets the current record's "created_by" value
 * @method Entity               setName()                 Sets the current record's "name" value
 * @method Entity               setSubtitle()             Sets the current record's "subtitle" value
 * @method Entity               setVersionComment()       Sets the current record's "version_comment" value
 * @method Entity               setDescription()          Sets the current record's "description" value
 * @method Entity               setPhotoUrl()             Sets the current record's "photo_url" value
 * @method Entity               setPhotoCaption()         Sets the current record's "photo_caption" value
 * @method Entity               setPhotoLicence()         Sets the current record's "photo_licence" value
 * @method Entity               setCreatedAt()            Sets the current record's "created_at" value
 * @method Entity               setUpdatedAt()            Sets the current record's "updated_at" value
 * @method Entity               setViews()                Sets the current record's "views" value
 * @method Entity               setInterest()             Sets the current record's "interest" value
 * @method Entity               setConnectedness()        Sets the current record's "connectedness" value
 * @method Entity               setSupercededBy()         Sets the current record's "SupercededBy" value
 * @method Entity               setCreator()              Sets the current record's "Creator" value
 * @method Entity               setAuthority()            Sets the current record's "Authority" value
 * @method Entity               setEntityType()           Sets the current record's "EntityType" value
 * @method Entity               setDisambiguation()       Sets the current record's "Disambiguation" collection
 * @method Entity               setUrls()                 Sets the current record's "Urls" collection
 * @method Entity               setFacts()                Sets the current record's "Facts" collection
 * @method Entity               setMentions()             Sets the current record's "Mentions" collection
 * @method Entity               setAliases()              Sets the current record's "Aliases" collection
 * @method Entity               setEntityCreationQueue()  Sets the current record's "EntityCreationQueue" collection
 * @method Entity               setDisambiguationEntity() Sets the current record's "DisambiguationEntity" collection
 * @method Entity               setEntity()               Sets the current record's "Entity" collection
 * @method Entity               setActionRequired()       Sets the current record's "ActionRequired" value
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6716 2009-11-12 19:26:28Z jwage $
 */
abstract class BaseEntity extends FoafRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('entity');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '8',
             ));
        $this->hasColumn('entity_type_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('is_locked', 'integer', 1, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => '1',
             ));
        $this->hasColumn('superceded_by_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => '8',
             ));
        $this->hasColumn('authority_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => '8',
             ));
        $this->hasColumn('created_by', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('subtitle', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('version_comment', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('description', 'string', 2147483647, array(
             'type' => 'string',
             'length' => '2147483647',
             ));
        $this->hasColumn('photo_url', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('photo_caption', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('photo_licence', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('created_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('updated_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('views', 'integer', 8, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             'length' => '8',
             ));
        $this->hasColumn('interest', 'integer', 2, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             'length' => '2',
             ));
        $this->hasColumn('connectedness', 'integer', 2, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             'length' => '2',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Entity as SupercededBy', array(
             'local' => 'superceded_by_id',
             'foreign' => 'id',
             'onDelete' => 'set null'));

        $this->hasOne('sfGuardUser as Creator', array(
             'local' => 'created_by',
             'foreign' => 'id',
             'onDelete' => 'set null'));

        $this->hasOne('Entity as Authority', array(
             'local' => 'authority_id',
             'foreign' => 'id',
             'onDelete' => 'set null'));

        $this->hasOne('EntityType', array(
             'local' => 'entity_type_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('Disambiguation', array(
             'refClass' => 'DisambiguationEntity',
             'local' => 'entity_id',
             'foreign' => 'disambiguation_id'));

        $this->hasMany('EntityUrl as Urls', array(
             'local' => 'id',
             'foreign' => 'entity_id'));

        $this->hasMany('Fact as Facts', array(
             'local' => 'id',
             'foreign' => 'entity_id'));

        $this->hasMany('Fact as Mentions', array(
             'local' => 'id',
             'foreign' => 'related_entity_id'));

        $this->hasMany('EntityAlias as Aliases', array(
             'local' => 'id',
             'foreign' => 'entity_id'));

        $this->hasMany('EntityCreationQueue', array(
             'local' => 'id',
             'foreign' => 'entity_id'));

        $this->hasMany('DisambiguationEntity', array(
             'local' => 'id',
             'foreign' => 'entity_id'));

        $this->hasMany('Entity', array(
             'local' => 'id',
             'foreign' => 'superceded_by_id'));

        $this->hasOne('EntityActionRequired as ActionRequired', array(
             'local' => 'id',
             'foreign' => 'entity_id'));

        $searchable0 = new Doctrine_Template_Searchable(array(
             'fields' => 
             array(
              0 => 'name',
              1 => 'subtitle',
             ),
             'batchUpdates' => true,
             ));
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'name',
             ),
             'canUpdate' => true,
             'uniqueIndex' => true,
             'indexName' => 'slug',
             'builder' => 
             array(
              0 => 'tuiWikiUrl',
              1 => 'urlize',
             ),
             ));
        $versionable0 = new Doctrine_Template_Versionable(array(
             'builderOptions' => 
             array(
              'baseClassName' => 'FoafRecord',
             ),
             ));
        $this->actAs($searchable0);
        $this->actAs($sluggable0);
        $this->actAs($versionable0);
    }
}