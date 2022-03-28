<?php 

    require_once 'connection/conexion.php';

    class condicion {

        public static function getAll(){

            $db = new conexion();
            $query = "SELECT * FROM condicion";
            $resultado = $db->query($query);
            $datos = [];
            if ($resultado->num_rows) {

                while ($row = $resultado->fetch_assoc() ) {
                    $datos[] = [
                        'id' => $row['idcondicion'],  
                        'r_laboratorio' => $row['R_laboratorio_id'],  
                        'condicion' => $row['Condicion'],  
                        'tipo' => $row['Tipo'],  
                        'fecha' => $row['Fecha_inicio'],  
                        'observaciones' => $row['Observaciones']


                    ];
                } //end while
                return $datos;

            }
                return $datos;

        }//get all

        public static function getWhere($id){

            $db = new conexion();
            $query = "SELECT * FROM condicion WHERE idcondicion=$id";
            $resultado = $db->query($query);
            $datos = [];    
            if ($resultado->num_rows) {

                while ($row = $resultado->fetch_assoc() ) {
                    $datos[] = [
                        'id' => $row['idcondicion'],  
                        'R_laboratorio_id' => $row['R_laboratorio_id'],  
                        'Condicion' => $row['Condicion'],  
                        'Tipo' => $row['Tipo'],  
                        'Fecha_inicio' => $row['Fecha_inicio'],  
                        'Observaciones' => $row['Observaciones']


                    ];
                } //end while
                return $datos;

            }
                return $datos;

        }//get all

        public static function insert($R_laboratorio_id, $Condicion, $Tipo, $Fecha_inicio, $Observaciones){
            $db = new conexion();

            $query = "INSERT INTO condicion (R_laboratorio_id, Condicion, Tipo,Fecha_inicio,Observaciones)
            VALUES ('". $R_laboratorio_id. "', '".$Condicion."', '".$Tipo."', '".$Fecha_inicio."', '".$Observaciones."')";
            $db->query($query);
            if ($db->affected_rows) {
                return TRUE;
            }
            return FALSE;

        }

        public static function update($idcondicion,$R_laboratorio_id, $Condicion, $Tipo, $Fecha_inicio, $Observaciones){
            $db = new conexion();

            $query = "UPDATE condicion SET 
            R_laboratorio_id='".$R_laboratorio_id."', Condicion='".$Condicion."', Tipo='".$Tipo."', Fecha_inicio='".$Fecha_inicio."', Observaciones='".$Observaciones."' 
            WHERE idcondicion=$idcondicion";
            $db->query($query);
            if ($db->affected_rows) {
                return TRUE;
            }
            return FALSE;

        }


        public static function delete($idcondicion){

            $db = new conexion();
            $query = "DELETE FROM condicion WHERE idcondicion=$idcondicion";
            $db->query($query);

            if ($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

    }//class controles




?>