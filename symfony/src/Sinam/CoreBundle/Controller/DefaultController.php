<?php

namespace Sinam\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sinam\CoreBundle\Form\BusquedaBasicaType;
use Sinam\CoreBundle\Form\BusquedaEstablecimientoType;

use Sinam\CoreBundle\Entity\FarmCatalogoproductos;
use Sinam\CoreBundle\Form\FarmCatalogoproductosType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityRepository;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
		$form = $this->createForm('Sinam\CoreBundle\Form\BusquedaBasicaType');
		$rest = false;
		$form->handleRequest($request);
		if ($form->isValid()) {
			$repository = $this->getDoctrine()->getRepository('SinamCoreBundle:FarmCatalogoproductos');
			$query = $repository->createQueryBuilder('p')->where("p.nombre LIKE :nombre")->setParameter('nombre', "%".$form->get('nombre')->getData()."%")->getQuery();
			$rest = $query->getResult();
        }
		
        return $this->render('SinamCoreBundle:Default:index.html.twig', array( 'form' => $form->createView(), 'rest'=>$rest ));
    }
    
    public function searchAction(Request $request)
    {
		$options = new FarmCatalogoproductos();
		//$form = $this->createForm('Sinam\CoreBundle\Form\BusquedaBasicaType');
		$form = $this->createForm(new BusquedaEstablecimientoType($this->getDoctrine()->getManager()), $options);
		$form2 = $this->createForm('Sinam\CoreBundle\Form\BusquedaBasicaType');
		$form3 = $this->createForm('Sinam\CoreBundle\Form\BusquedaHistorialType');
		$rest = false;
		$form->handleRequest($request);
		if ($form->isValid()) {
			$repository = $this->getDoctrine()->getRepository('SinamCoreBundle:FarmCatalogoproductos');
			$query = $repository->createQueryBuilder('p')->where("p.nombre LIKE :nombre")->setParameter('nombre', "%".$form->get('nombre')->getData()."%")->getQuery();
			$rest = $query->getResult();
        }
 		$repository = $this->getDoctrine()->getRepository('SinamCoreBundle:FarmCatalogoproductos');
    	$query = $repository->createQueryBuilder('p')
    	->where("p.presentacion != ''")
		->groupBy('p.presentacion, p.id')
		->orderBy('p.presentacion', 'ASC')->getQuery();
		$rest = $query->getResult();
        
		return $this->render('SinamCoreBundle:Default:search.html.twig', array( 'form' => $form->createView(), 'form2' => $form2->createView(), 'form3' => $form3->createView(), 'rest'=>$rest, 'select' => $query->getResult() ));
    }
    
        public function ajaxAction(Request $request) {
        if (! $request->isXmlHttpRequest()) {
            throw new NotFoundHttpException();
        }
        if ($request->query->get('depto_id') != null){
			$id = $request->query->get('depto_id');
            $result = array();
            $repo = $this->getDoctrine()->getManager()->getRepository('SinamCoreBundle:CtlMunicipio');
            $cities = $repo->findByIdDepartamento($id, array('nombre' => 'asc'));
            foreach ($cities as $city) {
                $result[$city->getNombre()] = $city->getId();
            }
		} elseif ($request->query->get('munic_id') != null){
			$id = $request->query->get('munic_id');
            $result = array();
            $repo = $this->getDoctrine()->getManager()->getRepository('SinamCoreBundle:CtlEstablecimiento');
            $cities = $repo->findByIdMunicipio($id, array('nombre' => 'asc'));
            foreach ($cities as $city) {
                $result[$city->getNombre()] = $city->getId();
            }
		}
		if ($request->query->get('establecimiento') != null && $request->query->get('nombre') != null){
            $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:FarmMedicinaexistenciaxarea');
			$query = $repository->createQueryBuilder('e')
				->select('e')
				->addSelect('s.direccion, s.nombre AS nombree')
				->innerJoin('e.idmedicina', 'm')
				->innerJoin('e.idestablecimiento', 's')
				->where("m.nombre LIKE '%".$request->query->get('nombre')."%' AND s.id =".$request->query->get('establecimiento')." AND e.existencia > 0 ")
				->addSelect('m.nombre, m.formafarmaceutica, m.presentacion, e.existencia')
				->getQuery();			
            return $this->render('SinamCoreBundle:Default:resultado.html.twig', array( 'rest'=>$query->getResult() ));
		}elseif($request->query->get('nombre') != null && $request->query->get('lat') != null && $request->query->get('lon') != null){
            $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:FarmMedicinaexistenciaxarea');
			$query = $repository->createQueryBuilder('e')
				->select('e')
				->addSelect('s.direccion, s.nombre AS nombree')
				->innerJoin('e.idmedicina', 'm')
				->innerJoin('e.idestablecimiento', 's')
				->where("m.nombre LIKE '%".$request->query->get('nombre')."%' AND e.existencia > 0 ")
				->addSelect('m.nombre, m.formafarmaceutica, m.presentacion, e.existencia')
				->getQuery();			
            return $this->render('SinamCoreBundle:Default:resultado.html.twig', array( 'rest'=>$query->getResult() ));
		}else{
			return new JsonResponse($result);
		}
    }
}
