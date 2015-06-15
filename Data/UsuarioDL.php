<?php

/**
 * @author Seikon
 * @copyright 2015
 */
 
 include "conexion.php";

Class UsuarioDL {
    
    
    function GetUsuariosDL() {
        
        require_once("../Entities/Usuario.php");
        
        $array_usuarios = array();
        
        $conexion = new Conexion();
        
        $conexion->GetConexion();
        
        mysql_select_db("juego");
        
        $usuarios  = mysql_query("SELECT * FROM usuarios");
        
        //Ante error devuelve nada
        
        if(!$usuarios) {
            
            return $array_usuarios;
        }
        
        while($usuario = mysql_fetch_assoc($usuarios)) {
            
            $object_usuario = new Usuario();
            
            $object_usuario ->set_PK_IDENT($usuario["PK_IDENT"]);
            $object_usuario ->set_nombre($usuario["Nombre"]);
            $object_usuario ->set_Apellidos($usuario["Apellidos"]);
            $object_usuario ->set_Email($usuario["Email"]);
            $object_usuario ->set_Password($usuario["Password"]);
            

            array_push($array_usuarios,$object_usuario);
        }
        
        return $array_usuarios;
        
    }
    
    function AltaUsuarioDL($usuario) {
        
        require_once("../Entities/Usuario.php");
        
        $conexion = new Conexion();
        
        $conexion->GetConexion();
        
        $nombre = strtoupper($usuario->nombre);
        $apellidos = strtoupper($usuario->apellidos);
        $email = strtoupper($usuario->email);
        
        mysql_select_db("juego");
        
        mysql_query("insert into usuarios (Nombre,Apellidos,Email,Password) VALUES('$nombre','$apellidos','$email','$usuario->password')") or die(mysql_error());
        
    }
    
    function UnirsePartidaDL($idPartida,$idUsuario) {
        
        require_once("../Entities/Usuario.php");
        
        $conexion = new Conexion();
        
        $conexion->GetConexion();
        
        mysql_select_db("juego");
        
        mysql_query("update usuarios set idPartidaActual = '$idPartida' where Email = '$idUsuario'");
    }
    
    function LoginDL($email,$password) {
        
        $conexion = new Conexion();
        
        $conexion->GetConexion();
        
        mysql_select_db("juego");
        
        $resultado = mysql_query("SELECT Email from Usuarios where Email = '$email' and Password = '$password'");
        
        if (mysql_num_rows($resultado) > 0) 
            
            return true;
        else
            
            return false;
    }

    
}

?>