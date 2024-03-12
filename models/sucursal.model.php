<?php
    class Sucursal extends Conexion{
        /* Retrieve a list of branches based on the provided company ID */
        public function get_branches_by_company_id($emp_id){
            $connection = parent::cn();
            $sql = "SP_L_SUCURSAL_01 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $emp_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Retrieve information about a branch based on the provided branch ID */
        public function get_branch_by_id($suc_id){
            $connection = parent::cn();
            $sql = "SP_L_SUCURSAL_02 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Delete a branch based on the provided branch ID */
        public function delete_branch($suc_id){
            $connection = parent::cn();
            $sql = "SP_D_SUCURSAL_01 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->execute();
        }

        /* Insert a new branch with the provided company ID and branch name */
        public function insert_branch($emp_id, $suc_nom){
            $connection = parent::cn();
            $sql = "SP_I_SUCURSAL_01 ?, ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $emp_id);
            $query->bindValue(2, $suc_nom);
            $query->execute();
        }

        /* Update the information of an existing branch based on the provided branch ID, including company ID and branch name */
        public function update_branch($suc_id, $emp_id, $suc_nom){
            $connection = parent::cn();
            $sql = "SP_U_SUCURSAL_01 ?, ?, ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->bindValue(2, $emp_id);
            $query->bindValue(3, $suc_nom);
            $query->execute();
        }
    }
?>
