<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Doctor;
use App\Entity\Patient;
use App\Entity\UserInfo;

use App\Form\DoctorType;
use App\Form\EditPatientType;
use App\Form\UserInfoType;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class EditPatientController extends Controller
{
    /**
     * Displays a form to edit an existing user entity.
     *
     * @Route("/admin/{id}/edit-patient-profile", name="patient_edit_profile")
     * @Method({"GET", "POST"})
     */
    public function editpatientAction(Request $request, UserInfo $patient)
    {
        $deleteForm = $this->createDeleteForm($patient);
        $editForm = $this->createForm('App\Form\EditPatientType', $patient);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profile_show', array('id' => $patient->getId()));
        }

        return $this->render('admin/edit_patient_profile.html.twig', array(
            'patient' => $patient,
            'edit_patient_form' => $editForm->createView(),
            'delete_patient_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a user entity.
     *
     * @Route("/admin/{id}", name="user_delete_patient")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, UserInfo $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UserInfo $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete_profile', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}