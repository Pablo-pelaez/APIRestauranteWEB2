<?php 

class BaseDatos
{
    public $db;

    public function obtenerConexion()
    {
        $this -> db = null;
        try 
        {
            $this -> db = new mysqli('localhost', 'root', '', 'restaurantedp');
        }
        catch(Exception $excepcion)
        {
            echo"La Base de Datos no fue encontrada: ". $excepcion->getMessage();
        }
        return $this -> db;

    }

}


?>