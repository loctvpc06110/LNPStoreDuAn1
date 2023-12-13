<div class="container-fluid">
    <div class="card-header">
        <h2>Thêm Loại Hàng</h2>
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="form-floating mb-3 mt-3">
            <label>Tên</label>
            <input type="text" class="form-control" placeholder="Nhập tên loại hàng" name="cateName" required>
        </div>
        <div class="form-floating mb-3 mt-3">
        <label>Tình Trạng</label>
            <select class="form-control" name="status">
                <option value="Còn kinh doanh">Còn kinh doanh</option>
                <option value="Ngừng kinh doanh">Ngừng kinh doanh</option>
            </select>
        </div>
        <div class="form-floating mb-3 mt-3">
        <label>Logo</label>
            <input type="file" class="form-control" name="cateImage">     
        </div>
        <button name="addCate" class="btn btn-primary">Thêm</button>
    </form>
</div>

<?php
    if (isset($_POST['addCate'])) {
        $cateName = $_POST['cateName'];
        $status = $_POST['status'];

        $image = $_FILES['cateImage']['name'];
        if (isset($_FILES['cateImage'])) {
            $file = $_FILES['cateImage'];
            $file_name = $file['name'];
            move_uploaded_file($file['tmp_name'], '../images/prod/' . $file_name);
        }
    
        $db = new Category();
        $addPro = $db->add($cateName, $status, $image);
        echo "<script>document.location='index.php?page=listCategories';</script>";
    }
?>
