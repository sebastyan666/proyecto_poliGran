<?php 

    class conexion extends Mysqli {
        function __construct() {
            parent:: __construct('localhost', 'root', '', 'proyecto_1'); 
            $this->set_charset('utf8');
            $this->connect_error == NULL ? 'conexion exitosa a la Bd' : die('Error al conectarse');
        }
    }


?>  