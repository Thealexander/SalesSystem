<?php
class Payment extends Conexion {
    /* List Records */
    public function get_payments() {
        try {
            $connection = $this->cn();
            $sql = "SP_L_PAYMENT_01";
            $query = $connection->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle the exception gracefully
            error_log("Error fetching payments: " . $e->getMessage());
            return []; // Return an empty array or throw an exception based on your application's requirements
        }
    }
}

?>