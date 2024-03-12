<?php
    class Moneda extends Conexion{
        /* Listar todas las monedas por ID de sucursal */
        public function listarPorSucursal($suc_id){
            $conexion = parent::cn();
            $sql = "SP_L_MONEDA_01 ?";
            $query = $conexion->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Obtener una moneda por su ID */
        public function obtenerPorID($mon_id){
            $conexion = parent::cn();
            $sql = "SP_L_MONEDA_02 ?";
            $query = $conexion->prepare($sql);
            $query->bindValue(1, $mon_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Eliminar una moneda por su ID */
        public function eliminar($mon_id){
            $conexion = parent::cn();
            $sql = "SP_D_MONEDA_01 ?";
            $query = $conexion->prepare($sql);
            $query->bindValue(1, $mon_id);
            $query->execute();
        }

        /* Insertar una nueva moneda */
        public function insertar($suc_id, $mon_nom){
            $conexion = parent::cn();
            $sql = "SP_I_MONEDA_01 ?, ?";
            $query = $conexion->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->bindValue(2, $mon_nom);
            $query->execute();
        }

        /* Actualizar una moneda */
        public function actualizar($mon_id, $suc_id, $mon_nom){
            $conexion = parent::cn();
            $sql = "SP_U_MONEDA_01 ?, ?, ?";
            $query = $conexion->prepare($sql);
            $query->bindValue(1, $mon_id);
            $query->bindValue(2, $suc_id);
            $query->bindValue(3, $mon_nom);
            $query->execute();
        }
    }
?>
