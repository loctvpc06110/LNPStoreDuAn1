<div class="container-fluid">
    <div class="card-header">
        <h2>Thêm Sản Phẩm</h2>
    </div>
    <form action="?page=addProd" method="post" enctype="multipart/form-data">
    <label>Danh mục sản phẩm: </label>
    <select name="cate_id" class="form-floating mb-3 mt-3">
        <?php
        $db = new Category();
        $rows2 = $db->lishCategories();

        foreach ($rows2 as $row2) { ?>
            <option value=<?= $row2['cate_id']?>><?php echo $row2['name'] ?></option>
        <?php } ?>
    </select>
    <div class="form-floating mb-3 mt-3">
        <label>Tên sản phẩm</label>
        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="cateName" required>
    </div>
    <div class="form-floating mb-3 mt-3">
        <label>Ảnh sản phẩm</label>
        <input type="file" class="form-control" name="imageProd">
    </div>
    <div class="form-floating mb-3 mt-3">
        <label>Giá sản phẩm</label>
        <input type="text" class="form-control" placeholder="Giá sản phẩm" name="catePrice" required>
    </div>
    <div class="form-floating mb-3 mt-3">
        <label>Tình Trạng</label>
        <select class="form-control" name="status">
            <option value="Còn kinh doanh">Còn kinh doanh</option>
            <option value="Ngừng kinh doanh">Ngừng kinh doanh</option>
        </select>
    </div>
    <label>Khuyến mãi: </label>
    <select name="promoId" class="form-floating mb-3 mt-3">
        <?php
        $db = new Product();
        $rows1 = $db->listPromotions();
        foreach ($rows1 as $row1) { ?>
            <option value=<?= $row1['promo_id'] ?>><?= $row1['name'] ?></option>

        <?php } ?>
    </select>
    <div class="form-floating mb-3 mt-3">
        <label>Ảnh mô tả sản phẩm</label>
        <input type="file" class="form-control" name="imageProds[]" multiple>
    </div>
    <div class="form-floating mb-3 mt-3">
        <label>Cấu hình sản phẩm</label>
        <input type="text" class="form-control" placeholder="Nhập cấu hình sản phẩm" name="screen" required>
    </div>
    <div class="form-floating mb-3 mt-3">
        <label>Hệ điều hàng sản phẩm</label>
        <input type="text" class="form-control" placeholder="Nhập hệ điều hành sản phẩm" name="osName" required>
    </div>
    <div class="form-floating mb-3 mt-3">
        <label>Camera sản phẩm</label>
        <input type="text" class="form-control" placeholder="Nhập camera sản phẩm" name="camera" required>
    </div>
    <div class="form-floating mb-3 mt-3">
        <label>Camera trước sản phẩm</label>
        <input type="text" class="form-control" placeholder="Nhập camera trước sản phẩm" name="cameraFront" required>
    </div>
    <div class="form-floating mb-3 mt-3">
        <label>Chip sản phẩm</label>
        <input type="text" class="form-control" placeholder="Nhập chip sản phẩm" name="chipName" required>
    </div>
    <div class="form-floating mb-3 mt-3">
        <label>Ram sản phẩm</label>
        <input type="text" class="form-control" placeholder="Nhập ram sản phẩm" name="ramName" required>
    </div>
    <div class="form-floating mb-3 mt-3">
        <label>Rom sản phẩm</label>
        <input type="text" class="form-control" placeholder="Nhập rom sản phẩm" name="romName" required>
    </div>
    <div class="form-floating mb-3 mt-3">
        <label>Sim sản phẩm</label>
        <input type="text" class="form-control" placeholder="Nhập sim sản phẩm" name="simName" required>
    </div>
    <div class="form-floating mb-3 mt-3">
        <label>Pin sản phẩm</label>
        <input type="text" class="form-control" placeholder="Nhập pin sản phẩm" name="batteryName" required>
    </div>

    <button tyle="submit" name="addCate" class="btn btn-primary">Thêm</button>
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
    if (isset($addProduct)){
        $row = $db->getByName($name);
        $prod_id = $row['prod_id'];
        
        foreach ($files_name as $key => $value){
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