<?php
//date_default_timezone_set('America/Bogota');
class Restaurante
{
    // db conection
    private $db;
    // Table
    private $tablaDB = "platos";
    // Columns
    public $idPlato;
    public $nombrePlato;
    public $descripcion;
    public $precio;
    public $imagen;
    public $resultado;


    // Db 
    public function __construct($db)
    {
        $this->db = $db;
    }

    // GET ALL
    public function obtenerPlatos()
    {
        $sqlQuery = "SELECT idPlato, nombrePlato, descripcion, precio, imagen FROM " . $this->tablaDB . "";
        $this->resultado = $this->db->query($sqlQuery);
        return $this->resultado;
    }

    // CREATE
    public function crearPlatos()
    {
        // sanitize
        $this->nombrePlato = htmlspecialchars(strip_tags($this->nombrePlato));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->precio = htmlspecialchars(strip_tags($this->precio));
        $this->imagen = htmlspecialchars(strip_tags($this->imagen));
        $sqlQuery = "INSERT INTO
        " . $this->tablaDB . " SET nombrePlato = '" . $this->nombrePlato . "',
        descripcion = '" . $this->descripcion . "',
        precio = '" . $this->precio . "',imagen = '" . $this->imagen . "'";
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // UPDATE
    public function obtenerPlatoIndividual()
    {
        $sqlQuery = "SELECT idPlato, nombrePlato, descripcion, precio, imagen FROM
        " . $this->tablaDB . " WHERE idPlato = " . $this->idPlato;
        $record = $this->db->query($sqlQuery);
        $dataRow = $record->fetch_assoc();
        $this->nombrePlato = $dataRow['nombrePlato'];
        $this->descripcion = $dataRow['descripcion'];
        $this->precio = $dataRow['precio'];
        $this->imagen = $dataRow['imagen'];
    }

    // UPDATE
    public function actualizarPlatos()
    {
        $this->nombrePlato = htmlspecialchars(strip_tags($this->nombrePlato));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->precio = htmlspecialchars(strip_tags($this->precio));
        $this->imagen = htmlspecialchars(strip_tags($this->imagen));
        $this->idPlato = htmlspecialchars(strip_tags($this->idPlato));

        $sqlQuery = "UPDATE " . $this->tablaDB . " SET nombrePlato = '" . $this->nombrePlato . "',
        descripcion = '" . $this->descripcion . "',
        precio = '" . $this->precio . "',imagen = '" . $this->imagen . "'
        WHERE idPlato = " . $this->idPlato;

        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // DELETE
    function eliminarPlato()
    {
        $sqlQuery = "DELETE FROM " . $this->tablaDB . " WHERE idPlato = " . $this->idPlato;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
