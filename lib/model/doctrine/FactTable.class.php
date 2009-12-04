<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class FactTable extends Doctrine_Table
{

  public static function retrieveAdminList(Doctrine_Query $q)
  {
    return $q->addFrom('r.Entity e, r.RelatedEntity re')->addSelect('r.*, e.*, re.*');
    
  }


  public function retrieveConnectionsByEntities($ids, $hydrate = Doctrine::HYDRATE_ARRAY)
  {
    return Doctrine_Query::create()
          ->select('f.*, ft.*, s.*, st.*, e.*, re.*, et.*, ret.*')
          ->from('Fact f, f.FactType ft, f.Sources s, s.SourceType st, f.Entity e, f.RelatedEntity re, e.EntityType et, re.EntityType ret')
          ->whereIn('f.entity_id', $ids)
          ->andWhereIn('f.related_entity_id', $ids)
          ->execute(null, $hydrate);
  }


}