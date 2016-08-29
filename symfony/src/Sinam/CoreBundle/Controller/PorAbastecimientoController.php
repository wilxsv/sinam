<?php

namespace Sinam\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sinam\CoreBundle\Form\BusquedaBasicaType;
use Sinam\CoreBundle\Form\BusquedaAbastecimientoType;

use Sinam\CoreBundle\Entity\FarmCatalogoproductos;
use Sinam\CoreBundle\Entity\CtlMunicipio;
use Sinam\CoreBundle\Entity\CtlAbastecimiento;
use Sinam\CoreBundle\Form\FarmCatalogoproductosType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityRepository;

class PorAbastecimientoController extends Controller
{    
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()){
            $result = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoSINABSIAP( $request->query->get('nombre'), $request->query->get('depto'), $request->query->get('munic'), $request->query->get('estab'), $request->query->get('max') );
            $siap = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoSIAP( $request->query->get('nombre'), $request->query->get('depto'), $request->query->get('munic'), $request->query->get('estab') );
            $consumo = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByAbastecimiento( $request->query->get('nombre'), $request->query->get('depto'), $request->query->get('munic'), $request->query->get('estab'), $request->query->get('max') );
            $max = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByMesAbastecimiento( $request->query->get('nombre'), $request->query->get('depto'), $request->query->get('munic'), $request->query->get('estab'), 0 );

            return $this->render('SinamCoreBundle:Consulta:abastecimientoMensual.html.twig', array( 'rest'=> $result, 'consumo' => $consumo, 'siap' => $siap, 'last' => $max ));
        }else {
            $form = $form = $this->createForm('Sinam\CoreBundle\Form\BusquedaAbastecimientoType');
            $depto = $em->getRepository('SinamCoreBundle:CtlDepartamento')->findByidPais( 68 );
            $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlMunicipio');
            $ctlMunicipios = $repository->createQueryBuilder('p')->select('p.id, p.nombre')->addSelect('d.id AS depto')->innerJoin('p.idDepartamento', 'd')->where('p.idDepartamento = d.id')->getQuery()->getResult();
            $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlEstablecimiento');
            $CtlEstablecimiento = $repository->createQueryBuilder('e')->select('e.id, e.nombre')->addSelect('m.id AS idMunicipio')->innerJoin('e.idMunicipio', 'm')->where('e.idMunicipio = m.id')->getQuery()->getResult();
            $all = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findAllHospitales( );

            return $this->render('SinamCoreBundle:Consulta:abastecimiento.html.twig', array( 'form' => $form->createView(), 'depto' => $depto, 'muni' => $ctlMunicipios, 'establecimiento' => $CtlEstablecimiento, 'all' =>  $all ));
        }
    }

    public function graficoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $form = $this->createForm('Sinam\CoreBundle\Form\BusquedaHistorialType');
        $all = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findAllHospitales( );

        $form->handleRequest($request);
        if ($request->isXmlHttpRequest() OR $form->isValid()){
            $nombre = $form["nombre"]->getData();
            /*Total a nivel nacional*/
            $totalSinab = $em->getRepository('SinamCoreBundle:CtlAbastecimiento')->findByTotalNacionalSINAB( $nombre );
            $totalConsumo = $em->getRepository('SinamCoreBundle:CtlAbastecimiento')->findByTotalConsumo( $nombre );
            $establecimientoConsumo = $em->getRepository('SinamCoreBundle:CtlAbastecimiento')->findByTotalEstablecimientoConsumo( $nombre );
            $historicoConsumo = $em->getRepository('SinamCoreBundle:CtlAbastecimiento')->findByHistoricoConsumo( $nombre, 0 );
            $mesesConsumo = $em->getRepository('SinamCoreBundle:CtlAbastecimiento')->findByHistoricoMensualConsumo( $nombre, 0 );


            return $this->render('SinamCoreBundle:Consulta:abastecimientoGrafico.html.twig', array('form' => $form->createView(), 'rest'=> TRUE, 'totalSinab' => $totalSinab, 'all' =>  $all, 'nombre' => $nombre, 'consumo' => $totalConsumo, 'establecimientoConsumo' => $establecimientoConsumo, 'historicoConsumo' => $historicoConsumo, 'meses' => $mesesConsumo));
        }else {
            
            $all = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findAllHospitales( );

            $depto = $em->getRepository('SinamCoreBundle:CtlDepartamento')->findByidPais( 68 );
            $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlMunicipio');
            $ctlMunicipios = $repository->createQueryBuilder('p')->select('p.id, p.nombre')->addSelect('d.id AS depto')->innerJoin('p.idDepartamento', 'd')->where('p.idDepartamento = d.id')->getQuery()->getResult();
            $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlEstablecimiento');
            $CtlEstablecimiento = $repository->createQueryBuilder('e')->select('e.id, e.nombre')->addSelect('m.id AS idMunicipio')->innerJoin('e.idMunicipio', 'm')->where('e.idMunicipio = m.id')->getQuery()->getResult();
            
            return $this->render('SinamCoreBundle:Consulta:grafico.html.twig', array( 'form' => $form->createView(), 'depto' => $depto, 'muni' => $ctlMunicipios, 'establecimiento' => $CtlEstablecimiento, 'all' =>  $all ));
        }
    }
}
