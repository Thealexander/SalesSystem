
<?php
    class Product extends Conexion{
        /* Retrieve a list of products based on the provided branch ID */
        public function list_products_by_branch_id($suc_id){
            $connection = parent::cn();
            $sql = "SP_L_PRODUCTO_01 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Retrieve information about a product based on the provided product ID */
        public function get_product_by_id($prod_id){
            $connection = parent::cn();
            $sql = "SP_L_PRODUCTO_02 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $prod_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Retrieve a list of products by category */
        public function list_products_by_category_id($cat_id){
            $connection = parent::cn();
            $sql = "SP_L_PRODUCTO_03 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $cat_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* Delete a product based on the provided product ID */
        public function delete_product($prod_id){
            $connection = parent::cn();
            $sql = "SP_D_PRODUCTO_01 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $prod_id);
            $query->execute();
        }

        /* Insert a new product with the provided details */
        public function insert_product($suc_id, $cat_id, $prod_nom, $prod_descrip, $und_id,
                                        $mon_id, $prod_pcompra, $prod_pventa, $prod_stock,
                                        $prod_fechaven, $prod_img){
            $connection = parent::cn();
            // Ensure that the image is uploaded properly
            $prod_img = $this->upload_image();
            $sql = "SP_I_PRODUCTO_01 ?,?,?,?,?,?,?,?,?,?,?,?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->bindValue(2, $cat_id);
            $query->bindValue(3, $prod_nom);
            $query->bindValue(4, $prod_descrip);
            $query->bindValue(5, $und_id);
            $query->bindValue(6, $mon_id);
            $query->bindValue(7, $prod_pcompra);
            $query->bindValue(8, $prod_pventa);
            $query->bindValue(9, $prod_stock);
            $query->bindValue(10, $prod_fechaven);
            $query->bindValue(11, $prod_img);
            $query->execute();
        }

        /* Update the information of an existing product */
        public function update_product($prod_id, $suc_id, $cat_id, $prod_nom, $prod_descrip, $und_id,
                                        $mon_id, $prod_pcompra, $prod_pventa, $prod_stock,
                                        $prod_fechaven, $prod_img){
            $connection = parent::cn();
            // Ensure that the image is uploaded properly
            $prod_img = $this->upload_image();
            $sql = "SP_U_PRODUCTO_01 ?,?,?,?,?,?,?,?,?,?,?,?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $prod_id);
            $query->bindValue(2, $suc_id);
            $query->bindValue(3, $cat_id);
            $query->bindValue(4, $prod_nom);
            $query->bindValue(5, $prod_descrip);
            $query->bindValue(6, $und_id);
            $query->bindValue(7, $mon_id);
            $query->bindValue(8, $prod_pcompra);
            $query->bindValue(9, $prod_pventa);
            $query->bindValue(10, $prod_stock);
            $query->bindValue(11, $prod_fechaven);
            $query->bindValue(12, $prod_img);
            $query->execute();
        }

        /* Upload product image */
        public function upload_image(){
            if (isset($_FILES["prod_img"])){
                $extension = explode('.', $_FILES['prod_img']['name']);
                $new_name = rand() . '.' . $extension[1];
                $destination = '../assets/producto/' . $new_name;
                move_uploaded_file($_FILES['prod_img']['tmp_name'], $destination);
                return $new_name;
            }
        }

        /* Retrieve product consumption information */
        public function get_product_consumption($prod_id){
            $connection = parent::cn();
            $sql = "SP_L_PRODUCTO_05 ?";
            $query = $connection->prepare($sql);
            $query->bindValue(1, $prod_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
