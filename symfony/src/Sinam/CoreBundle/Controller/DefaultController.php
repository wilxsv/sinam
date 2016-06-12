<?php

namespace Sinam\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sinam\CoreBundle\Form\BusquedaBasicaType;
use Sinam\CoreBundle\Form\BusquedaEstablecimientoType;

use Sinam\CoreBundle\Entity\FarmCatalogoproductos;
use Sinam\CoreBundle\Entity\CtlMunicipio;
use Sinam\CoreBundle\Form\FarmCatalogoproductosType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityRepository;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {	
        return $this->render('SinamCoreBundle:Default:index.html.twig');
    }
    
    public function searchAction(Request $request)
    {
		$form = $form = $this->createForm('Sinam\CoreBundle\Form\BusquedaBasicaType');
		$form->handleRequest($request);
		if ($form->isValid()) {
        }

        $em = $this->getDoctrine()->getManager();
        $farmCatalogoproductos = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findBySELECT( );
        $depto = $em->getRepository('SinamCoreBundle:CtlDepartamento')->findByidPais( 68 );
        $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlMunicipio');
        $ctlMunicipios = $repository->createQueryBuilder('p')->select('p.id, p.nombre')->addSelect('d.id AS depto')
        	->innerJoin('p.idDepartamento', 'd')->where('p.idDepartamento = d.id')->getQuery()->getResult();
        $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlEstablecimiento');
        $CtlEstablecimiento = $repository->createQueryBuilder('e')->select('e.id, e.nombre')->addSelect('m.id AS idMunicipio')
        	->innerJoin('e.idMunicipio', 'm')->where('e.idMunicipio = m.id')->getQuery()->getResult();

        
		return $this->render('SinamCoreBundle:Default:search.html.twig', array( 'form' => $form->createView(), 'todos' => $farmCatalogoproductos, 'depto' => $depto, 'muni' => $ctlMunicipios, 'establecimiento' => $CtlEstablecimiento ));
    }

    public function alternativoAction(Request $request)
    {
		$form = $form = $this->createForm('Sinam\CoreBundle\Form\BusquedaBasicaType');
		$form->handleRequest($request);
		if ($form->isValid()) {
        }

        $em = $this->getDoctrine()->getManager();
        $farmCatalogoproductos = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findAll();
        $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlMunicipio');
        $ctlMunicipios = $repository->createQueryBuilder('p')->select('p.id, p.nombre')->addSelect('d.id AS depto')
        	->innerJoin('p.idDepartamento', 'd')->where('p.idDepartamento = d.id')->getQuery()->getResult();
        $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlEstablecimiento');
        $CtlEstablecimiento = $repository->createQueryBuilder('e')->select('e.id, e.nombre')->addSelect('m.id AS idMunicipio')
        	->innerJoin('e.idMunicipio', 'm')->where('e.idMunicipio = m.id')->getQuery()->getResult();

        
		return $this->render('SinamCoreBundle:Consulta:alternativo.html.twig', array( 'form' => $form->createView(), 'todos' => $farmCatalogoproductos, 'muni' => $ctlMunicipios, 'establecimiento' => $CtlEstablecimiento ));
    }
    
        public function ajaxAction(Request $request) {
        if (! $request->isXmlHttpRequest()) {
            throw new NotFoundHttpException();
        }
        $em = $this->getDoctrine()->getEntityManager();
        if ($request->query->get('tipo') == 0 && $request->query->get('nombre') != NULL){
        
        	$result = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoSINABSIAP( $request->query->get('nombre'), 0, 0, 0 );
            $siap = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoSIAP( $request->query->get('nombre'), 0, 0, 0 );
            $alt = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoAlternativo( ) ;
        	return $this->render('SinamCoreBundle:Consulta:resultado.html.twig', array( 'rest'=> $result, 'alt'=> $alt, 'siap' => $siap ));
		
        } elseif ($request->query->get('tipo') == 1 && $request->query->get('nombre') != NULL){
        
        	$result = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoSINABSIAP( $request->query->get('nombre'), $request->query->get('depto'), $request->query->get('munic'), $request->query->get('estab') );
            $siap = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoSIAP( $request->query->get('nombre'), $request->query->get('depto'), $request->query->get('munic'), $request->query->get('estab') );
            $alt = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoAlternativo( ) ;
			return $this->render('SinamCoreBundle:Consulta:resultado.html.twig', array( 'rest'=> $result, 'alt'=> $alt, 'siap' => true ));
		
        } else {
            $alt = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoAlternativo( ) ;
			return $this->render('SinamCoreBundle:Consulta:resultado.html.twig', array( 'rest'=> FALSE, 'alt'=> $alt ));
		}
        ///////////////////////////////////////
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
