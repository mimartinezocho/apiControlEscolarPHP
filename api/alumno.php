<?php
header('Access-Control-Allow-Origin: *');
require_once "../models/Alumno.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if(isset($_GET['id'])){
            echo json_encode(Alumno::getWhere($_GET['id']));
        }else {
            echo json_encode(Alumno::getAll());
        }
        break;
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos!= NULL)
        {
            if(Alumno::insert($datos->matricula, $datos->nombre, $datos->telefono, $datos->correoelectronico))
            {
                //http_response_code(200);
                echo json_encode(['insert' => TRUE]);
            }//end if
            else{
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
            if(Alumno::update($datos->id, $datos->matricula, $datos->nombre, $datos->telefono, $datos->correoelectronico))
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
            if(Alumno::delete($_GET["id"])){
                //http_response_code(200);
                echo json_encode(['delete' => TRUE]);
            }
            else{
                //http_response_code(400);
                echo json_encode(['delete' => FALSE]);
            }
        }
        else{
            //http_response_code(405);
            echo json_encode(['delete' => FALSE]);
        }


        break;
    default:
        http_response_code(405);
        break;

}