<?php 
    require_once "models/laboratorio.model.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if(isset($_GET['idr_laboratorio'])) {

                echo json_encode(r_laboratorio::getWhere($_GET['idr_laboratorio']));

            }else {

                echo json_encode(r_laboratorio::getAll());
            }
               
              
            break;

        case 'POST':
            $datos = json_decode(file_get_contents('php://input')); //json->array
            if ($datos != NULL) {
                if (r_laboratorio::insert($datos->R_laboratorio_id, $datos->Condicion, $datos->Tipo, $datos->Fecha_inicio, $datos->Observaciones)) {
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
                    if (r_laboratorio::update($datos->idcondicion, $datos->R_laboratorio_id, $datos->Condicion, $datos->Tipo, $datos->Fecha_inicio, $datos->Observaciones)) {
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
                if(isset($_GET['idr_laboratorio'])) {
                    if (r_laboratorio::delete($_GET['idr_laboratorio'])) {
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
