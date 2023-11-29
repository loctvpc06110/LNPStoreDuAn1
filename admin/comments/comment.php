<?php
    class Comment{
        var $cmtID = null;
        var $prodID = null;
        var $content = null;
        var $userID = null;
        var $createAt = null;
        
        public function getList() {
            $db = new connect();
            $query = "SELECT * FROM tb_comment";
            $result = $db->pdo_query($query);
            return $result;
        }

        public function getProductHaveComment() {
            $db = new connect();
            $query = "SELECT prod_id, tb_product.prd_name FROM tb_comment INNER JOIN tb_product ON tb_comment.prod_id = tb_product.productID GROUP BY prod_id";
            $result = $db->pdo_query($query);
            return $result;
        }

        public function getDetail($id) {
            $db = new connect();
            $query = "SELECT * FROM tb_comment INNER JOIN tb_user ON tb_comment.user_id = tb_user.user_id WHERE prod_id = $id";
            $result = $db->pdo_query($query);
            return $result;
        }

        public function getTotalComment($prodID) {
            $db = new connect();
            $query = "SELECT COUNT(*) AS totalCmt FROM `tb_comment` WHERE prod_id = $prodID;"; // viết câu lệnh sql select *
            $result = $db->pdo_query_one($query);
            return $result;
        }

        public function getLastComment($prodID) {
            $db = new connect();
            $query = "SELECT MAX(create_at) AS lastCmt FROM `tb_comment` WHERE prod_id = $prodID;"; // viết câu lệnh sql select *
            $result = $db->pdo_query_one($query);
            return $result;
        }

        public function createComment($prodID, $content, $userID){
            $db = new connect();
            $query = "INSERT INTO tb_comment (prod_id, content, user_id) values ('$prodID', '$content', '$userID')";
            $result = $db->pdo_execute($query);
            return $result;
        }

        public function showCommentByProdID($prodID){
            $db = new connect();
            $query = "SELECT * FROM tb_comment INNER JOIN tb_user ON tb_comment.user_id = tb_user.user_id WHERE prod_id = $prodID";
            $result = $db->pdo_query($query);
            return $result;
        }

        public function number_rows(){
            $db = new connect();
            $sql = "SELECT count(*) FROM tb_comment"; 
            $result = $db->pdo_execute($sql);
            $number_of_rows = $result->fetchColumn(); 
            return $number_of_rows;
        }
        public function cmt_month($month){
            $db = new connect();
            $sql = "SELECT COUNT(`cmt_id`) AS number_cmt FROM `tb_comment` WHERE month(create_at) = $month"; 
            $result = $db->pdo_execute($sql);
            $number_of_rows = $result->fetchColumn(); 
            return $number_of_rows;
        }
        
    }
    
?>