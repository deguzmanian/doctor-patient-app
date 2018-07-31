<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClinicController extends Controller
{
    /**
     * @Route("/admin/clinic/{clinicId}", name="view_clinic")
     */
    public function viewClinic($clinicId)
    {
        $clinic = $this->getDoctrine()
            ->getRepository(Clinic::class)
            ->find($clinicId);
        $doctors = $clinic->getDoctors();
        return $this->render('clinic/clinicinfo.html.twig', [
            'clinic' => $clinic,
            'doctors' => $doctors,
        ]);
    }
}
