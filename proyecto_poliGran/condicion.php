<?php 
    require_once "models/condicion.model.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if(isset($_GET['idcondicion'])) {

                echo json_encode(condicion::getWhere($_GET['idcondicion'])); 

            }else {

                echo json_encode(condicion::getAll());
            }
               
              
            break;

        case 'POST':
            $datos = json_decode(file_get_contents('php://input')); //json->array
            if ($datos != NULL) {
                if (condicion::insert($datos->R_laboratorio_id, $datos->Condicion, $datos->Tipo, $datos->Fecha_inicio, $datos->Observaciones)) {
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
                    if (condicion::update($datos->idcondicion, $datos->R_laboratorio_id, $datos->Condicion, $datos->Tipo, $datos->Fecha_inicio, $datos->Observaciones)) {
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
                if(isset($_GET['idcondicion'])) {
                    if (condicion::delete($_GET['idcondicion'])) {
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