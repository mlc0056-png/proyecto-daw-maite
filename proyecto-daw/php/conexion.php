<?php

/*
 * Clase de conexión a base de datos
 * Autor: Maite
 * Fecha: 2026-02-05
 * Descripción: Esta clase sirve para conectarse a la base de datos MySQL
 */

// Archivo de conexión a base de datos (ejemplo)
class Conexion {
    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $db = "mi_base";

    public function conectar() {
        $conn = new mysqli($this->host, $this->usuario, $this->password, $this->db);
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>
