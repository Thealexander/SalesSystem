<?php
    class Supplier extends Conexion{
        /* Retrieve a list of suppliers based on the provided company ID */
        public function get_suppliers_by_company_id($emp_id){
            $connection = parent::cn();
            $sql = "SP_L_PROVEEDOR_01 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $emp_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Retrieve information about a supplier based on the provided supplier ID */
        public function get_supplier_by_id($prov_id){
            $connection = parent::cn();
            $sql = "SP_L_PROVEEDOR_02 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $prov_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Delete a supplier based on the provided supplier ID */
        public function delete_supplier($prov_id){
            $connection = parent::cn();
            $sql = "SP_D_PROVEEDOR_01 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $prov_id);
            $query->execute();
        }

        /* Insert a new supplier with the provided details */
        public function insert_supplier($emp_id, $prov_nom, $prov_ruc, $prov_telf, $prov_direcc, $prov_correo){
            $connection = parent::cn();
            $sql = "SP_I_PROVEEDOR_01 ?, ?, ?, ?, ?, ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $emp_id);
            $query->bindValue(2, $prov_nom);
            $query->bindValue(3, $prov_ruc);
            $query->bindValue(4, $prov_telf);
            $query->bindValue(5, $prov_direcc);
            $query->bindValue(6, $prov_correo);
            $query->execute();
        }

        /* Update the information of an existing supplier */
        public function update_supplier($prov_id, $emp_id, $prov_nom, $prov_ruc, $prov_telf, $prov_direcc, $prov_correo){
            $connection = parent::cn();
            $sql = "SP_U_PROVEEDOR_01 ?, ?, ?, ?, ?, ?, ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $prov_id);
            $query->bindValue(2, $emp_id);
            $query->bindValue(3, $prov_nom);
            $query->bindValue(4, $prov_ruc);
            $query->bindValue(5, $prov_telf);
            $query->bindValue(6, $prov_direcc);
            $query->bindValue(7, $prov_correo);
            $query->execute();
        }
    }
?>
