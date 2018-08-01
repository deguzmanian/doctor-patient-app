<?php

namespace App\Controller;

use App\Entity\UserInfo;
use App\Entity\AccreditationInfo;
use App\Form\UserInfoType;
use App\Repository\UserInfoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/user-management")
 */
class UserInfoController extends Controller
{
    /**
     * @Route("/", name="user_info_index", methods="GET")
     */
    public function index(UserInfoRepository $userInfoRepository): Response
    {
        return $this->render('user_info/index.html.twig', ['user_infos' => $userInfoRepository->findAll()]);
    }

    /**
     * @Route("/add-doctor", name="user_info_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {   
        $userInfo = new UserInfo();
        $form = $this->createForm(UserInfoType::class, $userInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($userInfo);
            $em->flush();

            return $this->redirectToRoute('user_info_index');
        }

        return $this->render('user_info/new.html.twig', [
            'user_info' => $userInfo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/user-profile/{id}", name="user_info_show", methods="GET")
     */
    public function show(UserInfo $userInfo): Response
    {   $accreInfo = new AccreditationInfo; 
        return $this->render('user_info/show.html.twig', ['user_info' => $userInfo, 'accreditationinfo' => $accreInfo]);
    }

    /**
     * @Route("/{id}/edit", name="user_info_edit", methods="GET|POST")
     */
    public function edit(Request $request, UserInfo $userInfo): Response
    {
        $form = $this->createForm(UserInfoType::class, $userInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_info_edit', ['id' => $userInfo->getId()]);
        }

        return $this->render('user_info/edit.html.twig', [
            'user_info' => $userInfo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_info_delete", methods="DELETE")
     */
    public function delete(Request $request, UserInfo $userInfo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userInfo->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($userInfo);
            $em->flush();
        }

        return $this->redirectToRoute('user_info_index');
    }
}
