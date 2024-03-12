<?php

class Conexion {
    // Propiedades para la conexión
    private $host = 'testserver.local';
    private $port = '1433';
    private $dbname = 'CompraVenta';
    private $username = 'sa';
    private $password = 'HOME.1705';
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::SQLSRV_ATTR_ENCODING => PDO::SQLSRV_ENCODING_UTF8
    );

    protected $cndb;

    // Método para establecer la conexión
    protected function cn(){
        try {
            $dsn = "sqlsrv:Server={$this->host},{$this->port};Database={$this->dbname}";
            $this->cndb = new PDO($dsn, $this->username, $this->password, $this->options);
            return $this->cndb;
        } catch(PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }
}

?>
