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
        $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:SabCatCatalogoproductos');
        $productos = $repository->createQueryBuilder('p')->select('p.idpro, p.nombre')->orderBy('p.visto', 'DESC')->setMaxResults(7)->getQuery()->getResult();

        return $this->render('SinamCoreBundle:Default:index.html.twig', array( 'productos' => $productos) );
    }

    public function mostrarAction(Request $request)
    {
        $item = $request->query->get('q');
        $em = $this->getDoctrine()->getEntityManager();

        $result = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoSINABSIAP( $item, 0, 0, 0, 7 );
        $siap = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoSIAP( $item, 0, 0, 0 );
        $alt = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoAlternativo( ) ;        
        $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:SabCatCatalogoproductos');
        $productos = $repository->createQueryBuilder('p')->select('p.idpro, p.nombre')->orderBy('p.visto', 'DESC')->setMaxResults(7)->getQuery()->getResult();


        return $this->render('SinamCoreBundle:Info:mostrar.html.twig', array( 'rest'=> $result, 'alt'=> $alt, 'siap' => $siap, 'productos' => $productos ));
    }
}
