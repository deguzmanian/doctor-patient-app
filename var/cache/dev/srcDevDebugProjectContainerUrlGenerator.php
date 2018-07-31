<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;
    private $defaultLocale;

    public function __construct(RequestContext $context, LoggerInterface $logger = null, string $defaultLocale = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        'admin' => array(array(), array('_controller' => 'App\\Controller\\AdminController::index'), array(), array(array('text', '/admin')), array(), array()),
        'doctor' => array(array(), array('_controller' => 'App\\Controller\\AdminController::newdoctor'), array(), array(array('text', '/admin/doctor-add')), array(), array()),
        'patient-add' => array(array(), array('_controller' => 'App\\Controller\\AdminController::newpatient'), array(), array(array('text', '/admin/patient-add')), array(), array()),
        'add_diagnosis_category' => array(array(), array('_controller' => 'App\\Controller\\AdminController::addDiagnosisCategory'), array(), array(array('text', '/admin/adddiagnosiscategory')), array(), array()),
        'add_clinic' => array(array(), array('_controller' => 'App\\Controller\\AdminController::addClinic'), array(), array(array('text', '/admin/addclinic')), array(), array()),
        'clinic_list' => array(array(), array('_controller' => 'App\\Controller\\AdminController::listClinics'), array(), array(array('text', '/admin/clinic-list')), array(), array()),
        'clinic_delete' => array(array('id'), array('_controller' => 'App\\Controller\\AdminController::delete'), array(), array(array('variable', '/', '[^/]++', 'id')), array(), array()),
        'patient_list' => array(array(), array('_controller' => 'App\\Controller\\AdminController::listPatients'), array(), array(array('text', '/admin/patients-list')), array(), array()),
        'doctor_list' => array(array(), array('_controller' => 'App\\Controller\\AdminController::listDoctors'), array(), array(array('text', '/admin/doctors-list')), array(), array()),
        'diagnosis_categories' => array(array(), array('_controller' => 'App\\Controller\\AdminController::listDiagnosisCategories'), array(), array(array('text', '/admin/diagnosiscategories')), array(), array()),
        'view_clinic' => array(array('clinicId'), array('_controller' => 'App\\Controller\\ClinicController::viewClinic'), array(), array(array('variable', '/', '[^/]++', 'clinicId'), array('text', '/admin/clinic')), array(), array()),
        'doctor-home' => array(array(), array('_controller' => 'App\\Controller\\DoctorController::index'), array(), array(array('text', '/doctor/homepage')), array(), array()),
        'add_diagnosis' => array(array(), array('_controller' => 'App\\Controller\\DoctorController::add'), array(), array(array('text', '/doctor/addDiagnosis')), array(), array()),
        'user_edit' => array(array('id'), array('_controller' => 'App\\Controller\\EditController::editAction'), array(), array(array('text', '/edit'), array('variable', '/', '[^/]++', 'id'), array('text', '/admin')), array(), array()),
        'user_delete' => array(array('id'), array('_controller' => 'App\\Controller\\EditController::deleteAction'), array(), array(array('variable', '/', '[^/]++', 'id'), array('text', '/admin')), array(), array()),
        'patient_edit_profile' => array(array('id'), array('_controller' => 'App\\Controller\\EditPatientController::editpatientAction'), array(), array(array('text', '/edit-patient-profile'), array('variable', '/', '[^/]++', 'id'), array('text', '/admin')), array(), array()),
        'user_delete_patient' => array(array('id'), array('_controller' => 'App\\Controller\\EditPatientController::deleteAction'), array(), array(array('variable', '/', '[^/]++', 'id'), array('text', '/admin')), array(), array()),
        'user_profile_show' => array(array('id'), array('_controller' => 'App\\Controller\\EditProfileController::showAction'), array(), array(array('variable', '/', '[^/]++', 'id'), array('text', '/admin/user_profile')), array(), array()),
        'user_edit_profile' => array(array('id'), array('_controller' => 'App\\Controller\\EditProfileController::editAction'), array(), array(array('text', '/edit-profile'), array('variable', '/', '[^/]++', 'id'), array('text', '/admin')), array(), array()),
        'user_delete_profile' => array(array('id'), array('_controller' => 'App\\Controller\\EditProfileController::deleteAction'), array(), array(array('variable', '/', '[^/]++', 'id'), array('text', '/admin')), array(), array()),
        'login' => array(array(), array('_controller' => 'App\\Controller\\LoginController::login'), array(), array(array('text', '/login')), array(), array()),
        'logout' => array(array(), array('_controller' => 'App\\Controller\\LoginController::logoutAction'), array(), array(array('text', '/logout')), array(), array()),
        'home' => array(array(), array('_controller' => 'App\\Controller\\PatientController::index'), array(), array(array('text', '/patient/homepage')), array(), array()),
        'view' => array(array(), array('_controller' => 'App\\Controller\\PatientController::detailsAction'), array(), array(array('text', '/patient/view')), array(), array()),
        'user_info_index' => array(array(), array('_controller' => 'App\\Controller\\UserInfoController::index'), array(), array(array('text', '/admin/user-management/')), array(), array()),
        'user_info_new' => array(array(), array('_controller' => 'App\\Controller\\UserInfoController::new'), array(), array(array('text', '/admin/user-management/add-doctor')), array(), array()),
        'user_info_show' => array(array('id'), array('_controller' => 'App\\Controller\\UserInfoController::show'), array(), array(array('variable', '/', '[^/]++', 'id'), array('text', '/admin/user-management')), array(), array()),
        'user_info_edit' => array(array('id'), array('_controller' => 'App\\Controller\\UserInfoController::edit'), array(), array(array('text', '/edit'), array('variable', '/', '[^/]++', 'id'), array('text', '/admin/user-management')), array(), array()),
        'user_info_delete' => array(array('id'), array('_controller' => 'App\\Controller\\UserInfoController::delete'), array(), array(array('variable', '/', '[^/]++', 'id'), array('text', '/admin/user-management')), array(), array()),
        '_twig_error_test' => array(array('code', '_format'), array('_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code' => '\\d+'), array(array('variable', '.', '[^/]++', '_format'), array('variable', '/', '\\d+', 'code'), array('text', '/_error')), array(), array()),
        '_wdt' => array(array('token'), array('_controller' => 'web_profiler.controller.profiler::toolbarAction'), array(), array(array('variable', '/', '[^/]++', 'token'), array('text', '/_wdt')), array(), array()),
        '_profiler_home' => array(array(), array('_controller' => 'web_profiler.controller.profiler::homeAction'), array(), array(array('text', '/_profiler/')), array(), array()),
        '_profiler_search' => array(array(), array('_controller' => 'web_profiler.controller.profiler::searchAction'), array(), array(array('text', '/_profiler/search')), array(), array()),
        '_profiler_search_bar' => array(array(), array('_controller' => 'web_profiler.controller.profiler::searchBarAction'), array(), array(array('text', '/_profiler/search_bar')), array(), array()),
        '_profiler_phpinfo' => array(array(), array('_controller' => 'web_profiler.controller.profiler::phpinfoAction'), array(), array(array('text', '/_profiler/phpinfo')), array(), array()),
        '_profiler_search_results' => array(array('token'), array('_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array(), array(array('text', '/search/results'), array('variable', '/', '[^/]++', 'token'), array('text', '/_profiler')), array(), array()),
        '_profiler_open_file' => array(array(), array('_controller' => 'web_profiler.controller.profiler::openAction'), array(), array(array('text', '/_profiler/open')), array(), array()),
        '_profiler' => array(array('token'), array('_controller' => 'web_profiler.controller.profiler::panelAction'), array(), array(array('variable', '/', '[^/]++', 'token'), array('text', '/_profiler')), array(), array()),
        '_profiler_router' => array(array('token'), array('_controller' => 'web_profiler.controller.router::panelAction'), array(), array(array('text', '/router'), array('variable', '/', '[^/]++', 'token'), array('text', '/_profiler')), array(), array()),
        '_profiler_exception' => array(array('token'), array('_controller' => 'web_profiler.controller.exception::showAction'), array(), array(array('text', '/exception'), array('variable', '/', '[^/]++', 'token'), array('text', '/_profiler')), array(), array()),
        '_profiler_exception_css' => array(array('token'), array('_controller' => 'web_profiler.controller.exception::cssAction'), array(), array(array('text', '/exception.css'), array('variable', '/', '[^/]++', 'token'), array('text', '/_profiler')), array(), array()),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        $locale = $parameters['_locale']
            ?? $this->context->getParameter('_locale')
            ?: $this->defaultLocale;

        if (null !== $locale && (self::$declaredRoutes[$name.'.'.$locale][1]['_canonical_route'] ?? null) === $name) {
            unset($parameters['_locale']);
            $name .= '.'.$locale;
        } elseif (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
