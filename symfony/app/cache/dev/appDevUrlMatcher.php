<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/farmcatalogoproductos')) {
            // farmcatalogoproductos_index
            if (rtrim($pathinfo, '/') === '/farmcatalogoproductos') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_farmcatalogoproductos_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'farmcatalogoproductos_index');
                }

                return array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\FarmCatalogoproductosController::indexAction',  '_route' => 'farmcatalogoproductos_index',);
            }
            not_farmcatalogoproductos_index:

            // farmcatalogoproductos_show
            if (preg_match('#^/farmcatalogoproductos/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_farmcatalogoproductos_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'farmcatalogoproductos_show')), array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\FarmCatalogoproductosController::showAction',));
            }
            not_farmcatalogoproductos_show:

            // farmcatalogoproductos_new
            if ($pathinfo === '/farmcatalogoproductos/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_farmcatalogoproductos_new;
                }

                return array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\FarmCatalogoproductosController::newAction',  '_route' => 'farmcatalogoproductos_new',);
            }
            not_farmcatalogoproductos_new:

            // farmcatalogoproductos_edit
            if (preg_match('#^/farmcatalogoproductos/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_farmcatalogoproductos_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'farmcatalogoproductos_edit')), array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\FarmCatalogoproductosController::editAction',));
            }
            not_farmcatalogoproductos_edit:

            // farmcatalogoproductos_delete
            if (preg_match('#^/farmcatalogoproductos/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_farmcatalogoproductos_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'farmcatalogoproductos_delete')), array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\FarmCatalogoproductosController::deleteAction',));
            }
            not_farmcatalogoproductos_delete:

        }

        if (0 === strpos($pathinfo, '/ctlmunicipio')) {
            // ctlmunicipio_index
            if (rtrim($pathinfo, '/') === '/ctlmunicipio') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_ctlmunicipio_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'ctlmunicipio_index');
                }

                return array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\CtlMunicipioController::indexAction',  '_route' => 'ctlmunicipio_index',);
            }
            not_ctlmunicipio_index:

            // ctlmunicipio_show
            if (preg_match('#^/ctlmunicipio/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_ctlmunicipio_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ctlmunicipio_show')), array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\CtlMunicipioController::showAction',));
            }
            not_ctlmunicipio_show:

            // ctlmunicipio_new
            if ($pathinfo === '/ctlmunicipio/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_ctlmunicipio_new;
                }

                return array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\CtlMunicipioController::newAction',  '_route' => 'ctlmunicipio_new',);
            }
            not_ctlmunicipio_new:

            // ctlmunicipio_edit
            if (preg_match('#^/ctlmunicipio/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_ctlmunicipio_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ctlmunicipio_edit')), array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\CtlMunicipioController::editAction',));
            }
            not_ctlmunicipio_edit:

            // ctlmunicipio_delete
            if (preg_match('#^/ctlmunicipio/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_ctlmunicipio_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ctlmunicipio_delete')), array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\CtlMunicipioController::deleteAction',));
            }
            not_ctlmunicipio_delete:

        }

        // sinam_core_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_sinam_core_homepage;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'sinam_core_homepage');
            }

            return array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\DefaultController::indexAction',  '_route' => 'sinam_core_homepage',);
        }
        not_sinam_core_homepage:

        if (0 === strpos($pathinfo, '/buscar')) {
            // sinam_busqueda
            if ($pathinfo === '/buscar') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_sinam_busqueda;
                }

                return array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\DefaultController::searchAction',  '_route' => 'sinam_busqueda',);
            }
            not_sinam_busqueda:

            // ajax_busqueda
            if ($pathinfo === '/buscarajax') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_ajax_busqueda;
                }

                return array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\DefaultController::ajaxAction',  '_route' => 'ajax_busqueda',);
            }
            not_ajax_busqueda:

        }

        if (0 === strpos($pathinfo, '/consulta_')) {
            // por_establecimiento
            if ($pathinfo === '/consulta_establecimiento') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_por_establecimiento;
                }

                return array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\PorEstablecimientoController::indexAction',  '_route' => 'por_establecimiento',);
            }
            not_por_establecimiento:

            // consulta_abastecimiento
            if ($pathinfo === '/consulta_abastecimiento') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_consulta_abastecimiento;
                }

                return array (  '_controller' => 'Sinam\\CoreBundle\\Controller\\PorAbastecimientoController::indexAction',  '_route' => 'consulta_abastecimiento',);
            }
            not_consulta_abastecimiento:

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
