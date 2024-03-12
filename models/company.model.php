<?php
    class Compania extends Conexion{
        /* Listar todas las compañías */
        public function listarCompanias(){
            $cn = parent::cn();
            $sql = "SP_L_COMPANIA_01";
            $query = $cn->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Obtener una compañía por su ID */
        public function obtenerPorID($com_id){
            $cn = parent::cn();
            $sql = "SP_L_COMPANIA_02 ?";
            $query = $cn->prepare($sql);
            $query->bindValue(1, $com_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Eliminar una compañía por su ID */
        public function eliminar($com_id){
            $cn = parent::cn();
            $sql = "SP_D_COMPANIA_01 ?";
            $query = $cn->prepare($sql);
            $query->bindValue(1, $com_id);
            $query->execute();
        }

        /* Insertar una nueva compañía */
        public function insertar($com_nom){
            $cn = parent::cn();
            $sql = "SP_I_COMPANIA_01 ?";
            $query = $cn->prepare($sql);
            $query->bindValue(1, $com_nom);
            $query->execute();
        }

        /* Actualizar una compañía */
        public function actualizar($com_id, $com_nom){
            $cn = parent::cn();
            $sql = "SP_U_COMPANIA_01 ?, ?";
            $query = $cn->prepare($sql);
            $query->bindValue(1, $com_id);
            $query->bindValue(2, $com_nom);
            $query->execute();
        }
    }
?>
