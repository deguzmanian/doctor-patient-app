<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Form\UserInfo;
use App\Form\PatientType;
use App\Form\UserInfoType;
use App\Repository\UserInfoRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatientController extends Controller
{
    /**
     * @Route("/patient", name="patient")
     */
    public function index()
    {
        return $this->render('patient/view_history.html.twig', [
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
