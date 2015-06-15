<?php

/**
 * @author Seikon
 * @copyright 2015
 */
 
class Conexion {
    
    private  $Servidor = "localhost:3306";
    private  $Usuario = "application";
    private  $Pass = "applicationchimenea";
    
    public function GetConexion() {
        
       return mysql_connect($this->Servidor,$this->Usuario,$this->Pass);
    }
}

?>