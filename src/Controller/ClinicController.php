<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClinicController extends Controller
{
    /**
     * @Route("/admin/manage-clinic", name="")
     */
    public function index()
    {
        return $this->render('clinic/manage_clinic.html.twig');
    }
}
