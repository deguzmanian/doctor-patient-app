<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Doctor;
use App\Entity\AccreditationInfo;
use App\Entity\UserInfo;

use App\Form\DoctorType;
use App\Form\UserInfoType;
use App\Form\AccreditationInfoType;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class EditProfileController extends Controller
{
    /**
     * Finds and displays a user entity.
     *
     * @Route("/admin/user_profile/{id}", name="user_profile_show")
     * @Method("GET")
     */
    public function showAction(Doctor $user)
    {
        $user = $this->getDoctrine()
            ->getRepository(Doctor::class)
            ->findAll();
        return $this->render('admin/user_profile.html.twig', [
            'doctor' => $user]);
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     * @Route("/admin/{id}/edit-profile", name="user_edit_profile")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Doctor $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('App\Form\DoctorType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit_profile', array('id' => $user->getId()));
        }

        return $this->render('admin/edit_profile.html.twig', array(
            'user' => $user,
            'edit_profile_form' => $editForm->createView(),
            'delete_profile_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     * @Route("/admin/{id}", name="user_delete_profile")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Doctor $user)
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
    private function createDeleteForm(Doctor $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete_profile', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
