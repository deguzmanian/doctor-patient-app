<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\PatientRecord;

use App\Form\PatientType;
use App\Form\PatientRecordType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatientController extends Controller
{   
    /**
     * @Route("/patient/homepage", name="home")
     */
    public function index()
    {
        $records = $this->getDoctrine()
            ->getRepository(PatientRecord::class)
            ->findAll();

        return $this->render('patient/index.html.twig', [
            'records' => $records,
        ]);
    }
    /**
     * @Route("/patient/view", name="view")
     */
    public function detailsAction()
    {   
        return $this->render('patient/view_details.html.twig');
    }
}
