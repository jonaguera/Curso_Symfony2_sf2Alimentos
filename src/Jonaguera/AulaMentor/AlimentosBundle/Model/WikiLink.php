<?php
namespace Jonaguera\AulaMentor\AlimentosBundle\Model;

 class WikiLink
 {

     public function __construct()
     {

     }

     private function get($nombre)
     {
         $nombre= urlencode(str_replace(" ","_",ucwords($nombre)));
         return "http://es.wikipedia.com/wiki/".$nombre;
     }
     
     public function addWikiLink($alimentos)
     {
         foreach ($alimentos as $alimento)
         {
             $alimento['wikilink']=$this->get($alimento['nombre']);
             $alimentos_wikilink[]=$alimento;
         }
         return $alimentos_wikilink;
     }
 }