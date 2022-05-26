<?php 

    // Inicio valida que exista método $_POST y el motodo get $_GET este vacío
    if(!empty($_POST) && empty($_GET)){

        // Rebotamos de vuelta la información recibida 
        // para verificar el correcto funcionamiento
        die (json_encode($_POST));

    }else{

        // Método invalido, sólo admite POST
        die (json_encode('Método Inválido'));

    }

?>