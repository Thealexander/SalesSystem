<?php
class Categoria extends Conexion {
    // Listar categorías por sucursal
    public function listarCategoriasPorSucursal($suc_id) {
        try {
            $conexion = parent::cn();
            $sql = "EXEC SP_L_CATEGORIA_01 ?";
            $query = $conexion->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener categorías: " . $e->getMessage());
        }
    }

    // Obtener categoría por ID
    public function obtenerCategoriaPorID($cat_id) {
        try {
            $conexion = parent::cn();
            $sql = "EXEC SP_L_CATEGORIA_02 ?";
            $query = $conexion->prepare($sql);
            $query->bindValue(1, $cat_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener categoría: " . $e->getMessage());
        }
    }

    // Eliminar categoría
    public function eliminarCategoria($cat_id) {
        try {
            $conexion = parent::cn();
            $sql = "EXEC SP_D_CATEGORIA_01 ?";
            $query = $conexion->prepare($sql);
            $query->bindValue(1, $cat_id);
            $query->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al eliminar categoría: " . $e->getMessage());
        }
    }

    // Insertar categoría
    public function insertarCategoria($suc_id, $cat_nom) {
        try {
            $conexion = parent::cn();
            $sql = "EXEC SP_I_CATEGORIA_01 ?, ?";
            $query = $conexion->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->bindValue(2, $cat_nom);
            $query->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al insertar categoría: " . $e->getMessage());
        }
    }

    // Actualizar categoría
    public function actualizarCategoria($cat_id, $suc_id, $cat_nom) {
        try {
            $conexion = parent::cn();
            $sql = "EXEC SP_U_CATEGORIA_01 ?, ?, ?";
            $query = $conexion->prepare($sql);
            $query->bindValue(1, $cat_id);
            $query->bindValue(2, $suc_id);
            $query->bindValue(3, $cat_nom);
            $query->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al actualizar categoría: " . $e->getMessage());
        }
    }

    // Obtener el total de stock por categoría
    public function obtenerTotalStockPorCategoria($suc_id) {
        try {
            $conexion = parent::cn();
            $sql = "EXEC SP_L_CATEGORIA_03 ?";
            $query = $conexion->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener el total de stock por categoría: " . $e->getMessage());
        }
    }
}
?>
