<?php
    class Question
    {
        var $ques_id = null;
        var $question = null;
        var $creat_at = null;
        var $user_id = null;
    
        public function createQues($question, $user_id){
            $db = new connect();
            $query = "INSERT INTO questions (question, user_id) values ('$question', '$user_id')";
            $result = $db->pdo_execute($query);
            return $result;
        }

        public function getList(){
            $db = new connect();
            $query = "SELECT * FROM questions INNER JOIN users ON questions.user_id = users.user_id";
            $result = $db->pdo_query($query);
            return $result;
        }
    }
?>