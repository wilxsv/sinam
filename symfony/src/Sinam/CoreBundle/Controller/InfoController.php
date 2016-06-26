<?php

namespace Sinam\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sinam\CoreBundle\Form\BusquedaEstablecimientoType;

use Sinam\CoreBundle\Form\FarmCatalogoproductosType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityRepository;

class InfoController extends Controller
{
    public function indexAction(Request $request)
    {	
    	$em = $this->getDoctrine()->getManager();
    	$actualizado = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByEstablecimientos( 'ASC', TRUE );
    	$registrado = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByEstablecimientos( 'ASC', FALSE);
            
        return $this->render('SinamCoreBundle:Info:establecimientos.html.twig', array( 'actualizado' => $actualizado, 'registrado' => $registrado ));
    }

    public function establecimientoAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$actualizado = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByEstablecimientos( 'ASC', TRUE );
    	$registrado = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByEstablecimientos( 'ASC', FALSE);
            
        return $this->render('SinamCoreBundle:Info:establecimientos.html.twig', array( 'active' => $actualizado, 'noactive' => $registrado ));
    }

    public function contactoAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$actualizado = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByEstablecimientos( 'ASC', TRUE );
    	$registrado = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByEstablecimientos( 'ASC', FALSE);
            
        return $this->render('SinamCoreBundle:Info:establecimientos.html.twig', array( 'actualizado' => $actualizado, 'registrado' => $registrado ));
    }

    public function ayudaAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$actualizado = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByEstablecimientos( 'ASC', TRUE );
    	$registrado = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByEstablecimientos( 'ASC', FALSE);
            
        return $this->render('SinamCoreBundle:Info:establecimientos.html.twig', array( 'actualizado' => $actualizado, 'registrado' => $registrado ));
    }
}
