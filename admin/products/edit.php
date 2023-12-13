<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db_prod = new Product();
    $row_prod = $db_prod->getListDetailByID($id);
    $rows_image = $db_prod->getDescImage($id);
}
?>
<div class="container-fluid">
    <div class="card-header">
        <h2>Sửa Sản Phẩm</h2>
    </div>
    <form method="post" enctype="multipart/form-data">
        <label>Danh mục sản phẩm: </label>
        <select name="cate_id" class="form-floating mb-3 mt-3">
            <option value=<?= $row_prod['id_cate'] ?>><?= $row_prod['cate_name'] ?></option>
            <?php
            $db = new Category();
            $rows2 = $db->lishCategories();

            foreach ($rows2 as $row2) { ?>
                <option value=<?= $row2['cate_id'] ?>><?= $row2['name'] ?></option>
            <?php } ?>
        </select>
        <div class="form-floating mb-3 mt-3">
            <label>Tên sản phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="cateName" required value="<?= $row_prod['prod_name'] ?>">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Ảnh sản phẩm</label>
            <input type="file" class="form-control" name="imageProd">
            <img src="../images/prod/<?= $row_prod['prod_image'] ?>" alt="image-product" width="150px">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Giá sản phẩm</label>
            <input type="text" class="form-control" placeholder="Giá sản phẩm" name="catePrice" required value="<?= $row_prod['price'] ?>">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Tình Trạng</label>
            <select class="form-control" name="status">
                <option value="<?= $row_prod['prod_status'] ?>"><?= $row_prod['prod_status'] ?></option>
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

        <button tyle="submit" name="addCate" class="btn btn-primary">Sửa</button>
    </form>
</div>
<?php
if (isset($_POST['addCate'])) {
    $cate_id = $_POST['cate_id'];
    $name = $_POST['cateName'];
    $price = $_POST['catePrice'];

    $image = $_FILES['imageProd']['name'];
    if (isset($_FILES['imageProd'])) {
        $file = $_FILES['imageProd'];
        $file_name = $file['name'];
        if (empty($file_name)) {
            $file_name = $row_prod['prod_image'];
        } else {
            move_uploaded_file($file['tmp_name'], '../images/prod/' . $file_name);
        }
    }

    $status = $_POST['status'];
    $promo_id = $_POST['promoId'];
    $editProduct = $db_prod->updateProd($name, $price, $file_name, $status, $promo_id, $cate_id, $row_prod['id_prod']);

    if (isset($_FILES['imageProds'])) {
        $files = $_FILES['imageProds'];
        $files_name = $files['name'];
        if (!empty($files_name[0])) {
            $db_prod->deleteDescImageByProdID($id);
        }

        foreach ($files_name as $key => $value) {
            move_uploaded_file($files['tmp_name'][$key], '../images/prod/' . $value);
        }
    }

    $status = $_POST['status'];
    $promo_id = $_POST['promoId'];

    $db = new Product();
    $addProduct = $db->insertProd($name, $price, $image, $status, $promo_id, $cate_id);
    if (isset($addProduct)) {
        $row = $db->getByName($name);
        $prod_id = $row['prod_id'];

        foreach ($files_name as $key => $value) {
            $addImgs = $db->addImgs($prod_id, $value);
        }
    }
    $screen = $_POST['screen'];
    $os = $_POST['osName'];
    $camera = $_POST['camera'];
    $camera_front = $_POST['cameraFront'];
    $chip = $_POST['chipName'];
    $ram = $_POST['ramName'];
    $rom = $_POST['romName'];
    $sim = $_POST['simName'];
    $battery = $_POST['batteryName'];
    $addDetail = $db->addDetail($prod_id, $screen, $os, $camera, $camera_front, $chip, $ram, $rom, $sim, $battery);
}
?>
>>>>>>>>> Temporary merge branch 2
