<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DoctorController extends Controller
{
   	/**
     * @Route("/doctor/homepage", name="doctor-home")
     */
    public function index()
    {
        return $this->render('doctor/index.html.twig');
    }
}