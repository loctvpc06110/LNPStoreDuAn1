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
        <button name="addCate" class="btn btn-primary">Thêm</button>
    </form>
</div>

<?php
    if (isset($_POST['addCate'])) {
        $cateName = $_POST['cateName'];
        $status = $_POST['status'];
        $db = new Category();
        $addPro = $db->add($cateName, $status);
        echo "<script>document.location='index.php?page=listCategories';</script>";
    }
?>
