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

class PorEstablecimientoController extends Controller
{
    public function indexAction(Request $request)
    {
		$options = new FarmCatalogoproductos();
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

		$repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlEstablecimiento');
		$query = $repository->createQueryBuilder('e')->where("e.latitud <> 0 AND e.longitud <> 0 AND e.idTipoEstablecimiento = 4")->getQuery();
		$estab = $query->getResult();

        
		return $this->render('SinamCoreBundle:Consulta:alternativo.html.twig', array( 'form' => $form->createView(), 'form2' => $form2->createView(), 'form3' => $form3->createView(), 'rest'=>$rest, 'select' => $query->getResult(), 'estab' => $estab ));
    }
}
