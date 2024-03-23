<?php
require_once "../connection/Connection.php";

class Materia{

    public static function getAll()
    {
        // obtener todos los datos de la tabla
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "SELECT M.materia_id, M.profesor_id, P.nombre AS 'nombreprofesor', M.clavemateria, M.nombre, M.estatus, 
M.fecharegistro, M.fechaultimamodificacion  
FROM materias M
LEFT JOIN profesores P ON M.profesor_id = P.profesor_id";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows){
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'id' => $row['materia_id'],
                    'profesor_id' => $row['profesor_id'],
                    'nombreprofesor' => $row['nombreprofesor'],
                    'clavemateria' => $row['clavemateria'],
                    'nombre' => $row['nombre'],
                    'estatus' => $row['estatus'],
                    'fecharegistro' => $row['fecharegistro'],
                    'fechaultimamodificacion' => $row['fechaultimamodificacion']
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
        $query = "SELECT M.materia_id, M.profesor_id, P.nombre AS 'nombreprofesor', M.clavemateria, M.nombre, M.estatus, 
M.fecharegistro, M.fechaultimamodificacion  
FROM materias M
LEFT JOIN profesores P ON M.profesor_id = P.profesor_id WHERE materia_id = $id_profesor";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows){
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'id' => $row['materia_id'],
                    'profesor_id' => $row['profesor_id'],
                    'nombreprofesor' => $row['nombreprofesor'],
                    'clavemateria' => $row['clavemateria'],
                    'nombre' => $row['nombre'],
                    'estatus' => $row['estatus'],
                    'fecharegistro' => $row['fecharegistro'],
                    'fechaultimamodificacion' => $row['fechaultimamodificacion']
                ];
            }// end whilw
            return $datos;
        }// end if
        return $datos;
    } // end getWhere

    public static function insert($profesorid, $nombre, $clavemateria){
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "INSERT INTO materias (profesor_id, clavemateria, nombre, estatus,fecharegistro,fechaultimamodificacion
                    )
                    VALUES
                    ('".$profesorid."',
                    '".$clavemateria."', 
                    '".$nombre."', 
                    1, 
                    NOW(), 
                    NULL)";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }
        return false;

    }// end insert

    public static function update($id,$profesorid, $nombre, $clavemateria){
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "UPDATE materias
                    SET
                    profesor_id = ".$profesorid.",
                    clavemateria = '".$clavemateria."', 
                    nombre = '".$nombre."',  
                    fechaultimamodificacion = NOW()
                    WHERE materia_id = $id";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }
        return false;

    } // end update

    public static  function delete($id_materia)
    {
        $conexion = new Connection();
        $db = $conexion->getConexion();
        $query = "DELETE FROM materias WHERE materia_id = $id_materia";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }
        return false;
    }

}



?>