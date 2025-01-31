<?php
    class Product{
        private $db;

        public function __construct($db){
            $this->db = $db->connection;
        }

        public function addProduct($name,$price,$sale_price,$category,$image,$descripation,$rating,$label,$label_bg){
            $sql = "INSERT INTO `products`(id,name,price,sale_price,category,`image`,`descripation`,rating,label,label_bg) 
            VALUES(NULL,'$name','$price','$sale_price','$category','$image','$descripation','$rating','$label','$label_bg')";
            return $this->db->query($sql);
        }

        public function getAllProduct(){
            $sql = "SELECT * FROM products";
            // return $this->db->query($sql);
            $result = $this->db->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
            }

        public function updateProduct($id, $name, $price, $sale_price, $category, $image, $descripation, $rating, $label, $label_bg){
            
            $sale_price = !empty($sale_price) ? "'$sale_price'" : "NULL";

            $sql = "UPDATE `products` SET 
                    name = '$name',  
                    price = $price, 
                    sale_price = $sale_price, 
                    category = '$category',
                    rating = $rating, 
                    image = '$image', 
                    label = '$label', 
                    label_bg = '$label_bg',
                    descripation = '$descripation'
                    WHERE id = $id";
            return $this->db->query($sql);
        }

        public function deleteProduct($id) {
            $sql = "DELETE FROM products WHERE id = $id";
            return $this->db->query($sql);
        }

        public function getProductsByCategory($category) {
            $query = "SELECT * FROM products WHERE category = '$category'";
            $result = $this->db->query($query);
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getProductsById($id) {
            $query = "SELECT * FROM products WHERE id = '$id'";
            $result = $this->db->query($query);
            return $result->fetch_assoc();
        }
    }
?>