<?php

/**
 * @author Seikon
 * @copyright 2015
 */

    class Usuario {
        
       public $PK_Ident;
       public $nombre;
       public $apellidos;
       public $email;
       public $password;
       
       public function set_nombre($nombre) {
        
        $this ->nombre = $nombre;
        }
        
        public function set_apellidos($apellidos) {
        
        $this ->apellidos = $apellidos;
        }
        
        public function set_email($email) {
        
        $this ->email = $email;
        }
        
        public function set_password($password) {
        
        $this ->password = $password;
        }
        
        public function set_PK_IDENT($PK_Ident) {
        
        $this ->PK_Ident = $PK_Ident;
        }
        
        public function get_pk_ident() {
            
            return $this->PK_Ident;
        }
        
        public function get_nombre() {
            
            return $this->nombre;
        }
        
        public function get_apellidos() {
            
            return $this->apellidos;
        }
        
        public function get_email() {
            
            return $this->email;
        }
        
        public function get_password() {
            
            return $this->password;
        }
        
    }
    

       

?>