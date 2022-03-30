<?php 

    require_once 'connection/conexion.php';

    class indicadores_salud {

        public static function getAll(){

            $db = new conexion();
            $query = "SELECT * FROM indicadores_salud";
            $resultado = $db->query($query);
            $datos = [];
            if ($resultado->num_rows) {

                while ($row = $resultado->fetch_assoc() ) {
                    $datos[] = [
                        'id_salud' => $row['id_salud'],  
                        'usuarios_id' => $row['usuarios_id'], 
                        'Fecha' => $row['Fecha'], 
                        'Frecuencia_cardiaca' => $row['Frecuencia_cardiaca'],   
                        'Tencion_arterial' => $row['Tencion_arterial'],  
                        'Saturacion_oxigeno' => $row['Saturacion_oxigeno'], 
                        'Vacunas' => $row['Vacunas'], 
                        'Entrenamiento' => $row['Entrenamiento'],
                        'Distancia_recorridas' => $row['Distancia_recorridas']                            
                                                                                             
                    ];
                } //end while
                return $datos;

            }
                return $datos;

        }//get all

        public static function getWhere($id){

            $db = new conexion();
            $query = "SELECT * FROM indicadores_salud WHERE id_salud=$id";
            $resultado = $db->query($query);
            $datos = [];    
            if ($resultado->num_rows) {

                while ($row = $resultado->fetch_assoc() ) {
                    $datos[] = [
                        'id_salud' => $row['id_salud'],  
                        'usuarios_id' => $row['usuarios_id'], 
                        'Fecha' => $row['Fecha'], 
                        'Frecuencia_cardiaca' => $row['Frecuencia_cardiaca'],   
                        'Tencion_arterial' => $row['Tencion_arterial'],  
                        'Saturacion_oxigeno' => $row['Saturacion_oxigeno'], 
                        'Vacunas' => $row['Vacunas'], 
                        'Entrenamiento' => $row['Entrenamiento'],
                        'Distancia_recorridas' => $row['Distancia_recorridas']  
                        


                    ];
                } //end while
                return $datos;

            }
                return $datos;

        }//get all
        
        public static function getWhereUser($id){

            $db = new conexion();
            $query = "SELECT * FROM indicadores_salud WHERE usuarios_id=$id";
            $resultado = $db->query($query);
            $datos = [];    
            if ($resultado->num_rows) {

                while ($row = $resultado->fetch_assoc() ) {
                    $datos[] = [
                        'id_salud' => $row['id_salud'],  
                        'usuario_id' => $row['usuarios_id'], 
                        'Fecha' => $row['Fecha'], 
                        'Frecuencia_cardiaca' => $row['Frecuencia_cardiaca'],   
                        'Tencion_arterial' => $row['Tencion_arterial'],  
                        'Saturacion_oxigeno' => $row['Saturacion_oxigeno'], 
                        'Vacunas' => $row['Vacunas'], 
                        'Entrenamiento' => $row['Entrenamiento'],
                        'Distancia_recorridas' => $row['Distancia_recorridas']  
                    ];
                } //end while
                return $datos;
            }
                return $datos;

        }//get all

        public static function insert($usuarios_id,$Fecha, $Frecuencia_cardiaca, $Tencion_arterial, $Saturacion_oxigeno, $Vacunas, $Entrenamiento, $Distancia_recorridas){
            $db = new conexion();

            $query = "INSERT INTO indicadores_salud (usuarios_id,Fecha,Frecuencia_cardiaca,Tencion_arterial,Saturacion_oxigeno,Vacunas,Entrenamiento,Distancia_recorridas)
            VALUES ('".$usuarios_id."', '".$Fecha."', '".$Frecuencia_cardiaca."', '".$Tencion_arterial."', '".$Saturacion_oxigeno."', '".$Vacunas."', '".$Entrenamiento."', '".$Distancia_recorridas."')";
            $db->query($query);
            if ($db->affected_rows) {
                return TRUE;
            }
            return FALSE;

        }

        public static function update($id_salud, $usuarios_id, $Fecha, $Frecuencia_cardiaca, $Tencion_arterial, $Saturacion_oxigeno, $Vacunas, $Entrenamiento, $Distancia_recorridas){
            $db = new conexion();

            $query = "UPDATE indicadores_salud SET 
           usuarios_id='".$usuarios_id."', Fecha='".$Fecha."', Frecuencia_cardiaca='".$Frecuencia_cardiaca."', Tencion_arterial='".$Tencion_arterial."', Saturacion_oxigeno='".$Saturacion_oxigeno."', Vacunas='".$Vacunas."', Entrenamiento='".$Entrenamiento."', Distancia_recorridas='".$Distancia_recorridas."'
            WHERE id_salud=$id_salud";
            $db->query($query);
            if ($db->affected_rows) {
                return TRUE;
            }
            return FALSE;

        }


        public static function delete($id_salud){

            $db = new conexion();
            $query = "DELETE FROM indicadores_salud WHERE id_salud=$id_salud";
            $db->query($query);

            if ($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

    }//class controles




?>