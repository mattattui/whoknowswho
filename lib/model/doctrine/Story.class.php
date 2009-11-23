<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Story extends BaseStory
{
  protected $story_facts = null;
  
  public function __toString() {
    return (string) $this->get('title');
  }
  
    
  public function preSave($event)
  {
    
    // Clean content
    $this->applyFilters();
    
    
    
    // FIXME: Versionable and Timestampable don't play well together
    // KLUDGE: Because save() always creates a new object, created-at is always current (or worse, null)
    $this->_set('updated_at', date('Y-m-d H:i:s'));
    
    
    if ($this->get('id')) {
      $q = Doctrine_Query::create()
            ->select('sv.created_at')
            ->from('StoryVersion sv')
            ->where('sv.id = ?', $this->getId())
            ->orderBy('sv.version ASC')
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
  
  

  public function applyFilters()
  {
    $this->set('title', strip_tags($this->get('title')));
    $this->set('subtitle', strip_tags($this->get('subtitle')));
    $this->set('teaser', strip_tags($this->get('teaser')));
    $this->set('description', tuiHTMLFilter::clean($this->get('description')));
    $this->set('version_comment', strip_tags($this->get('version_comment')));
  }



  public function getUrl()
  {
    return sfContext::getInstance()->getController()->genUrl('@story_view?id='.$this->getSlug());
  }  


  public function getEntityContextUrl($entity)
  {
    return sfContext::getInstance()->getController()->genUrl('@entity_story_view?entity_type='.$entity['EntityType']['url_slug'].'&entity_id='.$entity['slug'].'&id='.$this->getSlug());
  }  
}