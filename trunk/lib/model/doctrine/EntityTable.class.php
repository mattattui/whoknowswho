<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EntityTable extends Doctrine_Table
{


  public function getFactQuery($id)
  {
    return Doctrine_Query::create()
          ->select('f.*, ft.*, s.*, st.*, e.*, re.*, et.*, ret.*')
          ->from('Fact f, f.FactType ft, f.Sources s, s.SourceType st, f.Entity e, f.RelatedEntity re, e.EntityType et, re.EntityType ret')
          ->where('f.id IN (SELECT f3.id FROM Fact f3 WHERE f3.entity_id = ? AND f3.related_entity_id IS NOT NULL) OR f.id IN (SELECT f2.id FROM Fact f2 WHERE f2.related_entity_id = ? AND f2.entity_id IS NOT NULL)', array($id,$id));
  }


  static public function retrieveForSelect($q, $limit) 
  {
    $query = Doctrine::getTable('Entity')->createQuery('e')
              ->where('e.name like ?', "%$q%")
              ->orderBy('e.name asc')
              ->limit(25);
    
    $entities = array();
    foreach( $query->fetchArray() as $entity)
    {
      $entities[ $entity['id'] ] = $entity['name'];
    }
    return $entities;
  }



  public static function retrieveAdminList(Doctrine_Query $q) {
    $q->addFrom('r.EntityType et')->addSelect('r.*, et.*');

    return $q;
  }


  public function retrieveCached($id, $hydrate = null) 
  {
    
    return Doctrine_Query::create()
            ->select('e.*, et.*')
            ->from('Entity e, e.EntityType et')
            ->where(is_numeric($id) ? 'e.id = ?' : 'e.slug = ?')
            ->fetchOne($id, $hydrate);
  }


  public function retrieveMostViewed($limit)
  {
    $out = array();
    $q =  Doctrine_Query::create()
            ->select('e.*, et.*')
            ->from('Entity e, e.EntityType et')
            ->orderBy('e.views DESC')
            ->limit($limit)
            ->execute();

    foreach($q as $e)
    {
      $out[] = array('entity' => $e, 'connections' => $e->countConnections());
    }
    
    return $out;
  }


  public function getAllConnectionsQuery($id)
  {

    return Doctrine_Query::create()
          ->select('e.*, et.*')
          ->from('Entity e, e.EntityType et')
          ->where('e.id IN (SELECT f.related_entity_id FROM Fact f WHERE f.entity_id = ? AND f.related_entity_id IS NOT NULL) OR e.id IN (SELECT f2.entity_id FROM Fact f2 WHERE f2.related_entity_id = ? AND f2.entity_id IS NOT NULL)', array($id, $id));
          
  }

}