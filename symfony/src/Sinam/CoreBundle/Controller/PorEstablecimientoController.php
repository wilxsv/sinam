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
use Doctrine\ORM\Query\ResultSetMapping;

use Sinam\CoreBundle\Entity\CtlMunicipio;

class PorEstablecimientoController extends Controller
{
    public function indexAction(Request $request)
    {
		$form = $form = $this->createForm('Sinam\CoreBundle\Form\BusquedaEstablecimientoType');

        $em = $this->getDoctrine()->getManager();
        $depto = $em->getRepository('SinamCoreBundle:CtlDepartamento')->findByidPais( 68 );
        $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlMunicipio');
        $ctlMunicipios = $repository->createQueryBuilder('p')->select('p.id, p.nombre')->addSelect('d.id AS depto')
        	->innerJoin('p.idDepartamento', 'd')->where('p.idDepartamento = d.id')->getQuery()->getResult();
        $repository = $this->getDoctrine()->getRepository('SinamCoreBundle:CtlEstablecimiento');
        $CtlEstablecimiento = $repository->createQueryBuilder('e')->select('e.id, e.nombre')->addSelect('m.id AS idMunicipio')
        	->innerJoin('e.idMunicipio', 'm')->where('e.idMunicipio = m.id')->getQuery()->getResult();
        $all = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findAllHospitales( );

        
		return $this->render('SinamCoreBundle:Consulta:establecimiento.html.twig', array( 'form' => $form->createView(),'depto' => $depto, 'muni' => $ctlMunicipios, 'establecimiento' => $CtlEstablecimiento, 'all' =>  $all ));
    }

    public function ajaxAction(Request $request) 
    {
        if (! $request->isXmlHttpRequest()) {
            throw new NotFoundHttpException();
        }

        $em = $this->getDoctrine()->getEntityManager();
        $lat = FALSE;
        $lng = FALSE;
        if ($request->query->get('nombre') != NULL && $request->query->get('lugar') != NULL)
        {
            $address = urlencode( $request->query->get('lugar'). ', el salvador' );
            $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address ;
            $response = file_get_contents($url);
            $json = json_decode($response,true);
            if ( isset($json['results'][0])){
                $lat = $json['results'][0]['geometry']['location']['lat'];
                $lng = $json['results'][0]['geometry']['location']['lng'];
            }
        }
        if ( $lng == $lat && $lng == FALSE )
        {
            return $this->render('SinamCoreBundle:Consulta:establecimientoMapa.html.twig', array( 'rest'=> FALSE, 'alt'=> FALSE ));
        }
        elseif ( $request->query->get('tipo') == 0 )
        {
            $result = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByLocalidad( $request->query->get('nombre'), 0, 0, 0, 7, $lat, $lng );
            $siap = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoSIAP( $request->query->get('nombre'), 0, 0, 0 );
            $alt = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoAlternativo( ) ;
            return $this->render('SinamCoreBundle:Consulta:establecimientoMapa.html.twig', array( 'rest'=> $result, 'alt'=> $alt, 'siap' => $siap, 'lat' => $lat, 'lng' => $lng ));
        }
        elseif ( $request->query->get('tipo') == 1 )
        {
            $result = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByLocalidad( $request->query->get('nombre'), $request->query->get('depto'), $request->query->get('munic'), $request->query->get('estab'), $request->query->get('max'), $lat, $lng );
            $siap = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoSIAP( $request->query->get('nombre'), $request->query->get('depto'), $request->query->get('munic'), $request->query->get('estab') );
            $alt = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findByIdMedicamentoAlternativo( ) ;
            return $this->render('SinamCoreBundle:Consulta:establecimientoMapa.html.twig', array( 'rest'=> $result, 'alt'=> $alt, 'siap' => $siap, 'lat' => $lat, 'lng' => $lng ));
        }else{
            return $this->render('SinamCoreBundle:Consulta:establecimientoMapa.html.twig', array( 'rest'=> FALSE, 'alt'=> FALSE ));
        }
    }
}
