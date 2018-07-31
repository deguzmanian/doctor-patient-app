<?php

namespace App\Controller;

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
	    $doctor = new PatientRecord();
        $form = $this->createForm(PatientRecordType::class, $doctor);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($doctor);
            $em->flush();

            return $this->redirectToRoute('doctor-home');
        }

        $patients = $this->getDoctrine()
            ->getRepository(Patient::class)
            ->findAll();

        return $this->render('doctor/add_diagnosis.html.twig', [
            'doctor' => $doctor,
            'form' => $form->createView(),
            'patients' => $patients,
        ]);
    }
}