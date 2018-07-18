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

    public function accueil() {
        return $this->render('default/accueil.html.twig');
    }

    public function concept() {
        return $this->render('default/concept.html.twig');
    }

    public function proporeserv() {
        return $this->render('default/proporeserv.html.twig');
    }

    public function profil() {
        return $this->render('default/profil.html.twig');
    }

    public function amis() {
        return $this->render('default/amis.html.twig');
    }

    public function contact() {
        return $this->render('default/contact.html.twig');
    }
}
