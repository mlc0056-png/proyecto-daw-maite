<?php
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
