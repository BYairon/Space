

<?php

/**
 * @author Seikon
 * @copyright 2015
 */
 
 include "conexion.php";

Class PartidaDL {
    
    
    function GetPartidasDL() {
        
        require_once("../Entities/Partida.php");
        
        $array_partidas = array();
        
        $conexion = new Conexion();
        
        $conexion->GetConexion();
        
        mysql_select_db("juego");
        
        $partidas  = mysql_query("SELECT * FROM partidas");
        
        //Ante error devuelve nada
        
        if(!$partidas) {
            
            return $array_partidas;
        }
        
        while($partida = mysql_fetch_assoc($partidas)) {
            
            $object_partida = new Partida();
            
            $object_partida ->set_idPartida($partida["idPartida"]);
            $object_partida ->set_nombre($partida["Nombre"]);
            $object_partida ->set_numJugadores($partida["NumJugadores"]);
            $object_partida ->set_finalizada($partida["Finalizada"]);

            array_push($array_partidas,$object_partida);
        }
        
        return $array_partidas;
        
    }

}

?>