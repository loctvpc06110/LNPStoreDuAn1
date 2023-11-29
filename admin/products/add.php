<?php


if (isset($_POST['add_prd'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $price = $_POST['price'];
    $view = $_POST['view'];
    $promoID = $_POST['promoID'];
    $cateID = $_POST['cate_id'];



    $sql = "INSERT INTO tb_product(prd_name, prd_status, image, price, inventory, description, cateID) VALUES ('$prd_name', '$prd_status', '$image', $price, $inventory, '$description', 'cateID')";
    $query = mysqli_query($connect, $sql);
    move_uploaded_file($image_tmp, '../images/products/' . $image);
    header('location: index.php?page=_product');
}
if (isset($_POST['add_detail'])) {
    $sim = $_POST['sim'];
    $screen = $_POST['screen'];
    $battery = $_POST['battery'];
    $os = $_POST['os'];
    $camera = $_POST['camera'];
    $prod_id = $_POST['prod_id'];
    $camera_front = $_POST['camera_front'];
    $ram = $_POST['ram'];
    $rom = $_POST['rom'];

    $sql = "INSERT INTO detail_prod (sim, screen, battery, os, camera, prod_id, camera_front, chip, ram, rom) values '$sim', '$screen', '$battery', '$os', '$camera', '$prod_id', '$camera_front', '$chip', '$ram', '$rom')";
    $query = mysqli_query($connect, $sql);
    header('location: index.php?page=_product');
}
if (isset($_POST['add_image'])) {
    $prod_id = $_POST['prod_id'];
    $image = $_POST['image'];

    $sql = "INSERT INTO desc_image(prod_id, image) VALUES ('$prod_id', 'image')";
    $query = mysqli_query($connect, $sql);
    move_uploaded_file($image_tmp, '../images/products/' . $image);
    header('location: index.php?page=_product');
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>THÊM SẢN PHẨM</h2>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">ID sản phẩm</label>
                    <input type="text" name="prod_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="prd_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tình trạng</label><br>
                    <select name="status" class="form-control">
                        <option value="Available">Còn kinh doanh</option>
                        <option value="Unavailable">Ngừng kinh doanh</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh sản phẩm</label>
                    <input type="file" name="image_prod" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Ảnh mô tả</label>
                    <input type="file" name="image" class="form-control" required multiple>
                </div>
                <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Khuyến mãi</label>
                    <input type="number" name="promoID" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Mã danh mục</label> <br>
                    <input type="number" name="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Product Category</label><br>
                    <select name="cateID" class="form-control">
                        <?php
                        while ($row_cate = mysqli_fetch_assoc($query_cate)) { ?>
                            <option value="<?php echo $row_cate['cateID'] ?>"><?php echo $row_cate['cate_name'] ?></option>
                        <?php } ?>
                        ?>
                    </select>
                </div>
                <button name="add-prd" class="btn btn-success">Add Product</button>
            </form>
        </div>
    </div>
</div>