<?php 
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $db_prod = new Product();
    $dele = $db_prod->removeProd($id);
    echo "<script>document.location='index.php?page=listProducts';</script>";
}
?>