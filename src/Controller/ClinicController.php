<?php

namespace App\Controller;

use App\Entity\Clinic;
use App\Repository\ClinicRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClinicController extends Controller
{
    /**
     * @Route("/admin/clinic/{id}", name="clinic_info_show", methods="GET")
     */
    public function show(Clinic $clinic): Response
    {   
        return $this->render('admin/clinic_info.html.twig', ['clinic_info' => $clinic]);
    }
}
