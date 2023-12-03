<?php
    if (isset($_GET['code'])){
        $code = $_GET['code'];
        if (isset($_POST['updStatusOrder'])){
            $nowStatus = $_POST['status'];
            $db = new Order();
            $updeateStt = $db->updateStatus($code, $nowStatus);
            echo "<script>document.location='index.php?page=listOrders';</script>";

        }
    }
?>