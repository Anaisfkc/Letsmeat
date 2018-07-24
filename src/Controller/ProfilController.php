<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Entity\User;
use App\Form\ProfilType;
use App\Repository\ProfilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/profil")
 */

class ProfilController extends Controller
{

    /**
     * @Route("/", name="profil_index", methods="GET")
     */
    public function index(ProfilRepository $profilRepository): Response
    {
        return $this->render('profil/index.html.twig', ['profils' => $profilRepository->findAll()]);
    }


    /**
     * @Route("/user/voir-user/{user_id}", name = "voir-user")
     * @ParamConverter("user", options={"id" = "user_id"})
     * @Method("GET")
     */
    /**
     * @Route("/creer-profil", name="creer-profil", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $profil = new Profil();
        $user_id = $this->getUser();
        $form = $this->createForm (ProfilType::class, $profil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($profil);
            $em->flush();

            $data = $form->getData();

            return $this->redirectToRoute('voir-user');
        }

        return $this->render('profil/creerprofil.html.twig', [
            'profil' => $profil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/voir-profil", name="voir-profil", methods="GET")
     */
    public function show(Profil $profil): Response
    {
        return $this->render('profil/voir-profil.html.twig', ['profil' => $profil]);
    }

    /**
     * @Route("/modifier-profil", name="modif-profil", methods="GET|POST")
     */
    public function edit(Request $request, Profil $profil): Response
    {
        $form = $this->createForm(ProfilType::class, $profil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('voir-profil', ['id' => $profil->getId()]);
        }

        return $this->render('profil/modifprofil.html.twig', [
            'profil' => $profil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/supprimer-mon-profil", name="supp-profil", methods="DELETE")
     */
    public function delete(Request $request, Profil $profil): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profil->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($profil);
            $em->flush();
        }

        return $this->redirectToRoute('accueil');
    }

}
