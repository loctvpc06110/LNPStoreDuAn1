<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $db = new User();
        $rowUser = $db->getUserByID($id);
        $status = $rowUser['status'];
        if ($status == "Hoạt Động"){
            $lock = $db->lockUser($id);
        }else{
            $unLock = $db->unLockUser($id);
        }
        echo "<script>document.location='index.php?page=listUsers';</script>";
    }
?>