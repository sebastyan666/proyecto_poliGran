<?php 

    require_once 'connection/conexion.php';

    class r_laboratorio {

        public static function getAll(){

            $db = new conexion();
            $query = "SELECT * FROM r_laboratorio";
            $resultado = $db->query($query);
            $datos = [];
            if ($resultado->num_rows) {

                while ($row = $resultado->fetch_assoc() ) {
                    $datos[] = [
                        'id' => $row['id'],  
                        'usuarios_id' => $row['usuarios_id'], 
                        'Descriccion' => $row['Descriccion'], 
                        'Imagen	' => $row['Imagen'],                             
                                                                                             
                    ];
                } //end while
                return $datos;

            }
                return $datos;

        }//get all

        public static function getWhere($id){

            $db = new conexion();
            $query = "SELECT * FROM r_laboratorio WHERE idr_laboratorio=$id";
            $resultado = $db->query($query);
            $datos = [];    
            if ($resultado->num_rows) {

                while ($row = $resultado->fetch_assoc() ) {
                    $datos[] = [
                        'id' => $row['id'],  
                        'usuarios_id' => $row['usuarios_id'],  
                        'Descriccion' => $row['Descriccion'],                           
                        'Imagen	' => $row['Imagen'],  
                        


                    ];
                } //end while
                return $datos;

            }
                return $datos;

        }//get all

        public static function insert( $usuarios_id, $Descriccion, $Imagen){
            $db = new conexion();

            $query = "INSERT INTO r_laboratorio ( usuarios_id,Descriccion,Imagen)
            VALUES ('".$usuarios_id."', '".$Descriccion."', '".$Imagen."')";
            $db->query($query);
            if ($db->affected_rows) {
                return TRUE;
            }
            return FALSE;

        }

        public static function update( $usuarios_id, $Descriccion, $Imagen){
            $db = new conexion();

            $query = "UPDATE r_laboratorio SET 
           usuarios_id='".$usuarios_id."', Descriccion='".$Descriccion."', Imagen='".$Imagen."'
            WHERE idr_laboratorio=$idr_laboratorio";
            $db->query($query);
            if ($db->affected_rows) {
                return TRUE;
            }
            return FALSE;

        }


        public static function delete($idcondicion){

            $db = new conexion();
            $query = "DELETE FROM r_laboratorio WHERE idr_laboratorio=$idr_laboratorio";
            $db->query($query);

            if ($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

    }//class controles




?>
