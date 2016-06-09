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
		$form = $form = $this->createForm('Sinam\CoreBundle\Form\BusquedaEstablecimientoType');

        $em = $this->getDoctrine()->getManager();
        $farmCatalogoproductos = $em->getRepository('SinamCoreBundle:SabCatCatalogoproductos')->findAll();
        $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlMunicipio');
        $ctlMunicipios = $repository->createQueryBuilder('p')->select('p.id, p.nombre')->addSelect('d.id AS depto')
        	->innerJoin('p.idDepartamento', 'd')->where('p.idDepartamento = d.id')->getQuery()->getResult();
        $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlEstablecimiento');
        $CtlEstablecimiento = $repository->createQueryBuilder('e')->select('e.id, e.nombre')->addSelect('m.id AS idMunicipio')
        	->innerJoin('e.idMunicipio', 'm')->where('e.idMunicipio = m.id')->getQuery()->getResult();

        
		return $this->render('SinamCoreBundle:Consulta:establecimiento.html.twig', array( 'form' => $form->createView(), 'todos' => $farmCatalogoproductos, 'muni' => $ctlMunicipios, 'establecimiento' => $CtlEstablecimiento ));
    }
}
