<?php

namespace Jonaguera\AulaMentor\Ejercicio32Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction($name) {
        //return new \Symfony\Component\HttpFoundation\Response('Hola Caracola');
        return $this->render('JonagueraAulaMentorEjercicio32Bundle:Default:index.html.twig', array('name' => $name));
    }

    public function holaAction() {
        return new \Symfony\Component\HttpFoundation\Response('Hola Caracola');
    }

}
