<?php

/**
 * @author Seikon
 * @copyright 2015
 */

Class UsuarioBL {
    
    function GetUsuarioBL() {
        
        require_once("../Data/UsuarioDL.php");
        
        $usuarioDl = new UsuarioDL();
        
        return $usuarioDl->GetUsuariosDL();
        
    }
    
    function AltaUsuarioBL($usuario) {
        
        require_once("../Data/UsuarioDL.php");
        
        $usuarioDL = new UsuarioDL();
        
        $usuarioDL->AltaUsuarioDL($usuario);
    }
    
    function UnirsePartidaBL($idPartida,$idUsuario) {
        
        require_once("../Data/UsuarioDL.php");
        
        $usuarioDL = new UsuarioDL();
        
        $usuarioDL->UnirsePartidaDL($idPartida,$idUsuario);
    }
    
    function LoginBL($email,$password) {
        
        require_once("../Data/UsuarioDL.php");
        
        $usuarioDL = new UsuarioDL();
        
        return $usuarioDL->LoginDL($email,$password);
    }
    
}

?>