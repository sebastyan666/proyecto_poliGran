<?php 
    require_once "models/usuarios.model.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if(isset($_GET['id_usuario'])) {

                echo json_encode(usuarios::getWhere($_GET['id_usuario']));

            }else {

                echo json_encode(usuarios::getAll());
            }
               
              
            break;

       /* case 'POST':
            $datos = json_decode(file_get_contents('php://input')); //json->array
            if ($datos != NULL) {
                if (controles::insert($datos->usuarios_id, $datos->Nombre_profecional, $datos->Especialidad, $datos->Fecha, $datos->Observaciones)) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else

             break;


        case 'PUT':   
            $datos = json_decode(file_get_contents('php://input')); //json->array
            if ($datos != NULL) {
                if (controles::update($datos->idcontroles, $datos->usuarios_id, $datos->Nombre_profecional, $datos->Especialidad, $datos->Fecha, $datos->Observaciones)) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else

             break;

        

        case 'DELETE':
            if(isset($_GET['idcontroles'])) {
                if (controles::delete($_GET['idcontroles'])) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else

             break;

        */



        
    default:
    http_response_code(405);
    break;
    

}
?>