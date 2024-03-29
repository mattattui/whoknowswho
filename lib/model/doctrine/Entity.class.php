<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Entity extends BaseEntity
{
  protected $connection_count = null;
  
  public function __toString() {
    return (string)$this->getName();
  }


  public function preSave($event)
  {
    
    // FIXME: Versionable and Timestampable don't play well together
    // KLUDGE: Because save() always creates a new object, created-at is always current (or worse, null)
    $this->_set('updated_at', date('Y-m-d H:i:s'));
    
    
    if ($this->get('id')) {
      $q = Doctrine_Query::create()
            ->select('ev.created_at')
            ->from('EntityVersion ev')
            ->where('ev.id = ?', $this->getId())
            ->orderBy('ev.version ASC')
            ->limit(1)
            ->execute(null,Doctrine::HYDRATE_NONE);
      
      if (isset($q[0]) && isset($q[0][2])) {
        $this->_set('created_at', $q[0][2]);
      } else {
        $this->_set('created_at', date('Y-m-d H:i:s'));
      }
      
    } else {
      $this->_set('created_at', date('Y-m-d H:i:s'));
    }
    
    return parent::preSave($event);
  }


  public function getUrl()
  {
    return sfContext::getInstance()->getController()->genUrl('@entity_view?entity_type='.$this->getEntityType()->getUrlSlug().'&id='.$this->getSlug());
  }

  public function getMapUrl($format = 'html')
  {
    return sfContext::getInstance()->getController()->genUrl('@entity_map?entity_type='.$this->getEntityType()->getUrlSlug().'&id='.$this->getSlug().'&format='.$format);
  }

  public function getStoriesUrl()
  {
    return sfContext::getInstance()->getController()->genUrl('@entity_story_list?entity_type='.$this->getEntityType()->getUrlSlug().'&id='.$this->getSlug());
  }

  public function getConnectionsUrl()
  {
    return sfContext::getInstance()->getController()->genUrl('@entity_connections?entity_type='.$this->getEntityType()->getUrlSlug().'&id='.$this->getSlug());
  }


  public function countConnections($type = 'total') // total, personal, other
  {
    if (null == $this->connection_count)
    {
      $c = Doctrine_Query::create()
            ->select('e.entity_type_id, COUNT(e.entity_type_id) as num, et.url_slug')
            ->from('Entity e, e.EntityType et')
            ->where('e.id IN (SELECT f.related_entity_id FROM Fact f WHERE f.entity_id = ? AND f.related_entity_id IS NOT NULL)', $this->getId())
            ->orWhere('e.id IN (SELECT f2.entity_id FROM Fact f2 WHERE f2.related_entity_id = ? AND f2.entity_id IS NOT NULL)', $this->getId())
            ->groupBy('et.url_slug')
            ->execute(null, Doctrine::HYDRATE_ARRAY);

      $this->connection_count = array('personal' => '0', 'other' => '0', 'total' => '0');
            
      foreach($c as $stat)
      {
        if ('people' == $stat['EntityType']['url_slug'])
        {
          $this->connection_count['personal'] = $stat['num'];
        }
        else
        {
          $this->connection_count['other'] += $stat['num'];
        }
      }
      $this->connection_count['total'] = $this->connection_count['personal'] + $this->connection_count['other'];
    }
    
    return $this->connection_count[$type];
    
  }
  
  public function getConnections($type, $limit = 4, $hydrate = Doctrine::HYDRATE_ARRAY)
  {

    return Doctrine_Query::create()
          ->select('e.*, et.*')
          ->from('Entity e, e.EntityType et')
          ->where('e.id IN (SELECT f.related_entity_id FROM Fact f WHERE f.entity_id = ? AND f.related_entity_id IS NOT NULL) OR e.id IN (SELECT f2.entity_id FROM Fact f2 WHERE f2.related_entity_id = ? AND f2.entity_id IS NOT NULL)', array($this->getId(),$this->getId()))
          ->andWhere($type == 'personal' ? 'et.url_slug = ?' : 'et.url_slug != ?', 'people')
          ->limit($limit)
          ->execute(null, $hydrate);
  }


  // Return all facts relating this Entity to another
  public function getConnectionsTo($entity, $hydrate = Doctrine::HYDRATE_ARRAY)
  {
    if (!is_numeric($entity))
    {
      $entity = $entity->getId();
    }

    return Doctrine_Query::create()
          ->select('f.*, ft.*, s.*, st.*, e.*, re.*, et.*, ret.*')
          ->from('Fact f, f.FactType ft, f.Sources s, s.SourceType st, f.Entity e, f.RelatedEntity re, e.EntityType et, re.EntityType ret')
          ->where('f.entity_id = ? AND f.related_entity_id = ?', array($this->getId(), $entity))
          ->orWhere('f.related_entity_id = ? AND f.entity_id = ?', array($this->getId(), $entity))
          ->execute(null, $hydrate);
  }


  // Return all entities related by Fact to the current Entity
  public function getAllConnections($hydrate = Doctrine::HYDRATE_ARRAY)
  {

    return Doctrine::getTable('Entity')->getAllConnectionsQuery($this->getId())->orderBy('e.connectedness DESC')->execute(null, $hydrate);
  }  


  
  // Return all Facts that relate this Entity to another 
  // FIXME: this is wrong - too similar to getAllConnections, and the method name doesn't make it clear it doesn't get all Facts
  
  public function getFacts($hydrate = Doctrine::HYDRATE_ARRAY)
  {

    $q = $this->getTable()->getFactQuery($this->getId());

    return $q->execute(null);
  }
  
  public function getInterestingFacts($limit = 10, $offset = null, $hydrate = Doctrine::HYDRATE_ARRAY)
  {
    $q = $this->getTable()->getFactQuery($this->getId());
    $q->andWhereNotIn('ft.type', array('Education', 'Employment'));

    if ($limit) {
      $q->limit($limit);
    }

    if ($offset)
    {
      $q->offset($offset);
    }

    return $q->execute();
  }
  
  public function getEducationFacts()
  {
    $q = $this->getTable()->getFactQuery($this->getId());
    
    return $q->andWhere('ft.type = ?','Education')
             ->execute(null);
  }

  public function getEmploymentFacts()
  {
    $q = $this->getTable()->getFactQuery($this->getId());

    return $q->andWhere('ft.type = ?','Employment')
             ->orderBy('f.start DESC, f.end DESC')
             ->execute(null);
  }
  
  public function getLinks()
  {

    return Doctrine_Query::create()
          ->select('eu.*')
          ->from('EntityUrl eu')
          ->where('eu.entity_id = ?', $this->getId())
          ->limit(5)
          ->execute(null);
  }  
  
  
  public function getPhotoURLLarge()
  {
    $out = $this->getPhotoUrl();
    if ($out) {
      $out = preg_replace('/_mid\.(png|gif|jpg)$/', "_large.$1", $out);
      $out = str_replace('/mid/', '/large/', $out);
      return $out;
    } else {
      return foaf_image('/static/images/avatar/large/noinfo_large.png');
    }
  }
  
  public function getPhotoURLMedium()
  {
    return ($out = $this->getPhotoUrl()) ? $out : foaf_image('/static/images/avatar/mid/noinfo_mid.png');
  }
  
  public function getPhotoURLSmall()
  {

    $out = $this->getPhotoUrl();
    if ($out) {
      $out = preg_replace('/_mid\.(png|gif|jpg)$/', "_small.$1", $out);
      $out = str_replace('/mid/', '/small/', $out);
      return $out;
    } else {
      return foaf_image('/static/images/site/placeholder_small.png');
    }
  }
  
  
}