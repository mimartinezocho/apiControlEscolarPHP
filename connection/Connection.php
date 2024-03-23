<?php

class Connection{
    public $conexionMysqli;
    function __constructor(){

    }//fin de constructor

    public function getConexion()
    {
        try{
            $this->conexionMysqli = new mysqli("localhost","root","","controlescolar");
            if($this->conexionMysqli->connect_errno){
                echo "Fallo la conexion con Mysql: (".$this->conexionMysqli->connect_errno.") ".$this->conexionMysqli->connect_error;
                throw new exception('No se pudo generar conexion con la BD');
            }
            else{
                return $this->conexionMysqli;
            }

        }catch (Exceptiom $e)
        {
            print $e->getCode()." | ".$e->getMessage();
        }
    }// end getConexion
}
//fin de conexion

?>