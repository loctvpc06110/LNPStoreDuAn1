<?php
    class Order{
        var $bill_id = null;
        var $order_time = null;
        var $quantity = null;
        var $price = null;
        var $commodity_codess = null;
        var $address = null;
        var $status = null;
        var $user_id = null;
        var $prod_id = null;
        var $payment = null;

        public function checkOrder($user_id){
            $db = new connect();
            $sql = "SELECT count(*) FROM bills WHERE user_id = '$user_id'"; 
            $result = $db->pdo_execute($sql);
            $number_of_rows = $result->fetchColumn(); 
            return $number_of_rows;
        }
    
        public function getBillGrByCode(){
            $db = new connect();
            $query = "SELECT * FROM bills 
            GROUP BY commodity_codes
            ORDER BY order_time DESC" ;
            $result = $db->pdo_query($query);
            return $result;
        }

        public function getBillGrByCodeUser($user_id){
            $db = new connect();
            $query = "SELECT * FROM bills
            WHERE user_id = '$user_id'
            GROUP BY commodity_codes
            ORDER BY order_time DESC" ;
            $result = $db->pdo_query($query);
            return $result;
        }
    
        public function countProd($commodity_codes){
            $db = new connect();
            $sql = "SELECT count(*) FROM bills WHERE commodity_codes = '$commodity_codes'"; 
            $result = $db->pdo_execute($sql);
            $number_of_rows = $result->fetchColumn(); 
            return $number_of_rows;
        }
    
        public function sumQuantity($commodity_codes){
            $db = new connect();
            $query = "SELECT SUM(quantity) AS total_quantity FROM bills WHERE commodity_codes = '$commodity_codes'";
            $result = $db->pdo_query_one($query);
            return $result;
        }
        
        public function totalPrice($commodity_codes){
            $db = new connect();
            $query = "SELECT SUM(quantity * price) AS total_price FROM bills WHERE commodity_codes = '$commodity_codes'";
            $result = $db->pdo_query_one($query);   
            return $result;
        }
    
        public function cencalOrder($code) {
            $db = new connect();
            $query = "DELETE FROM bills WHERE commodity_codes= '$code'";
            $result = $db->pdo_execute($query);
            return $result;
        }

        public function updateStatus($code, $status) {
            $db = new connect();
            $query = "UPDATE bills SET status = '$status' WHERE commodity_codes= '$code'";
            $result = $db->pdo_execute($query);
            return $result;
        }

        public function getOrderByCode($commodity_codes) {
            $db = new connect();
            $query = "SELECT * FROM bills WHERE commodity_codes = '$commodity_codes'";
            $result = $db->pdo_query($query);
            return $result;
        }
    
    }
?>