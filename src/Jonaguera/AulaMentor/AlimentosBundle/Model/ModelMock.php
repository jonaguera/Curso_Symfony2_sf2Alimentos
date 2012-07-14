<?php

  namespace Jonaguera\AulaMentor\AlimentosBundle\Model;

  class ModelMock
  {
      protected $conexion;

      public function __construct($dbname,$dbuser,$dbpass,$dbhost)
      {

      }

      public function dameAlimentos()
      {
          $alimentos = array(
              array(
                  'id' => 1,
                  'nombre' => 'pera',
                  'energia' => '90',
                  'proteina' => '80',
                  'hidratocarbono' => '78',
                  'fibra' => '89',
                  'grasatotal' => '98',
              ),
              array(
                  'id' => 2,
                  'nombre' => 'manzana',
                  'energia' => '94',
                  'proteina' => '60',
                  'hidratocarbono' => '38',
                  'fibra' => '83',
                  'grasatotal' => '48',
              ),
          );


          return $alimentos;
      }

      public function buscarAlimentosPorNombre($nombre)
      {
          return $this->dameAlimentos();
      }

      public function dameAlimento($id)
      {
         $alimento = array(
             'id' => 1,
             'nombre' => 'manzana',
             'energia' => '94',
             'proteina' => '60',
             'hidratocarbono' => '38',
             'fibra' => '83',
             'grasatotal' => '48',
         );

          return $alimento;

      }

      public function insertarAlimento($n, $e, $p, $hc, $f, $g)
      {
      }

  }