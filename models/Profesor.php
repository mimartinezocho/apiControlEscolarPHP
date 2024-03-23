<?php
header('Access-Control-Allow-Origin: *');
require_once "../connection/Connection.php";

class Profesor{

    public static function getAll()
    {
        // obtener todos los datos de la tabla
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM profesores";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows){
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'id' => $row['profesor_id'],
                    'nombre' => $row['nombre'],
                    'telefono' => $row['telefono'],
                    'correoelectronico' => $row['correoelectronico'],
                    'estatus' => $row['estatus'],
                    'fecharegistro' => $row['fecharegistro'],
                    'fechaultimamodificacion' => $row['fechaultimamodificacion'],
                ];
            }// end whilw
            return $datos;
        }// end if
        return $datos;
    } // end gelAll

    public static function getWhere($id_profesor)
    {
        // obtener todos los datos de la tabla
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM profesores WHERE profesor_id = $id_profesor";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows){
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'id' => $row['profesor_id'],
                    'nombre' => $row['nombre'],
                    'telefono' => $row['telefono'],
                    'correoelectronico' => $row['correoelectronico'],
                    'estatus' => $row['estatus'],
                    'fecharegistro' => $row['fecharegistro'],
                    'fechaultimamodificacion' => $row['fechaultimamodificacion'],
                ];
            }// end whilw
            return $datos;
        }// end if
        return $datos;
    } // end getWhere

    public static function insert($nombre, $telefono, $correoelectronico){
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "INSERT INTO profesores (nombre,telefono, 
                    correoelectronico, estatus,fecharegistro,fechaultimamodificacion
                    )
                    VALUES
                    ('".$nombre."', 
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

    public static function update($id_profesor, $nombre, $telefono, $correoelectronico){
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "UPDATE profesores
                    SET
                    nombre = '".$nombre."', 
                    telefono = '".$telefono."', 
                    correoelectronico = '".$correoelectronico."',  
                    fechaultimamodificacion = NOW()
                    WHERE profesor_id = $id_profesor";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }
        return false;

    } // end update

    public static  function delete($id_profesor)
    {
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "DELETE FROM profesores WHERE profesor_id = $id_profesor";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }
        return false;
    }

}



?>