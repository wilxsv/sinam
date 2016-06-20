<?php

namespace Sinam\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Sinam\CoreBundle\Entity\FarmCatalogoproductos;
use Sinam\CoreBundle\Entity\CtlMunicipio;

/**
 * SinamRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SinamRepository extends EntityRepository
{/*
	function findByNombreMedicamento( $nombre ){
		$repository = $this->getDoctrine()->getRepository('SinamCoreBundle:FarmMedicinaexistenciaxarea');
		$query = $repository->createQueryBuilder('e')
			->select('e')
			->addSelect('s.direccion, s.nombre AS nombree')
			->innerJoin('e.idmedicina', 'm')
			->innerJoin('e.idestablecimiento', 's')
			->where("m.id = ".$nombre." AND e.existencia > 0 ")
			->addSelect('m.nombre, m.formafarmaceutica, m.presentacion, e.existencia')
			->getQuery()->getResult();	
    	return $query;
    }
*/
  public function findByNombreMedicamento( $id ){
   $query = $this->getEntityManager()
            ->createQuery('SELECT e, m.nombre AS medicamento  FROM SinamCoreBundle:FarmMedicinaexistenciaxarea e JOIN e.idmedicina m 
            	WHERE e.existencia > 0 AND e.idmodalidad < 3 AND m.id = :medicamento
            	ORDER BY e.id ASC')
            ->setParameters(array('medicamento' => $id));
   try {
        return $query->getResult();
       } catch (\Doctrine\Orm\NoResultException $e) {
        $query = null;
       }             
  }

  public function findByIdMedicamentoSINAB( $id, $depto, $munic, $estab ){
   $depto = ($depto > 0) ? " AND d.id = $depto " : '';
   $munic = ($munic > 0) ? " AND mu.id = $munic " : '';
   $estab = ($estab > 0) ? " AND ee.id = $estab " : '';
   $query = $this->getEntityManager()
            ->createQuery('SELECT sm.formafarmaceutica , sm.nombre AS nombre, sm.presentacion AS presentacion, ea.cantidaddisponible, e.nombre AS establecimiento, mu.nombre AS municipio, d.nombre AS depto, a.nombre AS almacen, u.descripcion AS unidad
              FROM SinamCoreBundle:FarmCatalogoproductos m, SinamCoreBundle:SabCatCatalogoproductos AS sm, SinamCoreBundle:SabAlmExistenciasalmacenes AS ea, SinamCoreBundle:SabCatAlmacenes AS a, SinamCoreBundle:SabCatAlmacenesestablecimientos AS ae, SinamCoreBundle:SabCatEstablecimientos e, SinamCoreBundle:CtlMunicipio AS mu, SinamCoreBundle:CtlDepartamento AS d, SinamCoreBundle:SabCatUnidadmedidas AS u
              WHERE m.id = :medicamento AND m.codigo = sm.codigo AND sm.idpro = ea.idProducto AND ea.idAlmacen = a.id AND a.id = ae.idAlmacen AND ae.idEstablecimiento = e.id AND e.idMunicipio = mu.id AND mu.idDepartamento = d.id AND sm.idUnidadmedida = u.id '.$depto.$munic.$estab.'
              ORDER BY m.nombre ASC')
            ->setParameters(array('medicamento' => $id));
   try {
        return $query->getResult();
       } catch (\Doctrine\Orm\NoResultException $e) {
        $query = null;
       }             
  } 

  public function findByIdMedicamentoAlternativoAll( $id, $depto, $munic, $estab ){
   $depto = ($depto > 0) ? " AND d.id = $depto " : '';
   $munic = ($munic > 0) ? " AND mu.id = $munic " : '';
   $estab = ($estab > 0) ? " AND e.id = $estab " : '';
   $query = $this->getEntityManager()
            ->createQuery('SELECT sm.formafarmaceutica , sm.nombre AS nombre, sm.presentacion AS presentacion, ea.cantidaddisponible, e.nombre AS establecimiento, mu.nombre AS municipio, d.nombre AS depto, a.nombre AS almacen, u.descripcion AS unidad
            	FROM SinamCoreBundle:FarmCatalogoproductos m, SinamCoreBundle:SabCatCatalogoproductos AS sm, SinamCoreBundle:SabAlmExistenciasalmacenes AS ea, SinamCoreBundle:SabCatAlmacenes AS a, SinamCoreBundle:SabCatAlmacenesestablecimientos AS ae, SinamCoreBundle:SabCatEstablecimientos e, SinamCoreBundle:CtlMunicipio AS mu, SinamCoreBundle:CtlDepartamento AS d, SinamCoreBundle:SabCatUnidadmedidas AS u
            	WHERE m.id = :medicamento AND m.codigo = sm.codigo AND sm.idpro = ea.idProducto AND ea.idAlmacen = a.id AND a.id = ae.idAlmacen AND ae.idEstablecimiento = e.id AND e.idMunicipio = mu.id AND mu.idDepartamento = d.id AND sm.idUnidadmedida = u.id '.$depto.$munic.$estab.'
            	ORDER BY m.nombre ASC')
            ->setParameters(array('medicamento' => $id));
   try {
        return $query->getResult();
       } catch (\Doctrine\Orm\NoResultException $e) {
        $query = null;
       }             
  } 

  public function findByIdMedicamentoSINABSIAP( $id, $depto, $munic, $estab, $max ){
   $id = ($id) ? " '$id' " : '';
   $depto = ($depto > 0) ? " AND d.id = $depto " : '';
   $munic = ($munic > 0) ? " AND mu.id = $munic " : '';
   $estab = ($estab > 0) ? " AND ee.id = $estab " : '';
   $max = ($max > 0) ? $max : 7;
   $query = $this->getEntityManager()
            ->createQuery('SELECT sm.nombre AS nombre, m.formafarmaceutica AS descripcion, m.presentacion AS presentacion, ea.cantidaddisponible, ep.id AS id, e.nombre AS establecimiento, mu.nombre AS municipio, d.nombre AS depto, a.nombre AS almacen, u.descripcion AS unidad, ep.latitud AS latitud, ep.longitud AS longitud
              FROM SinamCoreBundle:FarmCatalogoproductos m, SinamCoreBundle:SabCatCatalogoproductos AS sm, SinamCoreBundle:SabAlmExistenciasalmacenes AS ea, SinamCoreBundle:SabCatAlmacenes AS a, SinamCoreBundle:SabCatAlmacenesestablecimientos AS ae, SinamCoreBundle:SabCatEstablecimientos e, SinamCoreBundle:CtlMunicipio AS mu, SinamCoreBundle:CtlDepartamento AS d, SinamCoreBundle:SabCatUnidadmedidas AS u, SinamCoreBundle:CtlEstablecimiento AS ep
              WHERE sm.nombre = '.$id.' AND m.codigo = sm.codigo AND sm.idpro = ea.idProducto AND ea.idAlmacen = a.id AND a.id = ae.idAlmacen AND ae.idEstablecimiento = e.id AND e.idmaestro = ep.id AND ep.idMunicipio = mu.id AND mu.idDepartamento = d.id AND sm.idUnidadmedida = u.id AND ea.cantidaddisponible > 0 '.$depto.$munic.$estab.'
              ORDER BY m.nombre ASC')->setMaxResults($max);
   try {
        return $query->getResult();
       } catch (\Doctrine\Orm\NoResultException $e) {
        $query = null;
       }             
  } 


  public function findByIdMedicamentoAlternativo( ){
   $query = $this->getEntityManager()
            ->createQuery('SELECT m.nombre AS nombre, ma.nombre AS alternativa
            	FROM SinamCoreBundle:SabCatAlternativasproducto AS a, SinamCoreBundle:SabCatCatalogoproductos AS m, SinamCoreBundle:SabCatCatalogoproductos AS ma
            	WHERE a.id = m.idpro AND a.idProducto = ma.idpro
            	ORDER BY m.nombre ASC');
   try {
        return $query->getResult();
       } catch (\Doctrine\Orm\NoResultException $e) {
        $query = null;
       }             
  }

  public function findByIdMedicamentoSIAP( $id, $depto, $munic, $estab ){
   $id = ($id) ? " '$id' " : '';
   $depto = ($depto > 0) ? " AND d.id = $depto " : '';
   $munic = ($munic > 0) ? " AND mu.id = $munic " : '';
   $estab = ($estab > 0) ? " AND e.id = $estab " : '';
   $query = $this->getEntityManager()
        ->createQuery('SELECT f.farmacia AS farmacia, u.descripcion AS unidad, SUM(ex.existencia) AS existencia, e.id AS id
          FROM SinamCoreBundle:SabCatCatalogoproductos AS ms, SinamCoreBundle:FarmCatalogoproductos AS m, SinamCoreBundle:FarmMedicinaexistenciaxarea AS ex, SinamCoreBundle:MntAreafarmacia AS af, SinamCoreBundle:MntFarmacia AS f, SinamCoreBundle:CtlEstablecimiento AS e, SinamCoreBundle:CtlMunicipio AS mu, SinamCoreBundle:CtlDepartamento AS d, SinamCoreBundle:SabCatUnidadmedidas AS u 
          WHERE ms.nombre  = '.$id.' AND ms.codigo = m.codigo AND m.id = ex.idmedicina AND ex.idarea = af.id AND ex.idestablecimiento = e.id AND af.idfarmacia = f.id AND ms.idUnidadmedida = u.id AND e.idMunicipio = mu.id AND mu.idDepartamento = d.id AND ex.existencia > 0  '.$depto.$munic.$estab.'
          GROUP BY ms.nombre, f.farmacia, u.descripcion, e.id
          ORDER BY f.farmacia ASC');
   try {
        return $query->getResult();
       } catch (\Doctrine\Orm\NoResultException $e) {
        $query = null;
       }             
  } 
  public function findBySELECT( ){
   $query = $this->getEntityManager()
        ->createQuery('SELECT m.idpro AS id, m.nombre AS nombre
          FROM SinamCoreBundle:SabCatCatalogoproductos AS m
          ORDER BY m.nombre ASC');
   try {
        return $query->getResult();
       } catch (\Doctrine\Orm\NoResultException $e) {
        $query = null;
       }             
  } 

}
