<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = new Category();
    $row = $data->getByID($id);

    if (isset($_POST['editCate'])) {
        $CateName = $_POST['categoryName'];
        $status = $_POST['status'];
        $edit = $data->update($CateName, $status, $row['cate_id']);
        echo "<script>document.location='index.php?page=listCategories';</script>";
    }
}
?>

<div class="container-fluid">
    <div class="card-header">
        <h2>Chỉnh Sửa Loại Hàng</h2>
    </div>
    <form method="post">
        <div class="form-floating mb-3 mt-3">
            <label>Tên</label>
            <input type="text" class="form-control" placeholder="Enter Category Name" name="categoryName" value="<?= $row['name'] ?>" required>
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Tình Trạng</label>
            <select class="form-control" name="status">
                <option value="Còn kinh doanh">Còn kinh doanh</option>
                <option value="Ngừng kinh doanh">Ngừng kinh doanh</option>
            </select>
        </div>
        <button name="editCate" class="btn btn-primary">Lưa</button>
    </form>
</div>