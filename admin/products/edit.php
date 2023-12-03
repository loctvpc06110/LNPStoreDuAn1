<div class="container-fluid">
    <div class="card-header">
        <h2>Sửa Sản Phẩm</h2>
    </div>
    <form action="?page=editProd" method="post" enctype="multipart/form-data">
        <label>Danh mục sản phẩm: </label>
        <select name="cate_id" class="form-floating mb-3 mt-3">
            <?php
            $dblist = new Product();
            $rows = $dblist->editList($id);
            echo '<option value="'. $rows['prod_id'] .'">'.$rows['cate_name'] .'</option>'; 
            foreach ($rows as $row) { ?>
                <option value="<?= $row['prod_id'] ?>"><?php echo $row['cate_name'] ?></option>
            <?php } ?>
        </select>
        <div class="form-floating mb-3 mt-3">
            <label>Tên sản phẩm</label>
            <input type="text" class="form-control" name="cateName" value="<?= $row['prod_name'] ?>">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Ảnh sản phẩm</label>
            <input type="file" class="form-control" name="imageProd" value="<?= $row['image'] ?>">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Giá sản phẩm</label>
            <input type="text" class="form-control" name="catePrice" value="<?= $row['price'] ?> VNĐ">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Tình Trạng</label>
            <select class="form-control" name="status">
                <option value="Còn kinh doanh">Còn kinh doanh</option>
                <option value="Ngừng kinh doanh">Ngừng kinh doanh</option>
            </select>
        </div>
        <label>Khuyến mãi: </label>
        <select name="promoId" class="form-floating mb-3 mt-3" value="<?= $row['promo_name'] ?>">
            <?php
            $db = new Product();
            $rows1 = $db->prodPromo();

            foreach ($rows1 as $row1) { ?>

                <option value=<?php echo $row1['promo_id'] ?>><?php echo $row1['promo_name'] ?></option>

            <?php } ?>
        </select><br>

        <button tyle="submit" name="editCate" class="btn btn-primary">Sửa</button>
    </form>
</div>
<?php
if (isset($_POST['editCate'])) {
    $cate_id = $_POST['cate_id'];
    $name = $_POST['cateName'];
    $price = $_POST['catePrice'];

    $image = $_FILES['imageProd']['name'];
    if (isset($_FILES['imageProd'])) {
        $file = $_FILES['imageProd'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'], '../images/prod/' . $file_name);
    }
    if (isset($_FILES['imageProds'])) {
        $files = $_FILES['imageProds'];
        $files_name = $files['name'];

        foreach ($files_name as $key => $value) {
            move_uploaded_file($files['tmp_name'][$key], '../images/prod/' . $value);
        }
    }

    $status = $_POST['status'];
    $promo_id = $_POST['promoId'];

    $db = new Product();
    $addProduct = $db->insertProd($name, $price, $image, $status, $promo_id, $cate_id);    
}
<?php 
    
?>