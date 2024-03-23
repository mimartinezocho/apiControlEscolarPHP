<?php
header('Access-Control-Allow-Origin: *');
require_once "../models/Materia.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if(isset($_GET['id'])){
            echo json_encode(Materia::getWhere($_GET['id']));
        }else {
            echo json_encode(Materia::getAll());
        }
        break;
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos!= NULL)
        {
            if(Materia::insert($datos->profesor_id, $datos->clavemateria, $datos->nombre))
            {
                http_response_code(200);
            }//end if
            else{
                http_response_code(400);
            }
        }
        else
        {
            http_response_code(405);
        }

        break;
    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos!= NULL)
        {
            if(Materia::update($datos->id, $datos->profesor_id, $datos->clavemateria, $datos->nombre))
            {
                http_response_code(200);
            }//end if
            else{
                http_response_code(400);
            }
        }
        else
        {
            http_response_code(405);
        }
        break;
    case 'DELETE':
        if(isset($_GET["id"]))
        {
            if(Materia::delete($_GET["id"])){
                http_response_code(200);
            }
            else{
                http_response_code(400);
            }
        }
        else{
            http_response_code(405);
        }


        break;
    default:
        http_response_code(405);
        break;

}