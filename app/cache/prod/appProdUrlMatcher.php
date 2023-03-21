<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/modservicio')) {
            if (0 === strpos($pathinfo, '/modservicio/acceso')) {
                // acceso_serv
                if ($pathinfo === '/modservicio/acceso/index') {
                    return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\AccesoController::indexAction',  '_route' => 'acceso_serv',);
                }

                // acceso_listado_serv
                if ($pathinfo === '/modservicio/acceso/listado') {
                    return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\AccesoController::listadoAction',  '_route' => 'acceso_listado_serv',);
                }

                if (0 === strpos($pathinfo, '/modservicio/acceso/registrar')) {
                    // acceso_regingreso_serv
                    if ($pathinfo === '/modservicio/acceso/registraringreso') {
                        return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\AccesoController::registraringresoAction',  '_route' => 'acceso_regingreso_serv',);
                    }

                    // acceso_regsalida_serv
                    if ($pathinfo === '/modservicio/acceso/registrarsalida') {
                        return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\AccesoController::registrarsalidaAction',  '_route' => 'acceso_regsalida_serv',);
                    }

                }

                // acceso_grabarSesion_serv
                if (0 === strpos($pathinfo, '/modservicio/acceso/grabarSesion') && preg_match('#^/modservicio/acceso/grabarSesion/(?P<var>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acceso_grabarSesion_serv')), array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\AccesoController::grabarSesion',));
                }

                if (0 === strpos($pathinfo, '/modservicio/acceso/filtrar')) {
                    // acceso_filtrar_serv
                    if (0 === strpos($pathinfo, '/modservicio/acceso/filtrar/opciones') && preg_match('#^/modservicio/acceso/filtrar/opciones(?:/(?P<msj>[^/]++))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'acceso_filtrar_serv')), array (  'msj' => '',  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\AccesoController::filtrarAction',));
                    }

                    // acceso_procesarfiltro_serv
                    if ($pathinfo === '/modservicio/acceso/filtrar/procesar') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_acceso_procesarfiltro_serv;
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\AccesoController::procesarfiltroAction',  '_route' => 'acceso_procesarfiltro_serv',);
                    }
                    not_acceso_procesarfiltro_serv:

                }

            }

            if (0 === strpos($pathinfo, '/modservicio/d')) {
                if (0 === strpos($pathinfo, '/modservicio/derivacion')) {
                    // derivacion_serv_new
                    if ($pathinfo === '/modservicio/derivacion/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_derivacion_serv_new;
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\DerivacionController::newAction',  '_route' => 'derivacion_serv_new',);
                    }
                    not_derivacion_serv_new:

                    // derivacion_serv_create
                    if ($pathinfo === '/modservicio/derivacion/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_derivacion_serv_create;
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\DerivacionController::createAction',  '_route' => 'derivacion_serv_create',);
                    }
                    not_derivacion_serv_create:

                    // derivacion_serv_recepcion
                    if ($pathinfo === '/modservicio/derivacion/recepcion') {
                        return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\DerivacionController::recepcionAction',  '_route' => 'derivacion_serv_recepcion',);
                    }

                    // derivacion_serv_cons_recep
                    if ($pathinfo === '/modservicio/derivacion/imprimir/consrecep') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_derivacion_serv_cons_recep;
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\DerivacionController::imprimirconsrecepAction',  '_route' => 'derivacion_serv_cons_recep',);
                    }
                    not_derivacion_serv_cons_recep:

                }

                if (0 === strpos($pathinfo, '/modservicio/docrec')) {
                    // docrec_serv
                    if (0 === strpos($pathinfo, '/modservicio/docrec/main') && preg_match('#^/modservicio/docrec/main/(?P<tipo>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_docrec_serv;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'docrec_serv')), array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\DocrecController::indexAction',));
                    }
                    not_docrec_serv:

                    // docrec_serv_listado
                    if ($pathinfo === '/modservicio/docrec/listado') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_docrec_serv_listado;
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\DocrecController::listadoAction',  '_route' => 'docrec_serv_listado',);
                    }
                    not_docrec_serv_listado:

                    // docrec_serv_show
                    if (0 === strpos($pathinfo, '/modservicio/docrec/show') && preg_match('#^/modservicio/docrec/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_docrec_serv_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'docrec_serv_show')), array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\DocrecController::showAction',));
                    }
                    not_docrec_serv_show:

                    // docrec_serv_grabarSesion
                    if (0 === strpos($pathinfo, '/modservicio/docrec/grabarSesion') && preg_match('#^/modservicio/docrec/grabarSesion/(?P<var>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'docrec_serv_grabarSesion')), array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\DocrecController::grabarSesion',));
                    }

                    if (0 === strpos($pathinfo, '/modservicio/docrec/filtrar')) {
                        // docrec_serv_filtrar
                        if ($pathinfo === '/modservicio/docrec/filtrar/opciones') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_docrec_serv_filtrar;
                            }

                            return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\DocrecController::filtrarAction',  '_route' => 'docrec_serv_filtrar',);
                        }
                        not_docrec_serv_filtrar:

                        // docrec_serv_procesarfiltro
                        if ($pathinfo === '/modservicio/docrec/filtrar/procesar') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_docrec_serv_procesarfiltro;
                            }

                            return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\DocrecController::procesarfiltroAction',  '_route' => 'docrec_serv_procesarfiltro',);
                        }
                        not_docrec_serv_procesarfiltro:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/modservicio/informe')) {
                // informe_new
                if ($pathinfo === '/modservicio/informe/new') {
                    return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\InformeController::newAction',  '_route' => 'informe_new',);
                }

                // informe_create
                if ($pathinfo === '/modservicio/informe/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_informe_create;
                    }

                    return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\InformeController::createAction',  '_route' => 'informe_create',);
                }
                not_informe_create:

            }

            // main_serv
            if ($pathinfo === '/modservicio/main') {
                return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\MainController::indexAction',  '_route' => 'main_serv',);
            }

            if (0 === strpos($pathinfo, '/modservicio/a')) {
                // acercade_serv
                if ($pathinfo === '/modservicio/acercade') {
                    return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\MainController::acercadeAction',  '_route' => 'acercade_serv',);
                }

                // ayuda_serv
                if ($pathinfo === '/modservicio/ayuda') {
                    return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\MainController::ayudaAction',  '_route' => 'ayuda_serv',);
                }

            }

            if (0 === strpos($pathinfo, '/modservicio/se')) {
                if (0 === strpos($pathinfo, '/modservicio/seguridad/log')) {
                    if (0 === strpos($pathinfo, '/modservicio/seguridad/login')) {
                        // login_serv
                        if ($pathinfo === '/modservicio/seguridad/login') {
                            return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\SeguridadController::loginAction',  '_route' => 'login_serv',);
                        }

                        // logincheck_serv
                        if ($pathinfo === '/modservicio/seguridad/logincheck') {
                            return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\SeguridadController::logincheckAction',  '_route' => 'logincheck_serv',);
                        }

                    }

                    // logout_serv
                    if ($pathinfo === '/modservicio/seguridad/logout') {
                        return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\SeguridadController::logoutAction',  '_route' => 'logout_serv',);
                    }

                }

                if (0 === strpos($pathinfo, '/modservicio/servicio')) {
                    // servicio_serv
                    if ($pathinfo === '/modservicio/servicio/index') {
                        return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\ServicioController::indexAction',  '_route' => 'servicio_serv',);
                    }

                    // servicio_serv_listado
                    if ($pathinfo === '/modservicio/servicio/listado') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_servicio_serv_listado;
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\ServicioController::listadoAction',  '_route' => 'servicio_serv_listado',);
                    }
                    not_servicio_serv_listado:

                    // servicio_serv_grabarSesion
                    if (0 === strpos($pathinfo, '/modservicio/servicio/grabarSesion') && preg_match('#^/modservicio/servicio/grabarSesion/(?P<var>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_serv_grabarSesion')), array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\ServicioController::grabarSesion',));
                    }

                    if (0 === strpos($pathinfo, '/modservicio/servicio/camb')) {
                        // servicio_serv_cambpass
                        if ($pathinfo === '/modservicio/servicio/cambPass') {
                            return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\ServicioController::cambpassAction',  '_route' => 'servicio_serv_cambpass',);
                        }

                        // servicio_serv_cambpass_update
                        if ($pathinfo === '/modservicio/servicio/cambpassupdate') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_servicio_serv_cambpass_update;
                            }

                            return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\ServicioController::cambpassupdateAction',  '_route' => 'servicio_serv_cambpass_update',);
                        }
                        not_servicio_serv_cambpass_update:

                    }

                    if (0 === strpos($pathinfo, '/modservicio/servicio/filtrar')) {
                        // servicio_serv_filtrar
                        if (0 === strpos($pathinfo, '/modservicio/servicio/filtrar/opciones') && preg_match('#^/modservicio/servicio/filtrar/opciones(?:/(?P<msj>[^/]++))?$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_serv_filtrar')), array (  'msj' => '',  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\ServicioController::filtrarAction',));
                        }

                        // servicio_serv_procesarfiltro
                        if ($pathinfo === '/modservicio/servicio/filtrar/procesar') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_servicio_serv_procesarfiltro;
                            }

                            return array (  '_controller' => 'Cps\\Fludoc\\ServicioBundle\\Controller\\ServicioController::procesarfiltroAction',  '_route' => 'servicio_serv_procesarfiltro',);
                        }
                        not_servicio_serv_procesarfiltro:

                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/adm/d')) {
                if (0 === strpos($pathinfo, '/adm/derivacion')) {
                    // adm_derivacion_new
                    if ($pathinfo === '/adm/derivacion/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_adm_derivacion_new;
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DerivacionController::newAction',  '_route' => 'adm_derivacion_new',);
                    }
                    not_adm_derivacion_new:

                    // adm_derivacion_create
                    if ($pathinfo === '/adm/derivacion/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_adm_derivacion_create;
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DerivacionController::createAction',  '_route' => 'adm_derivacion_create',);
                    }
                    not_adm_derivacion_create:

                    // adm_derivacion_delete
                    if (0 === strpos($pathinfo, '/adm/derivacion/delete') && preg_match('#^/adm/derivacion/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_adm_derivacion_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'adm_derivacion_delete')), array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DerivacionController::deleteAction',));
                    }
                    not_adm_derivacion_delete:

                }

                if (0 === strpos($pathinfo, '/adm/docrec')) {
                    // adm_docrec
                    if (rtrim($pathinfo, '/') === '/adm/docrec') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_adm_docrec;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'adm_docrec');
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::indexAction',  '_route' => 'adm_docrec',);
                    }
                    not_adm_docrec:

                    // adm_docrec_listado
                    if ($pathinfo === '/adm/docrec/listado') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_adm_docrec_listado;
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::listadoAction',  '_route' => 'adm_docrec_listado',);
                    }
                    not_adm_docrec_listado:

                    // adm_docrec_show
                    if (0 === strpos($pathinfo, '/adm/docrec/show') && preg_match('#^/adm/docrec/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_adm_docrec_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'adm_docrec_show')), array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::showAction',));
                    }
                    not_adm_docrec_show:

                    // adm_docrec_new
                    if ($pathinfo === '/adm/docrec/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_adm_docrec_new;
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::newAction',  '_route' => 'adm_docrec_new',);
                    }
                    not_adm_docrec_new:

                    // adm_docrec_create
                    if ($pathinfo === '/adm/docrec/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_adm_docrec_create;
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::createAction',  '_route' => 'adm_docrec_create',);
                    }
                    not_adm_docrec_create:

                    // adm_docrec_edit
                    if (0 === strpos($pathinfo, '/adm/docrec/edit') && preg_match('#^/adm/docrec/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_adm_docrec_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'adm_docrec_edit')), array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::editAction',));
                    }
                    not_adm_docrec_edit:

                    // adm_docrec_update
                    if ($pathinfo === '/adm/docrec/update') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_adm_docrec_update;
                        }

                        return array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::updateAction',  '_route' => 'adm_docrec_update',);
                    }
                    not_adm_docrec_update:

                    // adm_docrec_delete
                    if (0 === strpos($pathinfo, '/adm/docrec/delete') && preg_match('#^/adm/docrec/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_adm_docrec_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'adm_docrec_delete')), array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::deleteAction',));
                    }
                    not_adm_docrec_delete:

                    // adm_docrec_grabarSesion
                    if (0 === strpos($pathinfo, '/adm/docrec/grabarSesion') && preg_match('#^/adm/docrec/grabarSesion/(?P<var>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'adm_docrec_grabarSesion')), array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::grabarSesion',));
                    }

                    if (0 === strpos($pathinfo, '/adm/docrec/imprimir')) {
                        // adm_docrec_imprimir_hojaruta
                        if ($pathinfo === '/adm/docrec/imprimir/hojaruta') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_adm_docrec_imprimir_hojaruta;
                            }

                            return array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::imprimirhojarutaAction',  '_route' => 'adm_docrec_imprimir_hojaruta',);
                        }
                        not_adm_docrec_imprimir_hojaruta:

                        // adm_docrec_imprimir_colilla
                        if ($pathinfo === '/adm/docrec/imprimir/colilla') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_adm_docrec_imprimir_colilla;
                            }

                            return array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::imprimircolillaAction',  '_route' => 'adm_docrec_imprimir_colilla',);
                        }
                        not_adm_docrec_imprimir_colilla:

                    }

                    if (0 === strpos($pathinfo, '/adm/docrec/filtrar')) {
                        // adm_docrec_filtrar
                        if ($pathinfo === '/adm/docrec/filtrar/opciones') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_adm_docrec_filtrar;
                            }

                            return array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::filtrarAction',  '_route' => 'adm_docrec_filtrar',);
                        }
                        not_adm_docrec_filtrar:

                        // adm_docrec_procesarfiltro
                        if ($pathinfo === '/adm/docrec/filtrar/procesar') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_adm_docrec_procesarfiltro;
                            }

                            return array (  '_controller' => 'Cps\\Fludoc\\AdmBundle\\Controller\\DocrecController::procesarfiltroAction',  '_route' => 'adm_docrec_procesarfiltro',);
                        }
                        not_adm_docrec_procesarfiltro:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/acceso')) {
                // acceso
                if ($pathinfo === '/acceso/index') {
                    return array (  '_controller' => 'General\\ComunBundle\\Controller\\AccesoController::indexAction',  '_route' => 'acceso',);
                }

                // acceso_listado
                if ($pathinfo === '/acceso/listado') {
                    return array (  '_controller' => 'General\\ComunBundle\\Controller\\AccesoController::listadoAction',  '_route' => 'acceso_listado',);
                }

                if (0 === strpos($pathinfo, '/acceso/registrar')) {
                    // acceso_regingreso
                    if ($pathinfo === '/acceso/registraringreso') {
                        return array (  '_controller' => 'General\\ComunBundle\\Controller\\AccesoController::registraringresoAction',  '_route' => 'acceso_regingreso',);
                    }

                    // acceso_regsalida
                    if ($pathinfo === '/acceso/registrarsalida') {
                        return array (  '_controller' => 'General\\ComunBundle\\Controller\\AccesoController::registrarsalidaAction',  '_route' => 'acceso_regsalida',);
                    }

                }

                // acceso_grabarSesion
                if (0 === strpos($pathinfo, '/acceso/grabarSesion') && preg_match('#^/acceso/grabarSesion/(?P<var>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acceso_grabarSesion')), array (  '_controller' => 'General\\ComunBundle\\Controller\\AccesoController::grabarSesion',));
                }

                if (0 === strpos($pathinfo, '/acceso/filtrar')) {
                    // acceso_filtrar
                    if ($pathinfo === '/acceso/filtrar/opciones') {
                        return array (  '_controller' => 'General\\ComunBundle\\Controller\\AccesoController::filtrarAction',  '_route' => 'acceso_filtrar',);
                    }

                    // acceso_procesarfiltro
                    if ($pathinfo === '/acceso/filtrar/procesar') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_acceso_procesarfiltro;
                        }

                        return array (  '_controller' => 'General\\ComunBundle\\Controller\\AccesoController::procesarfiltroAction',  '_route' => 'acceso_procesarfiltro',);
                    }
                    not_acceso_procesarfiltro:

                }

            }

        }

        if (0 === strpos($pathinfo, '/geco/estado')) {
            // geco_estado
            if ($pathinfo === '/geco/estado/index') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\EstadoController::indexAction',  '_route' => 'geco_estado',);
            }

            // geco_estado_listado
            if ($pathinfo === '/geco/estado/listado') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\EstadoController::listadoAction',  '_route' => 'geco_estado_listado',);
            }

            // geco_estado_show
            if (0 === strpos($pathinfo, '/geco/estado/show') && preg_match('#^/geco/estado/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'geco_estado_show')), array (  '_controller' => 'General\\ComunBundle\\Controller\\EstadoController::showAction',));
            }

            // geco_estado_new
            if ($pathinfo === '/geco/estado/new') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\EstadoController::newAction',  '_route' => 'geco_estado_new',);
            }

            // geco_estado_create
            if ($pathinfo === '/geco/estado/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_geco_estado_create;
                }

                return array (  '_controller' => 'General\\ComunBundle\\Controller\\EstadoController::createAction',  '_route' => 'geco_estado_create',);
            }
            not_geco_estado_create:

            // geco_estado_edit
            if (0 === strpos($pathinfo, '/geco/estado/edit') && preg_match('#^/geco/estado/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'geco_estado_edit')), array (  '_controller' => 'General\\ComunBundle\\Controller\\EstadoController::editAction',));
            }

            // geco_estado_update
            if ($pathinfo === '/geco/estado/update') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_geco_estado_update;
                }

                return array (  '_controller' => 'General\\ComunBundle\\Controller\\EstadoController::updateAction',  '_route' => 'geco_estado_update',);
            }
            not_geco_estado_update:

            // geco_estado_delete
            if (0 === strpos($pathinfo, '/geco/estado/delete') && preg_match('#^/geco/estado/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'geco_estado_delete')), array (  '_controller' => 'General\\ComunBundle\\Controller\\EstadoController::deleteAction',));
            }

            // geco_estado_grabarSesion
            if (0 === strpos($pathinfo, '/geco/estado/grabarSesion') && preg_match('#^/geco/estado/grabarSesion/(?P<var>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'geco_estado_grabarSesion')), array (  '_controller' => 'General\\ComunBundle\\Controller\\EstadoController::grabarSesion',));
            }

        }

        if (0 === strpos($pathinfo, '/feriado')) {
            // feriado
            if ($pathinfo === '/feriado/index') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\FeriadoController::indexAction',  '_route' => 'feriado',);
            }

            // feriado_listado
            if ($pathinfo === '/feriado/listado') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\FeriadoController::listadoAction',  '_route' => 'feriado_listado',);
            }

            // feriado_show
            if (0 === strpos($pathinfo, '/feriado/show') && preg_match('#^/feriado/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'feriado_show')), array (  '_controller' => 'General\\ComunBundle\\Controller\\FeriadoController::showAction',));
            }

            // feriado_new
            if ($pathinfo === '/feriado/new') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\FeriadoController::newAction',  '_route' => 'feriado_new',);
            }

            // feriado_create
            if ($pathinfo === '/feriado/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_feriado_create;
                }

                return array (  '_controller' => 'General\\ComunBundle\\Controller\\FeriadoController::createAction',  '_route' => 'feriado_create',);
            }
            not_feriado_create:

            // feriado_edit
            if (0 === strpos($pathinfo, '/feriado/edit') && preg_match('#^/feriado/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'feriado_edit')), array (  '_controller' => 'General\\ComunBundle\\Controller\\FeriadoController::editAction',));
            }

            // feriado_update
            if (0 === strpos($pathinfo, '/feriado/update') && preg_match('#^/feriado/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_feriado_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'feriado_update')), array (  '_controller' => 'General\\ComunBundle\\Controller\\FeriadoController::updateAction',));
            }
            not_feriado_update:

            // feriado_delete
            if (0 === strpos($pathinfo, '/feriado/delete') && preg_match('#^/feriado/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'feriado_delete')), array (  '_controller' => 'General\\ComunBundle\\Controller\\FeriadoController::deleteAction',));
            }

            // producto_grabarSesion
            if (0 === strpos($pathinfo, '/feriado/grabarSesion') && preg_match('#^/feriado/grabarSesion/(?P<var>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'producto_grabarSesion')), array (  '_controller' => 'General\\ComunBundle\\Controller\\FeriadoController::grabarSesion',));
            }

            if (0 === strpos($pathinfo, '/feriado/filtrar')) {
                // feriado_filtrar
                if ($pathinfo === '/feriado/filtrar/opciones') {
                    return array (  '_controller' => 'General\\ComunBundle\\Controller\\FeriadoController::filtraropAction',  '_route' => 'feriado_filtrar',);
                }

                // feriado_procesarfiltro
                if ($pathinfo === '/feriado/filtrar/procesar') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_feriado_procesarfiltro;
                    }

                    return array (  '_controller' => 'General\\ComunBundle\\Controller\\FeriadoController::procesarfiltroAction',  '_route' => 'feriado_procesarfiltro',);
                }
                not_feriado_procesarfiltro:

            }

        }

        if (0 === strpos($pathinfo, '/main')) {
            // main
            if ($pathinfo === '/main') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\MainController::indexAction',  '_route' => 'main',);
            }

            if (0 === strpos($pathinfo, '/main/a')) {
                // acercade
                if ($pathinfo === '/main/acercade') {
                    return array (  '_controller' => 'General\\ComunBundle\\Controller\\MainController::acercadeAction',  '_route' => 'acercade',);
                }

                // ayuda
                if ($pathinfo === '/main/ayuda') {
                    return array (  '_controller' => 'General\\ComunBundle\\Controller\\MainController::ayudaAction',  '_route' => 'ayuda',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/perfil')) {
            // perfil
            if ($pathinfo === '/perfil/index') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\PerfilController::indexAction',  '_route' => 'perfil',);
            }

            // perfil_listado
            if ($pathinfo === '/perfil/listado') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\PerfilController::listadoAction',  '_route' => 'perfil_listado',);
            }

            // perfil_show
            if (0 === strpos($pathinfo, '/perfil/show') && preg_match('#^/perfil/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'perfil_show')), array (  '_controller' => 'General\\ComunBundle\\Controller\\PerfilController::showAction',));
            }

            // perfil_new
            if ($pathinfo === '/perfil/new') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\PerfilController::newAction',  '_route' => 'perfil_new',);
            }

            // perfil_create
            if ($pathinfo === '/perfil/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_perfil_create;
                }

                return array (  '_controller' => 'General\\ComunBundle\\Controller\\PerfilController::createAction',  '_route' => 'perfil_create',);
            }
            not_perfil_create:

            // perfil_edit
            if (0 === strpos($pathinfo, '/perfil/edit') && preg_match('#^/perfil/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'perfil_edit')), array (  '_controller' => 'General\\ComunBundle\\Controller\\PerfilController::editAction',));
            }

            // perfil_update
            if ($pathinfo === '/perfil/update') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_perfil_update;
                }

                return array (  '_controller' => 'General\\ComunBundle\\Controller\\PerfilController::updateAction',  '_route' => 'perfil_update',);
            }
            not_perfil_update:

            // perfil_delete
            if (0 === strpos($pathinfo, '/perfil/delete') && preg_match('#^/perfil/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'perfil_delete')), array (  '_controller' => 'General\\ComunBundle\\Controller\\PerfilController::deleteAction',));
            }

            // perfil_grabarSesion
            if (0 === strpos($pathinfo, '/perfil/grabarSesion') && preg_match('#^/perfil/grabarSesion/(?P<var>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'perfil_grabarSesion')), array (  '_controller' => 'General\\ComunBundle\\Controller\\PerfilController::grabarSesion',));
            }

        }

        if (0 === strpos($pathinfo, '/seguridad')) {
            if (0 === strpos($pathinfo, '/seguridad/log')) {
                if (0 === strpos($pathinfo, '/seguridad/login')) {
                    // login
                    if ($pathinfo === '/seguridad/login') {
                        return array (  '_controller' => 'General\\ComunBundle\\Controller\\SeguridadController::loginAction',  '_route' => 'login',);
                    }

                    // logincheck
                    if ($pathinfo === '/seguridad/logincheck') {
                        return array (  '_controller' => 'General\\ComunBundle\\Controller\\SeguridadController::logincheckAction',  '_route' => 'logincheck',);
                    }

                }

                // logout
                if ($pathinfo === '/seguridad/logout') {
                    return array (  '_controller' => 'General\\ComunBundle\\Controller\\SeguridadController::logoutAction',  '_route' => 'logout',);
                }

            }

            // accesodenegado
            if ($pathinfo === '/seguridad/accesodenegado') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\SeguridadController::accesodenegadoAction',  '_route' => 'accesodenegado',);
            }

        }

        if (0 === strpos($pathinfo, '/usuario')) {
            // usuario
            if ($pathinfo === '/usuario/index') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::indexAction',  '_route' => 'usuario',);
            }

            // usuario_listado
            if ($pathinfo === '/usuario/listado') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::listadoAction',  '_route' => 'usuario_listado',);
            }

            // usuario_show
            if (0 === strpos($pathinfo, '/usuario/show') && preg_match('#^/usuario/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_show')), array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::showAction',));
            }

            // usuario_new
            if ($pathinfo === '/usuario/new') {
                return array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::newAction',  '_route' => 'usuario_new',);
            }

            // usuario_create
            if ($pathinfo === '/usuario/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_usuario_create;
                }

                return array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::createAction',  '_route' => 'usuario_create',);
            }
            not_usuario_create:

            // usuario_edit
            if (0 === strpos($pathinfo, '/usuario/edit') && preg_match('#^/usuario/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_edit')), array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::editAction',));
            }

            // usuario_update
            if ($pathinfo === '/usuario/update') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_usuario_update;
                }

                return array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::updateAction',  '_route' => 'usuario_update',);
            }
            not_usuario_update:

            // usuario_delete
            if (0 === strpos($pathinfo, '/usuario/delete') && preg_match('#^/usuario/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_delete')), array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::deleteAction',));
            }

            // usuario_grabarSesion
            if (0 === strpos($pathinfo, '/usuario/grabarSesion') && preg_match('#^/usuario/grabarSesion/(?P<var>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_grabarSesion')), array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::grabarSesion',));
            }

            if (0 === strpos($pathinfo, '/usuario/camb')) {
                // usuario_cambpass
                if ($pathinfo === '/usuario/cambPass') {
                    return array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::cambpassAction',  '_route' => 'usuario_cambpass',);
                }

                // usuario_cambpass_update
                if ($pathinfo === '/usuario/cambpassupdate') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_usuario_cambpass_update;
                    }

                    return array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::cambpassupdateAction',  '_route' => 'usuario_cambpass_update',);
                }
                not_usuario_cambpass_update:

            }

            if (0 === strpos($pathinfo, '/usuario/filtrar')) {
                // usuario_filtrar
                if ($pathinfo === '/usuario/filtrar/opciones') {
                    return array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::filtrarAction',  '_route' => 'usuario_filtrar',);
                }

                // usuario_procesarfiltro
                if ($pathinfo === '/usuario/filtrar/procesar') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_usuario_procesarfiltro;
                    }

                    return array (  '_controller' => 'General\\ComunBundle\\Controller\\UsuarioController::procesarfiltroAction',  '_route' => 'usuario_procesarfiltro',);
                }
                not_usuario_procesarfiltro:

            }

        }

        if (0 === strpos($pathinfo, '/geem_infinst')) {
            // infinst
            if (rtrim($pathinfo, '/') === '/geem_infinst') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'infinst');
                }

                return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\InfinstController::indexAction',  '_route' => 'infinst',);
            }

            // infinst_update
            if ($pathinfo === '/geem_infinst/update') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_infinst_update;
                }

                return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\InfinstController::updateAction',  '_route' => 'infinst_update',);
            }
            not_infinst_update:

        }

        if (0 === strpos($pathinfo, '/noticia')) {
            // noticia
            if ($pathinfo === '/noticia/index') {
                return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\NoticiaController::indexAction',  '_route' => 'noticia',);
            }

            // noticia_listado
            if ($pathinfo === '/noticia/listado') {
                return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\NoticiaController::listadoAction',  '_route' => 'noticia_listado',);
            }

            // noticia_show
            if (0 === strpos($pathinfo, '/noticia/show') && preg_match('#^/noticia/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'noticia_show')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\NoticiaController::showAction',));
            }

            // noticia_new
            if ($pathinfo === '/noticia/new') {
                return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\NoticiaController::newAction',  '_route' => 'noticia_new',);
            }

            // noticia_create
            if ($pathinfo === '/noticia/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_noticia_create;
                }

                return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\NoticiaController::createAction',  '_route' => 'noticia_create',);
            }
            not_noticia_create:

            // noticia_edit
            if (0 === strpos($pathinfo, '/noticia/edit') && preg_match('#^/noticia/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'noticia_edit')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\NoticiaController::editAction',));
            }

            // noticia_update
            if (0 === strpos($pathinfo, '/noticia/update') && preg_match('#^/noticia/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_noticia_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'noticia_update')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\NoticiaController::updateAction',));
            }
            not_noticia_update:

            // noticia_delete
            if (0 === strpos($pathinfo, '/noticia/delete') && preg_match('#^/noticia/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'noticia_delete')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\NoticiaController::deleteAction',));
            }

            // noticia_grabarSesion
            if (0 === strpos($pathinfo, '/noticia/grabarSesion') && preg_match('#^/noticia/grabarSesion/(?P<var>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'noticia_grabarSesion')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\NoticiaController::grabarSesion',));
            }

            if (0 === strpos($pathinfo, '/noticia/filtrar')) {
                // noticia_filtrar
                if ($pathinfo === '/noticia/filtrar/opciones') {
                    return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\NoticiaController::filtrarAction',  '_route' => 'noticia_filtrar',);
                }

                // noticia_procesarfiltro
                if ($pathinfo === '/noticia/filtrar/procesar') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_noticia_procesarfiltro;
                    }

                    return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\NoticiaController::procesarfiltroAction',  '_route' => 'noticia_procesarfiltro',);
                }
                not_noticia_procesarfiltro:

            }

        }

        if (0 === strpos($pathinfo, '/servicio')) {
            // servicio
            if ($pathinfo === '/servicio/index') {
                return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::indexAction',  '_route' => 'servicio',);
            }

            // servicio_listado
            if ($pathinfo === '/servicio/listado') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_servicio_listado;
                }

                return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::listadoAction',  '_route' => 'servicio_listado',);
            }
            not_servicio_listado:

            // servicio_show
            if (0 === strpos($pathinfo, '/servicio/show') && preg_match('#^/servicio/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_show')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::showAction',));
            }

            // servicio_new
            if ($pathinfo === '/servicio/new') {
                return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::newAction',  '_route' => 'servicio_new',);
            }

            // servicio_create
            if ($pathinfo === '/servicio/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_servicio_create;
                }

                return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::createAction',  '_route' => 'servicio_create',);
            }
            not_servicio_create:

            // servicio_edit
            if (0 === strpos($pathinfo, '/servicio/edit') && preg_match('#^/servicio/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_edit')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::editAction',));
            }

            // servicio_update
            if ($pathinfo === '/servicio/update') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_servicio_update;
                }

                return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::updateAction',  '_route' => 'servicio_update',);
            }
            not_servicio_update:

            // servicio_delete
            if (0 === strpos($pathinfo, '/servicio/delete') && preg_match('#^/servicio/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_delete')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::deleteAction',));
            }

            // servicio_grabarSesion
            if (0 === strpos($pathinfo, '/servicio/grabarSesion') && preg_match('#^/servicio/grabarSesion/(?P<var>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_grabarSesion')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::grabarSesion',));
            }

            if (0 === strpos($pathinfo, '/servicio/camb')) {
                // servicio_cambpass
                if ($pathinfo === '/servicio/cambPass') {
                    return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::cambpassAction',  '_route' => 'servicio_cambpass',);
                }

                // servicio_cambpass_update
                if ($pathinfo === '/servicio/cambpassupdate') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_servicio_cambpass_update;
                    }

                    return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::cambpassupdateAction',  '_route' => 'servicio_cambpass_update',);
                }
                not_servicio_cambpass_update:

            }

            if (0 === strpos($pathinfo, '/servicio/filtrar')) {
                // servicio_filtrar
                if ($pathinfo === '/servicio/filtrar/opciones') {
                    return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::filtrarAction',  '_route' => 'servicio_filtrar',);
                }

                // servicio_procesarfiltro
                if ($pathinfo === '/servicio/filtrar/procesar') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_servicio_procesarfiltro;
                    }

                    return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\ServicioController::procesarfiltroAction',  '_route' => 'servicio_procesarfiltro',);
                }
                not_servicio_procesarfiltro:

            }

        }

        if (0 === strpos($pathinfo, '/ge')) {
            if (0 === strpos($pathinfo, '/geem_sucursal')) {
                // sucursal
                if ($pathinfo === '/geem_sucursal/index') {
                    return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\SucursalController::indexAction',  '_route' => 'sucursal',);
                }

                // sucursal_listado
                if ($pathinfo === '/geem_sucursal/listado') {
                    return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\SucursalController::listadoAction',  '_route' => 'sucursal_listado',);
                }

                // sucursal_show
                if (0 === strpos($pathinfo, '/geem_sucursal/show') && preg_match('#^/geem_sucursal/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sucursal_show')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\SucursalController::showAction',));
                }

                // sucursal_new
                if ($pathinfo === '/geem_sucursal/new') {
                    return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\SucursalController::newAction',  '_route' => 'sucursal_new',);
                }

                // sucursal_create
                if ($pathinfo === '/geem_sucursal/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sucursal_create;
                    }

                    return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\SucursalController::createAction',  '_route' => 'sucursal_create',);
                }
                not_sucursal_create:

                // sucursal_edit
                if (0 === strpos($pathinfo, '/geem_sucursal/edit') && preg_match('#^/geem_sucursal/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sucursal_edit')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\SucursalController::editAction',));
                }

                // sucursal_update
                if (0 === strpos($pathinfo, '/geem_sucursal/update') && preg_match('#^/geem_sucursal/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sucursal_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sucursal_update')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\SucursalController::updateAction',));
                }
                not_sucursal_update:

                // sucursal_delete
                if (0 === strpos($pathinfo, '/geem_sucursal/delete') && preg_match('#^/geem_sucursal/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sucursal_delete')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\SucursalController::deleteAction',));
                }

                // sucursal_grabarSesion
                if (0 === strpos($pathinfo, '/geem_sucursal/grabarSesion') && preg_match('#^/geem_sucursal/grabarSesion/(?P<var>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sucursal_grabarSesion')), array (  '_controller' => 'General\\EmpresaBundle\\Controller\\SucursalController::grabarSesion',));
                }

                if (0 === strpos($pathinfo, '/geem_sucursal/filtrar')) {
                    // sucursal_filtrar
                    if (0 === strpos($pathinfo, '/geem_sucursal/filtrar/opciones') && preg_match('#^/geem_sucursal/filtrar/opciones(?:/(?P<msj>[^/]++))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sucursal_filtrar')), array (  'msj' => '',  '_controller' => 'General\\EmpresaBundle\\Controller\\SucursalController::filtrarAction',));
                    }

                    // sucursal_procesarfiltro
                    if ($pathinfo === '/geem_sucursal/filtrar/procesar') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_sucursal_procesarfiltro;
                        }

                        return array (  '_controller' => 'General\\EmpresaBundle\\Controller\\SucursalController::procesarfiltroAction',  '_route' => 'sucursal_procesarfiltro',);
                    }
                    not_sucursal_procesarfiltro:

                }

            }

            if (0 === strpos($pathinfo, '/genemu_')) {
                // genemu_upload
                if ($pathinfo === '/genemu_upload') {
                    return array (  '_controller' => 'Genemu\\Bundle\\FormBundle\\Controller\\UploadController::uploadAction',  '_route' => 'genemu_upload',);
                }

                // genemu_form_image
                if ($pathinfo === '/genemu_change_image') {
                    return array (  '_controller' => 'Genemu\\Bundle\\FormBundle\\Controller\\ImageController::changeAction',  '_route' => 'genemu_form_image',);
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
