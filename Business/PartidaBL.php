<?php

/**
 * @author Seikon
 * @copyright 2015
 */

Class PartidaBL {
    
    function GetPartidaBL() {
        
        require_once("../Data/PartidaDL.php");
        
        $partidaDL = new PartidaDL();
        
        return $partidaDL->GetPartidasDL();
        
    }
    
}

?>