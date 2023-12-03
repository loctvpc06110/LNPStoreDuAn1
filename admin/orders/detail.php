<?php
    if (isset($_GET['code'])){
        $code = $_GET['code'];
        $db = new Order();
        $db_prod = new Product();
        $rows = $db->getOrderByCode($code);
    }
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Chi Tiết Đơn Hàng Có Mã <?= $code ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="?page=listOrders"><button class="btn text-gray-100 bg-gradient-primary">Quay Lại</button></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tfoot>
                <th>Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                </tfoot>
                <tbody>

                    <?php
                    foreach ($rows as $row) { ?>
                        <tr>
                            <?php 
                                $total_price = $db->totalPrice($row['commodity_codes'], $row['prod_id']);
                                $row_prod = $db_prod->getProdByID($row['prod_id']);
                            ?>    
                            <td><?= $row_prod['name'] ?></td>
                            <td><img src="../images/prod/<?= $row_prod['image'] ?>" alt="image-product" width="80px"></td>
                            <td><?= $row['quantity']?></td>
                            <td><?= $row['price']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
