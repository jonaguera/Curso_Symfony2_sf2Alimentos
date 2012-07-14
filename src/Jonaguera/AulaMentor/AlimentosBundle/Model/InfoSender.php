<?php

 namespace Jonaguera\AulaMentor\AlimentosBundle\Model;

 class InfoSender
 {

     protected $model;
     protected $mailer;

     public function __construct($model, $mailer)
     {
         $this->model = $model;
         $this->mailer = $mailer;
     }

     public function send($terminoBusqueda, $direccionEmail)
     {
         $alimentos = $this->model->buscarAlimentosPorNombre($terminoBusqueda);

         $texto = '';
         foreach ($alimentos as $alimento)
         {
             $texto = implode(',', $alimento);
             $texto .= PHP_EOL;
         }

         $message = \Swift_Message::newInstance()
                 ->setSubject('Información sobre alimentos')
                 ->setFrom('noreplay@aulasmentor.com')
                 ->setTo($direccionEmail)
                 ->setBody($texto)
         ;

         $this->mailer->send($message);
     }
 }