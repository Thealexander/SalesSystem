<?php
    class User extends Conexion{
        /* List Records */
        public function listUsersByBranch($branch_id){
            $conn = parent::cn();
            $sql = "SP_L_USER_01 ?";
            $query = $conn->prepare($sql);
            $query->bindValue(1, $branch_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Get Record by ID */
        public function getUserByID($user_id){
            $conn = parent::cn();
            $sql = "SP_L_USER_02 ?";
            $query = $conn->prepare($sql);
            $query->bindValue(1, $user_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Delete or Change Status to Deleted */
        public function deleteUser($user_id){
            $conn = parent::cn();
            $sql = "SP_D_USER_01 ?";
            $query = $conn->prepare($sql);
            $query->bindValue(1, $user_id);
            $query->execute();
        }

        /* Insert Data */
        public function insertUser($branch_id, $user_email, $user_fname, $user_lname, $user_dni, $user_phone, $user_pass, $role_id, $user_img){
            $conn = parent::cn();

            $sql = "SP_I_USER_01 ?,?,?,?,?,?,?,?,?";
            $query = $conn->prepare($sql);
            $query->bindValue(1, $branch_id);
            $query->bindValue(2, $user_email);
            $query->bindValue(3, $user_fname);
            $query->bindValue(4, $user_lname);
            $query->bindValue(5, $user_dni);
            $query->bindValue(6, $user_phone);
            $query->bindValue(7, $user_pass);
            $query->bindValue(8, $role_id);
            $query->bindValue(9, $user_img);
            $query->execute();
        }

        /* Update Data */
        public function updateUser($user_id, $branch_id, $user_email, $user_fname, $user_lname, $user_dni, $user_phone, $user_pass, $role_id, $user_img){
            $conn = parent::cn();

            $sql = "SP_U_USER_01 ?,?,?,?,?,?,?,?,?,?";
            $query = $conn->prepare($sql);
            $query->bindValue(1, $user_id);
            $query->bindValue(2, $branch_id);
            $query->bindValue(3, $user_email);
            $query->bindValue(4, $user_fname);
            $query->bindValue(5, $user_lname);
            $query->bindValue(6, $user_dni);
            $query->bindValue(7, $user_phone);
            $query->bindValue(8, $user_pass);
            $query->bindValue(9, $role_id);
            $query->bindValue(10, $user_img);
            $query->execute();
        }

        /* Update User Password */
        public function updateUserPassword($user_id, $user_pass){
            $conn = parent::cn();
            $sql = "SP_U_USER_02 ?,?";
            $query = $conn->prepare($sql);
            $query->bindValue(1, $user_id);
            $query->bindValue(2, $user_pass);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* System Access */
        public function login(){
            $conn = parent::cn();
            if (isset($_POST["submit"])){
                $branch = $_POST["branch_id"];
                $email = $_POST["user_email"];
                $pass =  $_POST["user_pass"];
                if (empty($branch) and empty($email) and empty($pass)){
                    exit();
                }else{
                    $sql = "SP_L_USER_04 ?,?,?";
                    $query = $conn->prepare($sql);
                    $query->bindValue(1, $branch);
                    $query->bindValue(2, $email);
                    $query->bindValue(3, $pass);
                    $query->execute();
                    $result = $query->fetch();
                    if (is_array($result) and count($result) > 0){
                        $_SESSION["USER_ID"] = $result["USER_ID"];
                        $_SESSION["USER_FNAME"] = $result["USER_FNAME"];
                        $_SESSION["USER_LNAME"] = $result["USER_LNAME"];
                        $_SESSION["USER_EMAIL"] = $result["USER_EMAIL"];
                        $_SESSION["BRANCH_ID"] = $result["BRANCH_ID"];
                        $_SESSION["COMPANY_ID"] = $result["COMPANY_ID"];
                        $_SESSION["EMPLOYEE_ID"] = $result["EMPLOYEE_ID"];
                        $_SESSION["ROLE_ID"] = $result["ROLE_ID"];
                        $_SESSION["USER_IMG"] = $result["USER_IMG"];
                        header("Location:".Conexion::ruta()."view/home/");
                    }else{
                        exit();
                    }
                }
            }else{
                exit();
            }
        }

        /* Upload User Image */
        public function uploadImage(){
            if (isset($_FILES["user_img"])){
                $extension = explode('.', $_FILES['user_img']['name']);
                $new_name = rand() . '.' . $extension[1];
                $destination = '../assets/user/' . $new_name;
                move_uploaded_file($_FILES['user_img']['tmp_name'], $destination);
                return $new_name;
            }
        }
    }
?>
