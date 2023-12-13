<?php
    if(isset($_GET['code'])){
        $commodityCode = $_GET['code'];
        $db = new Order();
        $cencalOrder = $db->cencalOrder($commodityCode);
        echo "<script>document.location='index.php?page=cart';</script>";
    }
?>