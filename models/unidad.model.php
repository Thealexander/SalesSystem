<?php
class Unidad extends Conexion {
    /* Listar Registros por ID de Sucursal */
    public function get_unidad_x_suc_id($suc_id) {
        try {
            $conectar = parent::cn();
            $sql = "EXEC SP_L_UNIDAD_01 ?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener unidades por ID de sucursal: " . $e->getMessage());
        }
    }

    /* Listar Registro por ID en específico */
    public function get_unidad_x_und_id($und_id) {
        try {
            $conectar = parent::cn();
            $sql = "EXEC SP_L_UNIDAD_02 ?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $und_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener unidad por ID: " . $e->getMessage());
        }
    }

    /* Eliminar o cambiar estado a eliminado */
    public function delete_unidad($und_id) {
        try {
            $conectar = parent::cn();
            $sql = "EXEC SP_D_UNIDAD_01 ?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $und_id);
            $query->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al eliminar unidad: " . $e->getMessage());
        }
    }

    /* Registro de datos */
    public function insert_unidad($suc_id, $und_nom) {
        try {
            $conectar = parent::cn();
            $sql = "EXEC SP_I_UNIDAD_01 ?,?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->bindValue(2, $und_nom);
            $query->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al insertar unidad: " . $e->getMessage());
        }
    }

    /* Actualizar Datos */
    public function update_unidad($und_id, $suc_id, $und_nom) {
        try {
            $conectar = parent::cn();
            $sql = "EXEC SP_U_UNIDAD_01 ?,?,?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $und_id);
            $query->bindValue(2, $suc_id);
            $query->bindValue(3, $und_nom);
            $query->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al actualizar unidad: " . $e->getMessage());
        }
    }
}
?>
