<?php

namespace App\Controller;

use App\Entity\Patient;

use App\Form\PatientType;

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
        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
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
