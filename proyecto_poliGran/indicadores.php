<?php 
    require_once "models/indicadores.model.php";


    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if(isset($_GET['id_salud'])) {

                echo json_encode(indicadores_salud::getWhere($_GET['id_salud']));

            }
            else if (isset($_GET['usuario_id'])){
                echo json_encode(indicadores_salud::getWhereUser($_GET['usuario_id']));
            }
            else {

                echo json_encode(indicadores_salud::getAll());
            }
               
              
            break;

        case 'POST':
            $datos = json_decode(file_get_contents('php://input')); //json->array
            if ($datos != NULL) {
                if (indicadores_salud::insert($datos->usuarios_id, $datos->Fecha, $datos->Frecuencia_cardiaca, $datos->Tencion_arterial, $datos->Saturacion_oxigeno, $datos->Vacunas, $datos->Entrenamiento, $datos->Distancia_recorridas)) {
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
                    if (indicadores_salud::update($datos->id_salud, $datos->usuarios_id, $datos->Fecha, $datos->Frecuencia_cardiaca, $datos->Tencion_arterial, $datos->Saturacion_oxigeno, $datos->Vacunas, $datos->Entrenamiento, $datos->Distancia_recorridas)) {
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
                if(isset($_GET['id_salud'])) {
                    if (indicadores_salud::delete($_GET['id_salud'])) {
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