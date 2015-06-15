<?php

/**
 * @author Seikon
 * @copyright 2015
 */

    class Partida {
        
       public $idPartida;
       public $nombre;
       public $numJugadores;
       public $finalizada;
       
       public  function set_idPartida($idPartida) {
        
        $this ->idPartida = $idPartida;
        }
        
        public function set_nombre($nombre) {
        
        $this ->nombre = $nombre;
        }
        
        public function set_numJugadores($numJugadores) {
        
        $this ->numJugadores = $numJugadores;
        }
        
        public function set_finalizada($finalizada) {
        
        $this ->finalizada = $finalizada;
        }
        
        public function get_idPartida() {
            
            return $this->idPartida;
        }
        
        public function get_nombre() {
            
            return $this->nombre;
        }
        
        public function get_numJugadores() {
            
            return $this->numJugadores;
        }
        
        public function get_finalizada() {
            
            return $this->finalizada;
        }
       
    }
    

       

?>