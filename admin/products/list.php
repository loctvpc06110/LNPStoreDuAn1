<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Danh Sách Sản Phẩm</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="?page=addProd"><button class="btn text-gray-100 bg-gradient-primary">Thêm Sản Phẩm</button></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sản Phẩm</th>
                        <th>Tình Trạng</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Khuyến Mãi</th>
                        <th>Thương Hiệu</th>
                        <th>Lượt xem</th>
                        <th>Chỉnh Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Sản Phẩm</th>
                        <th>Tình Trạng</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Khuyến Mãi</th>
                        <th>Thương Hiệu</th>
                        <th>Lượt xem</th>
                        <th>Chỉnh Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $dblist = new Product();
                    $rows = $dblist->getList();

                    foreach ($rows as $row) { ?>
                        <tr>
                            <td>
                                <?= $row['prod_id'] ?>
                            </td>
                            <td>
                                <?= $row['prod_name'] ?>
                            </td>
                            <td>
                                <?= $row['prod_status'] ?>
                            </td>
                            <td>
                                <img src="../images/prod/<?= $row['image'] ?>" alt="image-product" width="80px">
                            </td>
                            <td>
                                <?= $dblist->format_price($row['price']) ?> VNĐ
                            </td>
                            <td>
                                <?= $row['promo_name'] ?>
                            </td>
                            <td>
                                <?= $row['cate_name'] ?>
                            </td>
                            <td>
                                <?= $row['view'] ?>
                            </td>
                            <td style="text-align: center;"><a href="?page=editProd&id=<?= $row['prod_id'] ?>" class="nav-link"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td onclick=" return confirm('Bạn có chắc rằng muốn xóa ?');" style="text-align: center;"><a href="?page=removeProd&id=<?= $row['prod_id'] ?>" class="nav-link"><i class="fa-regular fa-circle-xmark"></i></a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>