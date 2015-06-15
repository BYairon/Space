<?php

/**
 * @author Seikon
 * @copyright 2015
 */

header("Access-Control-Allow-Origin: *");

$mode = $_POST['mode'];
 
 switch($mode) {
    
    Case "Alta":
    alta();
    break;
    
    Case "Modificacion":
    modificacion();
    break;
     
    Case "Baja":
    break;
    
    Case "Ajax":
    GetAjax();
    break;
    
    case "login":
    login();
    break;
 
 }
 
 function redirect($pagina) {
    
    echo "<script type='text/javascript'>window.location='$pagina'</script>";
 }
 
 function modificacion() {
    
     $target = $_POST['target'];
    
    switch ($target) {
        
        case "unirse_partida":
        unirse_partida();
        break;
    }
    
 }
 
 function login() {
    
    require_once("../Business/UsuarioBL.php");
    
    $usuarioBL = new UsuarioBL();
    
   $logueado = $usuarioBL->LoginBL($_POST['txtEmail'],$_POST['txtContrasena']);
   
   if ($logueado) {
   
       $_SESSION['user'] = strtoupper($_POST['txtEmail']);
       
        redirect("http://localhost//xampp//JuegoSpace//Front-end//Main.html");
        
   }
    
   else
   
        echo "El usuario o contraseña no existe";
    
 }
 
 function unirse_partida() {
    
    if (isset($_SESSION['user']) == false ) {
        
         redirect("http://localhost//xampp//JuegoSpace//Front-end//Login.html");
    }
    
    else {
            
    require_once("../Business/UsuarioBL.php");
    
    $usuarioBL = new UsuarioBL();
        
    $usuarioBL->UnirsePartidaBL($_POST['parameter'],$_SESSION['user']);
    
    }
    
 }
 
 function alta() {
    
     $target = $_POST['target'];
    
    switch ($target) {
        
        case "alta_usuario":
        alta_usuario();
        $_SESSION['user'] = strtoupper($_POST['txtEmail']);
        break;
    }
    
 }
 
 function alta_usuario() {
    
    require_once("../Business/UsuarioBL.php");
    require_once("../Entities/Usuario.php");
    
    $usuarioBL = new UsuarioBL();
    
    $usuario = new Usuario();
    
    $nombre = $_POST['txtNombre'];
    $apellidos = $_POST['txtApellido'];
    $email = $_POST['txtEmail'];
    $pass = $_POST['txtContrasena'];
    
    $usuario ->set_nombre($nombre);
    $usuario ->set_Apellidos($apellidos);
    $usuario ->set_Email($email);
    $usuario ->set_Password($pass);
    
    
    $usuarioBL->AltaUsuarioBL($usuario);
 }
 
 
 function GetAjax() {
    
    $target = $_POST['target'];
    
    switch ($target) {
        
        case "existe_usuario":
        existe_usuario();
        break;
        
        case "get_partidas":
        get_partidas();
        break;
    }
 }
 
 function GetUsuarios() {
    
    require_once("../Business/UsuarioBL.php");
    
    $usuarioBL = new UsuarioBL();
    
    return $usuarioBL->GetUsuarioBL();
     
 }
 
 function get_partidas() {
    
    require_once("../Business/PartidaBL.php");
        
    $partidaBL = new PartidaBL();
    
    $array_partidas = $partidaBL->GetPartidaBL();
    
    $json = json_encode($array_partidas);
    
    echo $json;
    
    
 }
 
 function existe_usuario() {
    
    $usuarios = GetUsuarios();
    
    require_once("../Entities/Usuario.php");
    
    $parameter =  $_POST['parameter'];
    
    $email_param =  explode(";",$parameter)[0];
    
    for($i = 0; $i <= count($usuarios) - 1; $i++) {
        
       if($email_param == $usuarios[$i]->get_Email()) {
        
            echo "true";
            return;
       }
       
    }
    
    echo "false";
 }

?>