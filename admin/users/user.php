<?php
class User
{
    var $UserID = null;
    var $Name = null;
    var $Address = null;
    var $Phone = null;
    var $Email = null;
    var $Password = null;
    var $Status = null;
    var $Role = null;

    function getUser()
    {
        $db = new connect();
        $select = "SELECT * FROM users";
        return $db->pdo_query($select);
    }

    public function checkUserCustomer($Email, $Password)
    {
        $db = new connect();
        $select = "SELECT * from users WHERE email='$Email' AND password='$Password'";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }

    public function userid($Email, $Password)
    {   
        $db = new connect();
        $select = "SELECT user_id from users Where email='$Email' AND password='$Password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    public function loginSite($Email){
        $db = new connect();
        $select = "SELECT * from users Where email='$Email'";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    public function createAcc($Email, $Password){
        $db = new connect();
        $query = "INSERT INTO users (email, password) VALUES ('$Email', '$Password')";
        $result = $db->pdo_execute($query);
        return $result;
    }
    
    public function checkAccount($Email){
        $db = new connect();
        $select = "SELECT * from users WHERE email='$Email'";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return false;
        else
            return true;
    }

    public function getByEmail($Email){
        $db = new connect();
        $select = "SELECT * FROM users WHERE email LIKE '%$Email%'";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    public function updateUser($Username, $Address, $Phone, $userID){
        $db = new connect();
        $query = "UPDATE users SET name = '$Username', address = '$Address', phone = '$Phone' WHERE user_id = '$userID'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function changePassword($password, $userID){
        $db = new connect();
        $query = "UPDATE users SET password = '$password' WHERE user_id = '$userID'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function number_rows(){
        $db = new connect();
        $sql = "SELECT count(*) FROM users"; 
        $result = $db->pdo_execute($sql);
        $number_of_rows = $result->fetchColumn(); 
        return $number_of_rows;
    }

    public function deleUser($userID, $email) {
        $db = new connect();
        $query = "DELETE FROM users WHERE user_id = '$userID' AND email != '$email'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    public function deleCmtUser($userID){
        $db = new connect();
        $query = "DELETE FROM tb_comment WHERE user_id = '$userID'";
        $result = $db->pdo_query($query);
        return $result;
    }

    public function forgotPassword($email, $password){
        $db = new connect();
        $query = "UPDATE users SET password = '$password' WHERE email = '$email'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function lockUser($user_id){
        $db = new connect();
        $query = "UPDATE users SET status = 'Khóa' WHERE user_id = '$user_id'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function unLockUser($user_id){
        $db = new connect();
        $query = "UPDATE users SET status = 'Hoạt Động' WHERE user_id = '$user_id'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function getUserByID($user_id){
        $db = new connect();
        $select = "SELECT * FROM users WHERE user_id = '$user_id'";
        $result = $db->pdo_query_one($select);
        return $result;
    }
}

?>