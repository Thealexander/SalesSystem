<?php
    class Rol extends Conexion{
        /* Listar roles por ID de sucursal */
        public function listarPorSucursal($suc_id){
            $cn = parent::cn();
            $sql = "SP_L_ROL_01 ?";
            $query = $cn->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Obtener un rol por su ID */
        public function obtenerPorID($rol_id){
            $cn = parent::cn();
            $sql = "SP_L_ROL_02 ?";
            $query = $cn->prepare($sql);
            $query->bindValue(1, $rol_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Eliminar un rol por su ID */
        public function eliminar($rol_id){
            $cn = parent::cn();
            $sql = "SP_D_ROL_01 ?";
            $query = $cn->prepare($sql);
            $query->bindValue(1, $rol_id);
            $query->execute();
        }

        /* Insertar un nuevo rol */
        public function insertar($suc_id, $rol_nom){
            $cn = parent::cn();
            $sql = "SP_I_ROL_01 ?, ?";
            $query = $cn->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->bindValue(2, $rol_nom);
            $query->execute();
        }

        /* Actualizar un rol */
        public function actualizar($rol_id, $suc_id, $rol_nom){
            $cn = parent::cn();
            $sql = "SP_U_ROL_01 ?, ?, ?";
            $query = $cn->prepare($sql);
            $query->bindValue(1, $rol_id);
            $query->bindValue(2, $suc_id);
            $query->bindValue(3, $rol_nom);
            $query->execute();
        }

        /* Validar acceso a un rol */
        public function validarAccesoRol($usu_id, $men_identi){
            $cn = parent::cn();
            $sql = "SP_L_MENU_03 ?, ?";
            $query = $cn->prepare($sql);
            $query->bindValue(1, $usu_id);
            $query->bindValue(2, $men_identi);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
