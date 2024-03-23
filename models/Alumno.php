<?php
require_once "../connection/Connection.php";

class Alumno{

    public static function getAll()
    {
        // obtener todos los datos de la tabla
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM alumnos";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows){
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'id' => $row['alumno_id'],
                    'matricula' => $row['matricula'],
                    'nombre' => $row['nombre'],
                    'telefono' => $row['telefono'],
                    'correoelectronico' => $row['correoelectronico'],
                    'estatus' => $row['estatus'],
                    'fecharegistro' => $row['fecharegistro'],
                    'fechaultimamodificacion' => $row['fechaultimamodificacion']
                ];
            }// end whilw
            return $datos;
        }// end if
        return $datos;
    } // end gelAll

    public static function getWhere($id_alumno)
    {
        // obtener todos los datos de la tabla
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM alumnos WHERE alumno_id = $id_alumno";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows){
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'id' => $row['alumno_id'],
                    'matricula' => $row['matricula'],
                    'nombre' => $row['nombre'],
                    'telefono' => $row['telefono'],
                    'correoelectronico' => $row['correoelectronico'],
                    'estatus' => $row['estatus'],
                    'fecharegistro' => $row['fecharegistro'],
                    'fechaultimamodificacion' => $row['fechaultimamodificacion']
                ];
            }// end where
            return $datos;
        }// end if
        return $datos;
    } // end getWhere

    public static function insert($matricula, $nombre, $telefono, $correoelectronico){
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "INSERT INTO `controlescolar`.`alumnos` 
                    (`matricula`, 
                    `nombre`, 
                    `telefono`, 
                    `correoelectronico`, 
                    `estatus`, 
                    `fecharegistro`, 
                    `fechaultimamodificacion`
                    )
                    VALUES
                    ('".$matricula."',
                    '".$nombre."', 
                    '".$telefono."',
                    '".$correoelectronico."', 
                    1, 
                    NOW(), 
                    NULL)";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }
        return false;

    }// end insert

    public static function update($id,$matricula, $nombre, $telefono, $correoelectronico){
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "UPDATE alumnos
                    SET
                    matricula = ".$matricula.",
                    nombre = '".$nombre."', 
                    telefono = '".$telefono."', 
                    correoelectronico = '".$correoelectronico."',  
                    fechaultimamodificacion = NOW()
                    WHERE alumno_id = $id";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }
        return false;

    } // end update

    public static  function delete($id_alumno)
    {
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "DELETE FROM alumnos WHERE alumno_id = $id_alumno";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }
        return false;
    }

}



?>