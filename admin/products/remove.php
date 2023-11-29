<?php 
    $id = $_GET['id'];
    $data = new Product();
    $dele = $data->delete($id);  
    echo "<script>document.location='index.php?page=listProducts';</script>";
?>