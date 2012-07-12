<?php

namespace Jonaguera\AulaMentor\AlimentosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Jonaguera\AulaMentor\AlimentosBundle\Model\Model;
use Jonaguera\AulaMentor\AlimentosBundle\Config\Config;

class DefaultController extends Controller {

    public function indexAction() {
        $params = array(
            'mensaje' => 'Bienvenido al curso de Symfony2',
            'fecha' => date('d/m/Y'),
        );
        return $this->render('JonagueraAulaMentorAlimentosBundle:Default:index.html.twig', $params);
    }

    public function inicioAction() {
        $params = array(
            'mensaje' => 'Bienvenido al curso de Symfony2',
            'fecha' => date('d-m-yyy'),
        );
        require __DIR__ . '/templates/inicio.php';
    }

    public function listarAction() {
        $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                        Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

        $params = array(
            'alimentos' => $m->dameAlimentos(),
        );

        return $this->render('JonagueraAulaMentorAlimentosBundle:Default:mostrarAlimentos.html.twig', $params);
    }

    public function insertarAction() {
        $params = array(
            'nombre' => '',
            'energia' => '',
            'proteina' => '',
            'hc' => '',
            'fibra' => '',
            'grasa' => '',
        );

        $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                        Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // comprobar campos formulario
            if ($m->validarDatos($_POST['nombre'], $_POST['energia'], $_POST['proteina'], $_POST['hc'], $_POST['fibra'], $_POST['grasa'])) {
                $m->insertarAlimento($_POST['nombre'], $_POST['energia'], $_POST['proteina'], $_POST['hc'], $_POST['fibra'], $_POST['grasa']);
                header('Location: index.php?ctl=listar');
            } else {
                $params = array(
                    'nombre' => $_POST['nombre'],
                    'energia' => $_POST['energia'],
                    'proteina' => $_POST['proteina'],
                    'hc' => $_POST['hc'],
                    'fibra' => $_POST['fibra'],
                    'grasa' => $_POST['grasa'],
                );
                $params['mensaje'] = 'No se ha podido insertar el alimento. Revisa el formulario';
            }
        }

        return $this->render('JonagueraAulaMentorAlimentosBundle:Default:formInsertar.html.twig', $params);
    }

    public function buscarPorNombreAction() {
        $params = array(
            'nombre' => '',
            'resultado' => array(),
        );

        $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                        Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params['nombre'] = $_POST['nombre'];
            $params['resultado'] = $m->buscarAlimentosPorNombre($_POST['nombre']);
        }

        return $this->render('JonagueraAulaMentorAlimentosBundle:Default:buscarPorNombre.html.twig', $params);
    }

    public function busquedaCombinadaAction() {
        $params = array(
            'energia_min' => '',
            'energia_max' => '',
            'proteina_min' => '',
            'proteina_max' => '',
            'hidratocarbono_min' => '',
            'hidratocarbono_max' => '',
            'fibra_min' => '',
            'fibra_max' => '',
            'grasatotal_min' => '',
            'grasatotal_max' => '',
            'resultado' => array(),
        );

        $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                        Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params['nombre'] = $_POST['nombre'];
            $params['resultado'] = $m->busquedaCombinada(array(
                'energia_min' => $_POST['energia_min'],
                'energia_max' => $_POST['energia_max'],
                'proteina_min' => $_POST['proteina_min'],
                'proteina_max' => $_POST['proteina_max'],
                'hidratocarbono_min' => $_POST['hidratocarbono_min'],
                'hidratocarbono_max' => $_POST['hidratocarbono_max'],
                'fibra_min' => $_POST['fibra_min'],
                'fibra_max' => $_POST['fibra_max'],
                'grasatotal_min' => $_POST['grasatotal_min'],
                'grasatotal_max' => $_POST['grasatotal_max']
                    )
            );
        }

        return $this->render('JonagueraAulaMentorAlimentosBundle:Default:busquedaCombinada.html.twig', $params);
    }

    public function verAction($id) {

        $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                        Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

        $alimento = $m->dameAlimento($id);

        if (!$alimento) {
            throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
        }
        
        $params = $alimento;

        return $this->render('JonagueraAulaMentorAlimentosBundle:Default:verAlimento.html.twig', $params);
    }

}
