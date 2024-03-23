<?php
header('Access-Control-Allow-Origin: *');
require_once "models/Profesor.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        echo  json_encode(Profesor::getAll());
        break;
    default:
        break;

}