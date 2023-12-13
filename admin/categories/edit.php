<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = new Category();
    $row = $db->getByID($id);

    if (isset($_POST['editCate'])) {
        $CateName = $_POST['categoryName'];
        $status = $_POST['status'];
        $image = $_FILES['image']['name'];
        if (isset($_FILES['image'])) {
            $file = $_FILES['image'];
            $file_name = $file['name'];
            if (empty($file_name)) {
                $file_name = $row['images'];
            } else {
                move_uploaded_file($file['tmp_name'], '../images/prod/' . $file_name);
            }
        }
        $edit = $db->update($CateName, $status, $file_name, $row['cate_id']);

        if (isset($edit)){
            if ($status == 'Ngừng kinh doanh'){
                $db->uptStatusNKD($id);
            } else {
                $db->uptStatusKD($id);
            }
        }

        echo "<script>document.location='index.php?page=listCategories';</script>";
    }
}
?>

<div class="container-fluid">
    <div class="card-header">
        <h2>Chỉnh Sửa Loại Hàng</h2>
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="form-floating mb-3 mt-3">
            <label>Thương Hiệu</label>
            <input type="text" class="form-control" placeholder="Nhập thương hiệu" name="categoryName" value="<?= $row['name'] ?>" required>
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Logo</label>
            <input type="file" class="form-control" name="image" value="<?= $row['images'] ?>">
            <img src="../images/prod/<?= $row['images'] ?>" alt="logo-brand" width="180px">
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Tình Trạng</label>
            <select class="form-control" name="status">
                <option value="Còn kinh doanh">Còn kinh doanh</option>
                <option value="Ngừng kinh doanh">Ngừng kinh doanh</option>
            </select>
        </div>
        <button name="editCate" class="btn btn-primary">Lưu</button>
    </form>
</div>