<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Form\ProfilType;
use App\Repository\ProfilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     * @Route("/new", name="profil_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $profil = new Profil();
        $form = $this->createForm(ProfilType::class, $profil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($profil);
            $em->flush();

            return $this->redirectToRoute('profil_index');
        }

        return $this->render('creerprofil.html.twig', [
            'profil' => $profil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="profil_show", methods="GET")
     */
    public function show(Profil $profil): Response
    {
        return $this->render('profil/show.html.twig', ['profil' => $profil]);
    }

    /**
     * @Route("/{id}/edit", name="profil_edit", methods="GET|POST")
     */
    public function edit(Request $request, Profil $profil): Response
    {
        $form = $this->createForm(ProfilType::class, $profil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profil_edit', ['id' => $profil->getId()]);
        }

        return $this->render('profil/edit.html.twig', [
            'profil' => $profil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="profil_delete", methods="DELETE")
     */
    public function delete(Request $request, Profil $profil): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profil->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($profil);
            $em->flush();
        }

        return $this->redirectToRoute('profil_index');
    }
}
