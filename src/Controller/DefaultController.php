<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/", name="accueil")
     */
    public function accueil() {
        return $this->render('default/accueil.html.twig');
    }

    /**
     * @Route("/cgu", name="cgu")
     */
    public function cgu() {
        return $this->render('default/cgu.html.twig');
    }

    /**
     * @Route("/concept", name="concept")
     */
    public function concept() {
        return $this->render('default/concept.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact() {
        return $this->render('default/contact.html.twig');
    }

    /**
     * @Route("/politique-confidentialite", name="politiqueconfidential")
     */
    public function politiqueconfidential() {
        return $this->render('default/politiqueconfidential.html.twig');
    }
}