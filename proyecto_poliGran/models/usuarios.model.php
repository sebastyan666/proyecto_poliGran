<?php 

    require_once 'connection/conexion.php';

    class usuarios {

        public static function getAll(){

            $db = new conexion();
            $query = "SELECT * FROM usuarios";
            $resultado = $db->query($query);
            $datos = [];
            if ($resultado->num_rows) {

                while ($row = $resultado->fetch_assoc() ) {
                    $datos[] = [
                        'id' => $row['id_usuario'],  
                        'Nombre_completo' => $row['Nombre_completo'],  
                        'Genero' => $row['Genero'],
                        'Edad' => $row['Edad'],  
                        'Correo_electronico' => $row['Correo_electronico']
                    ];
                } //end while
                return $datos;

            }
                return $datos;

        }//get all

        public static function getWhere($id){

            $db = new conexion();
            $query = "SELECT * FROM usuarios WHERE id_usuario=$id";
            $resultado = $db->query($query);
            $datos = [];    
            if ($resultado->num_rows) {

                while ($row = $resultado->fetch_assoc() ) {
                    $datos[] = [
                        'id_usuario' => $row['id_usuario'],  
                        'Nombre_completo' => $row['Nombre_completo'],  
                        'Edad' => $row['Edad'],  
                        'Correo_electronico' => $row['Correo_electronico']


                    ];
                } //end while
                return $datos;

            }
                return $datos;

        }//get all

      /*  public static function insert($usuarios_id, $Nombre_profecional, $Especialidad, $Fecha, $Observaciones){
            $db = new conexion();

            $query = "INSERT INTO controles (usuarios_id, Nombre_profecional, Especialidad,Fecha,Observaciones)
            VALUES ('". $usuarios_id. "', '".$Nombre_profecional."', '".$Especialidad."', '".$Fecha."', '".$Observaciones."')";
            $db->query($query);
            if ($db->affected_rows) {
                return TRUE;
            }
            return FALSE;

        }

        public static function update($idcontroles,$usuarios_id, $Nombre_profecional, $Especialidad, $Fecha, $Observaciones){
            $db = new conexion();

            $query = "UPDATE controles SET 
            usuarios_id='".$usuarios_id."', Nombre_profecional='".$Nombre_profecional."', Especialidad='".$Especialidad."', Fecha='".$Fecha."', Observaciones='".$Observaciones."' 
            WHERE idcontroles=$idcontroles";
            $db->query($query);
            if ($db->affected_rows) {
                return TRUE;
            }
            return FALSE;

        }


        public static function delete($idcontroles){

            $db = new conexion();
            $query = "DELETE FROM controles WHERE idcontroles=$idcontroles";
            $db->query($query);

            if ($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }*/

    }//class controles




?>