<?php
    class Client extends Conexion{
        /* Retrieve a list of clients based on the provided company ID */
        public function get_clients_by_company_id($emp_id){
            $connection = parent::cn();
            $sql = "SP_L_CLIENTE_01 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $emp_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Retrieve information about a client based on the provided client ID */
        public function get_client_by_id($cli_id){
            $connection = parent::cn();
            $sql = "SP_L_CLIENTE_02 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $cli_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Delete a client based on the provided client ID */
        public function delete_client($cli_id){
            $connection = parent::cn();
            $sql = "SP_D_CLIENTE_01 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $cli_id);
            $query->execute();
        }

        /* Insert a new client with the provided details */
        public function insert_client($emp_id, $cli_nom, $cli_ruc, $cli_telf, $cli_direcc, $cli_correo){
            $connection = parent::cn();
            $sql = "SP_I_CLIENTE_01 ?, ?, ?, ?, ?, ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $emp_id);
            $query->bindValue(2, $cli_nom);
            $query->bindValue(3, $cli_ruc);
            $query->bindValue(4, $cli_telf);
            $query->bindValue(5, $cli_direcc);
            $query->bindValue(6, $cli_correo);
            $query->execute();
        }

        /* Update the information of an existing client */
        public function update_client($cli_id, $emp_id, $cli_nom, $cli_ruc, $cli_telf, $cli_direcc, $cli_correo){
            $connection = parent::cn();
            $sql = "SP_U_CLIENTE_01 ?, ?, ?, ?, ?, ?, ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $cli_id);
            $query->bindValue(2, $emp_id);
            $query->bindValue(3, $cli_nom);
            $query->bindValue(4, $cli_ruc);
            $query->bindValue(5, $cli_telf);
            $query->bindValue(6, $cli_direcc);
            $query->bindValue(7, $cli_correo);
            $query->execute();
        }
    }
?>
