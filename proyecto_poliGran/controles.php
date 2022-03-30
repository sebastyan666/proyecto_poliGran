<?php 
    require_once "models/controles.model.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if(isset($_GET['idcontroles'])) {

                echo json_encode(controles::getWhere($_GET['idcontroles']));

            }
            else if (isset($_GET['idusuarios'])){
                echo json_encode(controles::getWhereUser($_GET['idusuarios']));
            }
             else {

                echo json_encode(controles::getAll());
            }
               
              
            break;

        case 'POST':
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

        



        
    default:
    http_response_code(405);
    break;
    

}
?>