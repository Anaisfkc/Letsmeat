<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Controller\User;
use App\Form\ProfilType;
use App\Repository\ProfilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
     * @Route("/creer-profil", name="creerprofil", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $profil = new Profil();
        $user = $this->getUser();
        $form = $this->createForm (ProfilType::class, $profil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profil->getUser();
            $em = $this->getDoctrine()->getManager();
            $em->persist($profil);
            $em->flush();

            $data = $form->getData();

            return new RedirectResponse($this->generateUrl('voiruser'));
        }

        return $this->render('profil/creerprofil.html.twig', [
            'profil' => $profil,
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/voir-profil", name="voirprofil", methods="GET")
     */
    public function show(Profil $profil): Response
    {
        return $this->render('profil/voirprofil.html.twig', ['profil' => $profil]);
    }

    /**
     * @Route("/modifier-profil", name="modifprofil", methods="GET|POST")
     */
    public function edit(Request $request, Profil $profil): Response
    {
        $form = $this->createForm(ProfilType::class, $profil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('voirprofil', ['id' => $profil->getId()]);
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
