<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Quản Lý Đơn Hàng</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Thời Gian Đặt</th>
                        <th>Tổng Sản Phẩm</th>
                        <th>Tổng Giá</th>
                        <th>Mã Đơn Hàng</th>
                        <th>Khách Hàng</th>
                        <th>Địa Chỉ</th>
                        <th>Điện Thoại</th>
                        <th>Tình Trạng</th>
                        <th>Chi Tiết</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Thời Gian Đặt</th>
                        <th>Tổng Sản Phẩm</th>
                        <th>Tổng Giá</th>
                        <th>Mã Đơn Hàng</th>
                        <th>Khách Hàng</th>
                        <th>Địa Chỉ</th>
                        <th>Điện Thoại</th>
                        <th>Tình Trạng</th>
                        <th>Chi Tiết</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $i = 1;
                    $db = new Order();
                    $db_user = new User();
                    $db_prod = new Product();
                    $rows_bill = $db->getBillGrByCode();

                    foreach ($rows_bill as $row_bill) { ?>

                        <?php
                        $total_quantity = $db->sumQuantity($row_bill['commodity_codes']);
                        $total_price = $db->totalPrice($row_bill['commodity_codes'], $row_bill['prod_id']);
                        $row_user = $db_user->getUserByID($row_bill['user_id']);
                        ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row_bill['order_time'] ?></td>
                            <td><?= $total_quantity['total_quantity'] ?></td>
                            <td><?= $db_prod->format_price($total_price['total_price']) ?> VNĐ</td>
                            <td><?= $row_bill['commodity_codes'] ?></td>
                            <td><?= $row_user['name'] ?></td>
                            <td><?= $row_bill['address'] ?></td>
                            <td><?= $row_user['phone'] ?></td>          
                            <td>
                                <form method="post" action="?page=updStatusOrder&code=<?= $row_bill['commodity_codes']?>">
                                    <select name="status" style="width: 100%;">
                                    <?php
                                        if($row_bill['status'] == 'Chờ xử lý'){ ?>
                                            <option value="Chờ xử lý">Chờ xử lý</option>
                                            <option value="Đã xác nhận">Xác nhận đơn</option>
                                    <?php }
                                        else if($row_bill['status'] == 'Đã xác nhận'){ ?>
                                            <option value="Đã xác nhận">Đã xác nhận</option>
                                            <option value="Đang giao">Đang giao</option>
                                    <?php } 
                                        else if($row_bill['status'] == 'Đang giao'){ ?>
                                            <option value="Đang giao">Đang giao</option>
                                            <option value="Đã giao">Đã giao</option>
                                    <?php }
                                        else if($row_bill['status'] == 'Đã giao'){ ?>
                                            <option value="Đã giao">Đã giao</option>
                                    <?php } ?>
                                    </select>                               
                                        <button type="submit" name="updStatusOrder" class="btn btn-success" style="margin: 10px 25%;">Update</button>
                                </form>
                            </td>
                            <td><a href="?page=detailOrder&code=<?= $row_bill['commodity_codes']?>">
                                <button class="btn text-gray-100 bg-gradient-primary">Xem</button>
                            </a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>