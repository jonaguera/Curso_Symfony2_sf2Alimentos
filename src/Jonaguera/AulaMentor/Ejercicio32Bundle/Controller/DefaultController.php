<?php

namespace Jonaguera\AulaMentor\Ejercicio32Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return new \Symfony\Component\HttpFoundation\Response('Hola Caracola');
    }
}
