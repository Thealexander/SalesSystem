<?php
class Menu extends Conexion {
    /* List Records */
    public function get_menu_by_role_id($role_id) {
        try {
            $connection = $this->cn();
            $sql = "SP_L_MENU_01 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $role_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle the exception gracefully
            error_log("Error fetching menu: " . $e->getMessage());
            return []; // Return an empty array or throw an exception based on your application's requirements
        }
    }

    /* Automatically Insert Detail for Menu */
    public function insert_menu_detail_by_role_id($role_id) {
        try {
            $connection = $this->cn();
            $sql = "SP_I_MENU_02 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $role_id);
            $query->execute();
            return true; // Return true or appropriate response based on success
        } catch (PDOException $e) {
            // Handle the exception gracefully
            error_log("Error inserting menu detail: " . $e->getMessage());
            return false; // Return false or appropriate response based on failure
        }
    }

    /* Enable Role Permission */
    public function enable_menu_permission($menu_id) {
        try {
            $connection = $this->cn();
            $sql = "SP_U_MENU_01 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $menu_id);
            $query->execute();
            return true; // Return true or appropriate response based on success
        } catch (PDOException $e) {
            // Handle the exception gracefully
            error_log("Error enabling menu permission: " . $e->getMessage());
            return false; // Return false or appropriate response based on failure
        }
    }

    /* Disable Role Permission */
    public function disable_menu_permission($menu_id) {
        try {
            $connection = $this->cn();
            $sql = "SP_U_MENU_02 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $menu_id);
            $query->execute();
            return true; // Return true or appropriate response based on success
        } catch (PDOException $e) {
            // Handle the exception gracefully
            error_log("Error disabling menu permission: " . $e->getMessage());
            return false; // Return false or appropriate response based on failure
        }
    }
}

?>