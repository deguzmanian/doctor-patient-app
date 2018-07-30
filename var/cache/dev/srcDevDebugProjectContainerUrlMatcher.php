<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = $allowSchemes = array();
        if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
            return $ret;
        }
        if ($allow) {
            throw new MethodNotAllowedException(array_keys($allow));
        }
        if (!in_array($this->context->getMethod(), array('HEAD', 'GET'), true)) {
            // no-op
        } elseif ($allowSchemes) {
            redirect_scheme:
            $scheme = $this->context->getScheme();
            $this->context->setScheme(key($allowSchemes));
            try {
                if ($ret = $this->doMatch($pathinfo)) {
                    return $this->redirect($pathinfo, $ret['_route'], $this->context->getScheme()) + $ret;
                }
            } finally {
                $this->context->setScheme($scheme);
            }
        } elseif ('/' !== $pathinfo) {
            $pathinfo = '/' !== $pathinfo[-1] ? $pathinfo.'/' : substr($pathinfo, 0, -1);
            if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
                return $this->redirect($pathinfo, $ret['_route']) + $ret;
            }
            if ($allowSchemes) {
                goto redirect_scheme;
            }
        }

        throw new ResourceNotFoundException();
    }

    private function doMatch(string $rawPathinfo, array &$allow = array(), array &$allowSchemes = array()): ?array
    {
        $allow = $allowSchemes = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $context = $this->context;
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        switch ($pathinfo) {
            default:
                $routes = array(
                    '/admin/homepage' => array(array('_route' => 'admin', '_controller' => 'App\\Controller\\AdminController::index'), null, null, null),
                    '/admin/doctor-add' => array(array('_route' => 'doctor', '_controller' => 'App\\Controller\\AdminController::newdoctor'), null, null, null),
                    '/admin/patient-add' => array(array('_route' => 'patient-add', '_controller' => 'App\\Controller\\AdminController::newpatient'), null, null, null),
                    '/admin/adddiagnosiscategory' => array(array('_route' => 'add_diagnosis_category', '_controller' => 'App\\Controller\\AdminController::addDiagnosisCategory'), null, null, null),
                    '/admin/addclinic' => array(array('_route' => 'add_clinic', '_controller' => 'App\\Controller\\AdminController::addClinic'), null, null, null),
                    '/admin/clinic-list' => array(array('_route' => 'clinic_list', '_controller' => 'App\\Controller\\AdminController::listClinics'), null, null, null),
                    '/admin/patients-list' => array(array('_route' => 'patient_list', '_controller' => 'App\\Controller\\AdminController::listPatients'), null, null, null),
                    '/admin/doctors-list' => array(array('_route' => 'doctor_list', '_controller' => 'App\\Controller\\AdminController::listDoctors'), null, null, null),
                    '/admin/diagnosiscategories' => array(array('_route' => 'diagnosis_categories', '_controller' => 'App\\Controller\\AdminController::listDiagnosisCategories'), null, null, null),
                    '/admin/manage-clinic' => array(array('_route' => '', '_controller' => 'App\\Controller\\ClinicController::index'), null, null, null),
                    '/doctor/homepage' => array(array('_route' => 'doctor-home', '_controller' => 'App\\Controller\\DoctorController::index'), null, null, null),
                    '/login' => array(array('_route' => 'login', '_controller' => 'App\\Controller\\LoginController::login'), null, null, null),
                    '/patient' => array(array('_route' => 'patient', '_controller' => 'App\\Controller\\PatientController::index'), null, null, null),
                    '/patient/view' => array(array('_route' => 'view', '_controller' => 'App\\Controller\\PatientController::detailsAction'), null, null, null),
                    '/admin/user-management/' => array(array('_route' => 'user_info_index', '_controller' => 'App\\Controller\\UserInfoController::index'), null, array('GET' => 0), null),
                    '/admin/user-management/add-doctor' => array(array('_route' => 'user_info_new', '_controller' => 'App\\Controller\\UserInfoController::new'), null, array('GET' => 0, 'POST' => 1), null),
                    '/_profiler/' => array(array('_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'), null, null, null),
                    '/_profiler/search' => array(array('_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'), null, null, null),
                    '/_profiler/search_bar' => array(array('_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'), null, null, null),
                    '/_profiler/phpinfo' => array(array('_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'), null, null, null),
                    '/_profiler/open' => array(array('_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'), null, null, null),
                );

                if (!isset($routes[$pathinfo])) {
                    break;
                }
                list($ret, $requiredHost, $requiredMethods, $requiredSchemes) = $routes[$pathinfo];

                $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                    if ($hasRequiredScheme) {
                        $allow += $requiredMethods;
                    }
                    break;
                }
                if (!$hasRequiredScheme) {
                    $allowSchemes += $requiredSchemes;
                    break;
                }

                return $ret;
        }

        $matchedPathinfo = $pathinfo;
        $regexList = array(
            0 => '{^(?'
                    .'|/admin/(?'
                        .'|([^/]++)(?'
                            .'|/edit(*:33)'
                            .'|(*:40)'
                        .')'
                        .'|user\\-management/([^/]++)(?'
                            .'|(*:76)'
                            .'|/edit(*:88)'
                            .'|(*:95)'
                        .')'
                    .')'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:135)'
                        .'|wdt/([^/]++)(*:155)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:201)'
                                .'|router(*:215)'
                                .'|exception(?'
                                    .'|(*:235)'
                                    .'|\\.css(*:248)'
                                .')'
                            .')'
                            .'|(*:258)'
                        .')'
                    .')'
                .')$}sD',
        );

        foreach ($regexList as $offset => $regex) {
            while (preg_match($regex, $matchedPathinfo, $matches)) {
                switch ($m = (int) $matches['MARK']) {
                    default:
                        $routes = array(
                            33 => array(array('_route' => 'user_edit', '_controller' => 'App\\Controller\\EditController::editAction'), array('id'), null, null),
                            40 => array(array('_route' => 'user_delete', '_controller' => 'App\\Controller\\EditController::deleteAction'), array('id'), null, null),
                            76 => array(array('_route' => 'user_info_show', '_controller' => 'App\\Controller\\UserInfoController::show'), array('id'), array('GET' => 0), null),
                            88 => array(array('_route' => 'user_info_edit', '_controller' => 'App\\Controller\\UserInfoController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null),
                            95 => array(array('_route' => 'user_info_delete', '_controller' => 'App\\Controller\\UserInfoController::delete'), array('id'), array('DELETE' => 0), null),
                            135 => array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null),
                            155 => array(array('_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'), array('token'), null, null),
                            201 => array(array('_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array('token'), null, null),
                            215 => array(array('_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'), array('token'), null, null),
                            235 => array(array('_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'), array('token'), null, null),
                            248 => array(array('_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'), array('token'), null, null),
                            258 => array(array('_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'), array('token'), null, null),
                        );

                        list($ret, $vars, $requiredMethods, $requiredSchemes) = $routes[$m];

                        foreach ($vars as $i => $v) {
                            if (isset($matches[1 + $i])) {
                                $ret[$v] = $matches[1 + $i];
                            }
                        }

                        $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                        if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                            if ($hasRequiredScheme) {
                                $allow += $requiredMethods;
                            }
                            break;
                        }
                        if (!$hasRequiredScheme) {
                            $allowSchemes += $requiredSchemes;
                            break;
                        }

                        return $ret;
                }

                if (258 === $m) {
                    break;
                }
                $regex = substr_replace($regex, 'F', $m - $offset, 1 + strlen($m));
                $offset += strlen($m);
            }
        }
        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        return null;
    }
}
