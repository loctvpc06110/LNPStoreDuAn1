<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Quản Lý Loại Sản Phẩm</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="?page=addCate"><button class="btn text-gray-100 bg-gradient-primary">Thêm Loại</button></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                   
                        <th>Thương Hiệu</th>
                        <th>Logo</th>
                        <th>Tình Trạng</th>
                        <th>Chỉnh Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
    
                        <th>Thương Hiệu</th>
                        <th>Logo</th>
                        <th>Tình Trạng</th>
                        <th>Chỉnh Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $dblist = new Category();
                    $rows = $dblist->getList();

                    foreach ($rows as $row) { ?>
                        <tr>
                          
                            <td><?= $row['name'] ?></td>
                            <td style="text-align: center;"><img src="../images/prod/<?php echo $row['images'] ?>" alt="Image" width="120px"></td>
                            <td><?= $row['status'] ?></td>
                            <td style="text-align: center;"><a href="?page=editCate&id=<?= $row['cate_id'] ?>" class="nav-link"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td onclick=" return confirm('Bạn có chắc rằng muốn xóa ?');" style="text-align: center;"><a href="?page=removeCate&id=<?= $row['cate_id'] ?>" class="nav-link"><i class="fa-regular fa-circle-xmark"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>