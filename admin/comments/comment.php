<?php
    class Comment{
        var $cmtID = null;
        var $prodID = null;
        var $content = null;
        var $createAt = null;
        var $userID = null;
        var $status = null;
        
        public function getList() {
            $db = new connect();
            $query = "SELECT * FROM comments";
            $result = $db->pdo_query($query);
            return $result;
        }

        public function getProductHaveComment() {
            $db = new connect();
            $query = "SELECT *, products.prod_id AS id_prod FROM comments INNER JOIN products ON comments.prod_id = products.prod_id GROUP BY id_prod";
            $result = $db->pdo_query($query);
            return $result;
        }

        public function getDetail($id) {
            $db = new connect();
            $query = "SELECT *, comments.status AS status_cmt FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE prod_id = $id";
            $result = $db->pdo_query($query);
            return $result;
        }

        public function getTotalComment($prodID) {
            $db = new connect();
            $query = "SELECT COUNT(*) AS totalCmt FROM `comments` WHERE prod_id = $prodID;"; // viết câu lệnh sql select *
            $result = $db->pdo_query_one($query);
            return $result;
        }

        public function getLastComment($prodID) {
            $db = new connect();
            $query = "SELECT MAX(create_at) AS lastCmt FROM `comments` WHERE prod_id = $prodID;"; // viết câu lệnh sql select *
            $result = $db->pdo_query_one($query);
            return $result;
        }

        public function createComment($prodID, $content, $userID){
            $db = new connect();
            $query = "INSERT INTO comments (prod_id, content, user_id) values ('$prodID', '$content', '$userID')";
            $result = $db->pdo_execute($query);
            return $result;
        }

        public function showCommentByProdID($prodID){
            $db = new connect();
            $query = "SELECT * FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE prod_id = $prodID";
            $result = $db->pdo_query($query);
            return $result;
        }

        public function number_rows(){
            $db = new connect();
            $sql = "SELECT count(*) FROM comments"; 
            $result = $db->pdo_execute($sql);
            $number_of_rows = $result->fetchColumn(); 
            return $number_of_rows;
        }
        
        public function cmt_month($month){
            $db = new connect();
            $sql = "SELECT COUNT(`cmt_id`) AS number_cmt FROM `comments` WHERE month(create_at) = $month"; 
            $result = $db->pdo_execute($sql);
            $number_of_rows = $result->fetchColumn(); 
            return $number_of_rows;
        }

        public function hiddenCmt($cmtID){
            $db = new connect();
            $query = "UPDATE comments SET status = 'Ẩn' WHERE cmt_id = '$cmtID'";
            $result = $db->pdo_execute($query);
        return $result;
        }
        
        public function visibleCmt($cmtID){
            $db = new connect();
            $query = "UPDATE comments SET status = 'Hiện' WHERE cmt_id = '$cmtID'";
            $result = $db->pdo_execute($query);
        return $result;
        }
    }
    
?>