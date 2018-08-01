<?php

namespace App\Controller;

//entity
use App\Entity\User;
use App\Entity\Patient;
use App\Entity\Doctor;
use App\Entity\UserInfo;
use App\Entity\DiagnosisCategory;
use App\Entity\AccreditationInfo;
use App\Entity\Clinic;

// form
use App\Form\UserType;
use App\Form\PatientType;
use App\Form\DoctorType;
use App\Form\UserInfoType;
use App\Form\DiagnosisCategoryType;
use App\Form\AccreditationInfoType;
use App\Form\ClinicType;

// repository
use App\Repository\UserInfoRepository;
use App\Repository\UserRepository;
use App\Repository\AccreditationInfoRepository;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig');
    }
    /**
     * @Route("/admin/doctor-add", name="doctor")
     */
    public function newdoctor(Request $request)
    {
        $doctor = new Doctor();
        $form = $this->createForm(DoctorType::class, $doctor);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $password = $this->get('security.password_encoder')
                ->encodePassword($doctor, $doctor->getPlainPassword());
            $doctor->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($doctor);
            $em->flush();

            return $this->redirectToRoute('doctor_list');
        }

        return $this->render('admin/add-doctor.html.twig', [
            'doctor' => $doctor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/patient-add", name="patient-add")
     */
    public function newpatient(Request $request)
    {
        $patient = new Patient();
        $form = $this->createForm(PatientType::class, $patient);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
        	$password = $this->get('security.password_encoder')
                ->encodePassword($patient, $patient->getPlainPassword());
            $patient->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($patient);
            $em->flush();

            return $this->redirectToRoute('patient_list');
        }

        return $this->render('admin/add-patient.html.twig', [
            'patient' => $patient,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/adddiagnosiscategory", name="add_diagnosis_category")
     */
    public function addDiagnosisCategory(Request $request)
    {
        $diagnosisCategory = new DiagnosisCategory();
        $form = $this->createForm(DiagnosisCategoryType::class, $diagnosisCategory);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $diagnosisCategory = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($diagnosisCategory);
            $entityManager->flush();
            return $this->redirectToRoute('diagnosis_categories');
        }
        return $this->render('admin/addDiagnosisCategory.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/addclinic", name="add_clinic")
     */
    public function addClinic(Request $request)
    {
        $clinic = new Clinic();
        $form = $this->createForm(ClinicType::class, $clinic);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $clinic = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clinic);
            $entityManager->flush();

            $this->addFlash('success', 'Clinic Added!');

            return $this->redirectToRoute('add_clinic');
        }
        return $this->render('/admin/addClinic.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // display list

    /**
     * @Route("/admin/clinic-list", name="clinic_list")
     */
    public function listClinics()
    {
        $clinics = $this->getDoctrine()
            ->getRepository(Clinic::class)
            ->findAll();
        return $this->render('admin/cliniclist.html.twig', [
            'clinics' => $clinics
        ]);
    }

    // delete_clinic

    /**
     * @Route("/{id}", name="clinic_delete", methods="DELETE")
     */
    public function delete(Request $request, Clinic $clinic): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clinic->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($clinic);
            $em->flush();
        }

        return $this->redirectToRoute('clinic_list');
    }

    // category_delete

    /**
     * @Route("/delete/{id}", name="category_delete", methods="DELETE")
     */
    public function deleteCategory(Request $request, DiagnosisCategory $diagnosis): Response
    {
        if ($this->isCsrfTokenValid('delete'.$diagnosis->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($diagnosis);
            $em->flush();
        }

        return $this->redirectToRoute('diagnosis_categories');
    }

    /**
     * @Route("/admin/patients-list", name="patient_list")
     */
    public function listPatients()
    {
        $patients = $this->getDoctrine()
            ->getRepository(Patient::class)
            ->findAll();
        return $this->render('admin/patientlist.html.twig', [
            'patients' => $patients
        ]);
    }
    /**
     * @Route("/admin/doctors-list", name="doctor_list")
     */
    public function listDoctors()
    {
        $doctors = $this->getDoctrine()
            ->getRepository(Doctor::class)
            ->findAll();
        // var_dump($doctors);die;
        return $this->render('admin/doctorlist.html.twig', [
                'doctors' => $doctors,
        ]);
    }
    /**
     * @Route("/admin/diagnosiscategories", name="diagnosis_categories")
     */
    public function listDiagnosisCategories()
    {
        $diagnosisCategories = $this->getDoctrine()
            ->getRepository(DiagnosisCategory::class)
            ->findAll();
        return $this->render('admin/categorylist.html.twig', [
                'diagnosiscategories' => $diagnosisCategories,
        ]);
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     * @Route("/admin/{id}/edit", name="user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('App\Form\DiagnosisCategoryType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }

        return $this->render('admin/edit_category.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'data_class' => DiagnosisCategoryType::class,
        ));
    }

    // SHOW PATIENT

    /**
     * @Route("/{id}", name="profile_show", methods="GET")
     */
    public function show(UserInfo $userInfo): Response
    {   $accreInfo = new AccreditationInfo; 
        return $this->render('admin/show_patient.html.twig', ['user_info' => $userInfo]);
    }
}