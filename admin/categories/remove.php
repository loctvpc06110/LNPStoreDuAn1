<?php 
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $db = new Category();
    $checkProd = $db->checkProduct($id);
    if ($checkProd == 0){
        $dele = $db->removeCate($id);
        echo "<script>document.location='index.php?page=listCategories';</script>";
    }
    else {
        echo "<script>alert ('Không thể xóa vì có sản phẩm !');</script>";
        echo "<script>document.location='index.php?page=listCategories';</script>";
    }
}
?>
<script>
    alert
</script>