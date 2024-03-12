<?php
class Sales extends Conexion {
    // Insert a new venta record for a specific sucursal and usuario
    public function insertVentaBySucId($sucId, $usuId) {
        $conectar = parent::cn();
        $sql = "SP_I_VENTA_01 ?,?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $sucId);
        $query->bindValue(2, $usuId);
        $query->execute();
    }

    // Insert a venta detalle record
    public function insertVentaDetalle($ventId, $prodId, $prodPventa, $detvCant) {
        $conectar = parent::cn();
        $sql = "SP_I_VENTA_02 ?,?,?,?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $ventId);
        $query->bindValue(2, $prodId);
        $query->bindValue(3, $prodPventa);
        $query->bindValue(4, $detvCant);
        $query->execute();
    }

    // Get the venta detalle for a specific venta ID
    public function getVentaDetalle($ventId) {
        $conectar = parent::cn();
        $sql = "SP_L_VENTA_01 ?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $ventId);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Delete a venta detalle record by ID
    public function deleteVentaDetalle($detvId) {
        $conectar = parent::cn();
        $sql = "SP_D_VENTA_01 ?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $detvId);
        $query->execute();
    }

    // Update venta details
    public function updateVenta($ventId, $pagId, $cliId, $cliRuc, $cliDirecc, $cliCorreo, $compvComent, $monId, $docId) {
        $conectar = parent::cn();
        $sql = "SP_U_VENTA_03 ?,?,?,?,?,?,?,?,?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $ventId);
        $query->bindValue(2, $pagId);
        $query->bindValue(3, $cliId);
        $query->bindValue(4, $cliRuc);
        $query->bindValue(5, $cliDirecc);
        $query->bindValue(6, $cliCorreo);
        $query->bindValue(7, $compvComent);
        $query->bindValue(8, $monId);
        $query->bindValue(9, $docId);
        $query->execute();
    }

    // Get venta details by ID
    public function getVenta($ventId) {
        $conectar = parent::cn();
        $sql = "SP_L_VENTA_02 ?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $ventId);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get list of ventas for a specific sucursal
    public function getVentaListado($sucId) {
        $conectar = parent::cn();
        $sql = "SP_L_VENTA_03 ?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $sucId);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get top productos for ventas in a specific sucursal
    public function getVentaTopProductos($sucId) {
        $conectar = parent::cn();
        $sql = "SP_L_VENTA_04 ?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $sucId);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get ventas barras for a specific sucursal
    public function getVentaBarras($sucId) {
        $conectar = parent::cn();
        $sql = "SP_L_VENTA_06 ?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $sucId);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>