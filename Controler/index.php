<?php

/**
 * @author lolkittens
 * @copyright 2015
 */

$mode = $_POST['mode'];
$target = $_POST['target'];
$parameter =  $_POST['parameter'];
 
 switch($mode) {
    
    Case "Alta":
    break;
    
    Case "Modificacion":
    break;
     
    Case "Baja":
    break;
    
    Case "Ajax":
    break;
 
 }
 
 
 function GetAjax() {
    
        
    switch ($target) {
        
        case "existe_usuario":
        existe_usuario();
        
        break;
    }
 }
 
 function GetUsuarios() {
    
    require_once("../Business/UsuarioBL");
    
    return $usuarioBl->GetUsuarioBL();
     
 }
 
 function existe_usuario() {
    
    $usuarios = GetUsuarios();
    
    foreach($usuarios as $usuario->$email) {
        
       $email_param =  explode(";",$parameter)[0];
       
       if($email_param == $email) {
        
            echo "true";
       }
       
    }
    
    echo "false";
 }

?>