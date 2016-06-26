<?php

namespace Sinam\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sinam\CoreBundle\Form\BusquedaBasicaType;
use Sinam\CoreBundle\Form\BusquedaAbastecimientoType;

use Sinam\CoreBundle\Entity\FarmCatalogoproductos;
use Sinam\CoreBundle\Entity\CtlMunicipio;
use Sinam\CoreBundle\Form\FarmCatalogoproductosType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityRepository;

class PorAbastecimientoController extends Controller
{    
    public function indexAction(Request $request)
    {
        if ($request->isXmlHttpRequest()){
            
            return $this->render('SinamCoreBundle:Consulta:abastecimientoMensual.html.twig', array( 'rest' => FALSE, 'establecimiento' => FALSE ));
        }else {
            $form = $form = $this->createForm('Sinam\CoreBundle\Form\BusquedaAbastecimientoType');
            $em = $this->getDoctrine()->getManager();
            $depto = $em->getRepository('SinamCoreBundle:CtlDepartamento')->findByidPais( 68 );
            $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlMunicipio');
            $ctlMunicipios = $repository->createQueryBuilder('p')->select('p.id, p.nombre')->addSelect('d.id AS depto')->innerJoin('p.idDepartamento', 'd')->where('p.idDepartamento = d.id')->getQuery()->getResult();
            $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlEstablecimiento');
            $CtlEstablecimiento = $repository->createQueryBuilder('e')->select('e.id, e.nombre')->addSelect('m.id AS idMunicipio')->innerJoin('e.idMunicipio', 'm')->where('e.idMunicipio = m.id')->getQuery()->getResult();

            return $this->render('SinamCoreBundle:Consulta:abastecimiento.html.twig', array( 'form' => $form->createView(), 'depto' => $depto, 'muni' => $ctlMunicipios, 'establecimiento' => $CtlEstablecimiento ));
        }
    }
}
