<?php
    class Business extends Conexion{
        /* List Records by Business ID */
        public function getBusinessByBusinessId($com_id){
            $connect = parent::cn();
            $sql = "SP_L_EMPRESA_01 ?";
            $query = $connect->prepare($sql);
            $query->bindValue(1, $com_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* List Record by Specific ID */
        public function getBusinessByEmployeeId($emp_id){
            $connect = parent::cn();
            $sql = "SP_L_EMPRESA_02 ?";
            $query = $connect->prepare($sql);
            $query->bindValue(1, $emp_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Delete or Change Status to Deleted */
        public function deleteBusiness($emp_id){
            $connect = parent::cn();
            $sql = "SP_D_EMPRESA_01 ?";
            $query = $connect->prepare($sql);
            $query->bindValue(1, $emp_id);
            $query->execute();
        }

        /* Data Registration */
        public function insertBusiness($com_id, $emp_name, $emp_ruc){
            $connect = parent::cn();
            $sql = "SP_I_EMPRESA_01 ?,?,?";
            $query = $connect->prepare($sql);
            $query->bindValue(1, $com_id);
            $query->bindValue(2, $emp_name);
            $query->bindValue(3, $emp_ruc);
            $query->execute();
        }

        /* Update Data */
        public function updateBusiness($emp_id, $com_id, $emp_name, $emp_ruc){
            $connect = parent::cn();
            $sql = "SP_U_EMPRESA_01 ?,?,?,?";
            $query = $connect->prepare($sql);
            $query->bindValue(1, $emp_id);
            $query->bindValue(2, $com_id);
            $query->bindValue(3, $emp_name);
            $query->bindValue(4, $emp_ruc);
            $query->execute();
        }
    }
?>
