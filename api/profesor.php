<?php
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // Indica los métodos permitidos.
    header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT');
    // Indica los encabezados permitidos.
    header('Access-Control-Allow-Headers: Authorization');
    http_response_code(204);
}
require_once "../models/Profesor.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if(isset($_GET['id'])){
            echo json_encode(Profesor::getWhere($_GET['id']));
        }else {
            echo json_encode(Profesor::getAll());
        }
        break;
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos!= NULL)
        {
            if(Profesor::insert($datos->nombre, $datos->telefono, $datos->correoelectronico))
            {
                //http_response_code(200);
                echo json_encode(['insert' => TRUE]);
            }//end if
            else{
                //http_response_code(400);
                echo json_encode(['insert' => FALSE]);
            }
        }
        else
        {
            echo json_encode(['insert' => FALSE]);
        }

        break;
    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos!= NULL)
        {
            if(Profesor::update($datos->id, $datos->nombre, $datos->telefono, $datos->correoelectronico))
            {
                echo json_encode(['update' => TRUE]);
            }//end if
            else{
                echo json_encode(['update' => FALSE]);
            }
        }
        else
        {
            echo json_encode(['update' => FALSE]);
        }
        break;
    case 'DELETE':
        if(isset($_GET["id"]))
        {
            if(Profesor::delete($_GET["id"])){
                echo json_encode(['delete' => TRUE]);
            }
            else{
                echo json_encode(['delete' => FALSE]);
            }
        }
        else{
            echo json_encode(['delete' => FALSE]);
        }


        break;
    default:
        http_response_code(200);
        echo json_encode(['delete' => TRUE]);
        break;

}