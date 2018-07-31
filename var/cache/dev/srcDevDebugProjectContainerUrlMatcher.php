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
                    '/admin' => array(array('_route' => 'admin', '_controller' => 'App\\Controller\\AdminController::index'), null, null, null),
                    '/admin/doctor-add' => array(array('_route' => 'doctor', '_controller' => 'App\\Controller\\AdminController::newdoctor'), null, null, null),
                    '/admin/patient-add' => array(array('_route' => 'patient-add', '_controller' => 'App\\Controller\\AdminController::newpatient'), null, null, null),
                    '/admin/adddiagnosiscategory' => array(array('_route' => 'add_diagnosis_category', '_controller' => 'App\\Controller\\AdminController::addDiagnosisCategory'), null, null, null),
                    '/admin/addclinic' => array(array('_route' => 'add_clinic', '_controller' => 'App\\Controller\\AdminController::addClinic'), null, null, null),
                    '/admin/clinic-list' => array(array('_route' => 'clinic_list', '_controller' => 'App\\Controller\\AdminController::listClinics'), null, null, null),
                    '/admin/patients-list' => array(array('_route' => 'patient_list', '_controller' => 'App\\Controller\\AdminController::listPatients'), null, null, null),
                    '/admin/doctors-list' => array(array('_route' => 'doctor_list', '_controller' => 'App\\Controller\\AdminController::listDoctors'), null, null, null),
                    '/admin/diagnosiscategories' => array(array('_route' => 'diagnosis_categories', '_controller' => 'App\\Controller\\AdminController::listDiagnosisCategories'), null, null, null),
                    '/doctor/homepage' => array(array('_route' => 'doctor-home', '_controller' => 'App\\Controller\\DoctorController::index'), null, null, null),
                    '/doctor/addDiagnosis' => array(array('_route' => 'add_diagnosis', '_controller' => 'App\\Controller\\DoctorController::add'), null, null, null),
                    '/patient/homepage' => array(array('_route' => 'home', '_controller' => 'App\\Controller\\PatientController::index'), null, null, null),
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
                    .'|/([^/]++)(*:16)'
                    .'|/admin/(?'
                        .'|clinic/([^/]++)(*:48)'
                        .'|([^/]++)(?'
                            .'|/edit(?'
                                .'|(*:74)'
                                .'|\\-patient\\-profile(*:99)'
                            .')'
                            .'|(*:107)'
                        .')'
                        .'|user_profile/([^/]++)(*:137)'
                        .'|([^/]++)(?'
                            .'|/edit\\-profile(*:170)'
                            .'|(*:178)'
                        .')'
                        .'|user\\-management/([^/]++)(?'
                            .'|(*:215)'
                            .'|/edit(*:228)'
                            .'|(*:236)'
                        .')'
                    .')'
                    .'|/login(*:252)'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:291)'
                        .'|wdt/([^/]++)(*:311)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:357)'
                                .'|router(*:371)'
                                .'|exception(?'
                                    .'|(*:391)'
                                    .'|\\.css(*:404)'
                                .')'
                            .')'
                            .'|(*:414)'
                        .')'
                    .')'
                .')$}sD',
        );

        foreach ($regexList as $offset => $regex) {
            while (preg_match($regex, $matchedPathinfo, $matches)) {
                switch ($m = (int) $matches['MARK']) {
                    case 107:
                        $matches = array('id' => $matches[1] ?? null);

                        // user_delete
                        return $this->mergeDefaults(array('_route' => 'user_delete') + $matches, array('_controller' => 'App\\Controller\\EditController::deleteAction'));

                        // user_delete_patient
                        return $this->mergeDefaults(array('_route' => 'user_delete_patient') + $matches, array('_controller' => 'App\\Controller\\EditPatientController::deleteAction'));

                        break;
                    default:
                        $routes = array(
                            16 => array(array('_route' => 'clinic_delete', '_controller' => 'App\\Controller\\AdminController::delete'), array('id'), array('DELETE' => 0), null),
                            48 => array(array('_route' => 'view_clinic', '_controller' => 'App\\Controller\\ClinicController::viewClinic'), array('clinicId'), null, null),
                            74 => array(array('_route' => 'user_edit', '_controller' => 'App\\Controller\\EditController::editAction'), array('id'), null, null),
                            99 => array(array('_route' => 'patient_edit_profile', '_controller' => 'App\\Controller\\EditPatientController::editpatientAction'), array('id'), null, null),
                            137 => array(array('_route' => 'user_profile_show', '_controller' => 'App\\Controller\\EditProfileController::showAction'), array('id'), null, null),
                            170 => array(array('_route' => 'user_edit_profile', '_controller' => 'App\\Controller\\EditProfileController::editAction'), array('id'), null, null),
                            178 => array(array('_route' => 'user_delete_profile', '_controller' => 'App\\Controller\\EditProfileController::deleteAction'), array('id'), null, null),
                            215 => array(array('_route' => 'user_info_show', '_controller' => 'App\\Controller\\UserInfoController::show'), array('id'), array('GET' => 0), null),
                            228 => array(array('_route' => 'user_info_edit', '_controller' => 'App\\Controller\\UserInfoController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null),
                            236 => array(array('_route' => 'user_info_delete', '_controller' => 'App\\Controller\\UserInfoController::delete'), array('id'), array('DELETE' => 0), null),
                            252 => array(array('_route' => 'login', '_controller' => 'App\\Controller\\LoginController::login'), array(), null, null),
                            291 => array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null),
                            311 => array(array('_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'), array('token'), null, null),
                            357 => array(array('_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array('token'), null, null),
                            371 => array(array('_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'), array('token'), null, null),
                            391 => array(array('_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'), array('token'), null, null),
                            404 => array(array('_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'), array('token'), null, null),
                            414 => array(array('_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'), array('token'), null, null),
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

                if (414 === $m) {
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
