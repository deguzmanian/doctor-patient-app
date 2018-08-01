<?php

namespace App\Controller;

use App\Entity\Doctor;
use App\Entity\Patient;
use App\Entity\PatientRecord;

use App\Form\PatientRecordType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DoctorController extends Controller
{
   	/**
     * @Route("/doctor/homepage", name="doctor-home")
     */
    public function index()
    {
    	$patients = $this->getDoctrine()
            ->getRepository(Patient::class)
            ->findAll();
        return $this->render('doctor/index.html.twig', [
            'patients' => $patients
        ]);
    }
    /**
     * @Route("/doctor/addDiagnosis", name="add_diagnosis")
     */
    public function add(Request $request)
    {	
	    $records = new PatientRecord();
        $form = $this->createForm(PatientRecordType::class, $records);
        $form->handleRequest($request);
        
		$doctor = $this->getDoctrine()
            ->getRepository(Doctor::class)
            ->find(1);
        $patient = $this->getDoctrine()
            ->getRepository(Patient::class)
            ->findAll();
        // $patientUserInfo = $patient->getUserInfo();
        if ($form->isSubmitted() && $form->isValid()) {
            $records = $form->getData();
            $records->setPatient($patient);
            $records->setDoctor($doctor);
            $em = $this->getDoctrine()->getManager();
            $em->persist($records);
            $em->flush();
            return $this->redirectToRoute('doctor-home');
        }

        $patients = $this->getDoctrine()
            ->getRepository(Patient::class)
            ->findAll();

        return $this->render('doctor/add_diagnosis.html.twig', [
            'records' => $records,
            'form' => $form->createView(),
            'patients' => $patients,
        ]);
    }
}