<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db_prod = new Product();
    $row_prod = $db_prod->editProdByID($id);
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
                <option value="Ngừng kinh doanh">Ngừng kinh doanh</option>
                <option value="Đang bán">Đang bán</option>
            </select>
        </div>
        <label>Khuyến mãi: </label>
        <select name="promoId" class="form-floating mb-3 mt-3">
            <option value=<?= $row_prod['id_promo'] ?>><?= $row_prod['promo_name'] ?></option>
            <?php
            $db = new Product();
            $rows_promo = $db->listPromotions();

            foreach ($rows_promo as $row_promo) { ?>

                <option value=<?= $row_promo['promo_id'] ?>><?= $row_promo['name'] ?></option>

            <?php } ?>
        </select>
        <div class="form-floating mb-3 mt-3">
            <label>Ảnh mô tả sản phẩm</label>
            <input type="file" class="form-control" name="imageProds[]" multiple>
            <div class="row">
                <?php
                foreach ($rows_image as $key => $value) { ?>
                    <div class="col-md-4">
                        <a href="#" class="thumbnail">
                            <img src="../images/prod/<?= $value['image'] ?>" alt="descriptionImg" style="width: 150px;">
                        </a>
                    </div>
                <?php }
                ?>

            </div>
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Cấu hình sản phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập cấu hình sản phẩm" name="screen" required value="<?= $row_prod['screen'] ?>">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Hệ điều hàng sản phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập hệ điều hành sản phẩm" name="osName" required value="<?= $row_prod['os'] ?>">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Camera sản phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập camera sản phẩm" name="camera" required value="<?= $row_prod['camera'] ?>">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Camera trước sản phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập camera trước sản phẩm" name="cameraFront" required value="<?= $row_prod['camera_front'] ?>">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Chip sản phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập chip sản phẩm" name="chipName" required value="<?= $row_prod['chip'] ?>">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Ram sản phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập ram sản phẩm" name="ramName" required value="<?= $row_prod['ram'] ?>">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Rom sản phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập rom sản phẩm" name="romName" required value="<?= $row_prod['rom'] ?>">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Sim sản phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập sim sản phẩm" name="simName" required value="<?= $row_prod['sim'] ?>">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Pin sản phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập pin sản phẩm" name="batteryName" required value="<?= $row_prod['battery'] ?>">
        </div>

        <button tyle="submit" name="editProd" class="btn btn-primary">Lưu</button>
    </form>
</div>
<?php
if (isset($_POST['editProd'])) {
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
        if (isset($editProduct)) {
            foreach ($files_name as $key => $value) {
                $addImgs = $db_prod->addImgs($id, $value);
            }
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
    $addDetail = $db_prod->upDetail($screen, $os, $camera, $camera_front, $chip, $ram, $rom, $sim, $battery, $row_prod['id_prod']);
    echo "<script>document.location='index.php?page=listProducts';</script>";
}
?>