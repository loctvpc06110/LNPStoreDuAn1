<?php
$db = new Product();
$db_user = new User();

if (isset($_SESSION['login_email_user'])) {
    $email = $_SESSION['login_email_user'];
}else if (isset($_SESSION['login_email_admin'])) {
    $email = $_SESSION['login_email_admin'];
}else{
    echo "<script>alert('Vui Lòng Đăng Nhập !');</script>";
    echo "<script>document.location='index.php?page=login';</script>";
}
$row_user = $db_user->getByEmail($email);

// Thêm-xóa-cập nhập Giỏ hàng 
if (isset($_POST['add_cart'])) {
    $prod_price = $_POST['prod_price'];
    $prod_id = $_POST['prod_id'];
    $prod_quantity = $_POST['prod_quantity'];

    $count = $db->checkProdCarts($prod_id);
    if ($count > 0) {
        $fixCart = $db->getCartByProdID($prod_id);
        $quantity_cart = $prod_quantity + $fixCart['quantity'];
        $upCart = $db->upQuantityCart($quantity_cart, $prod_id);
    } else {
        $addToCart = $db->addCart($prod_id, $prod_price, $prod_quantity, $row_user['user_id']);
    }
} else if (isset($_POST['upd_cart'])) {

    for ($i = 0; $i < count($_POST['product_id']); $i++) {
        $product_id = $_POST['product_id'][$i];
        $quantity = $_POST['quantity'][$i];
        $upCart = $db->upQuantityCart($quantity, $product_id);
    }

    $product_id = $_POST['product_id'];
} else if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleCart = $db->deleteCart($id);
}

// Lưu thông tin khách và tạo đơn hàng khi thanh toán 
else if (isset($_POST['checkout'])) {
    $checkCart = $db->checkCart();
    if ($checkCart == 0) {
        echo "<script>alert('Bạn chưa có đơn nào trong giỏ hàng !');</script>";
        echo "<script>document.location='index.php?page=cart';</script>";
    }
    $errIn4 = "";
    $username = $_POST['customer_name'];
    $phone = $_POST['customer_phone'];
    $address = $_POST['customer_address'];
    $payment = $_POST['payment'];

    if ($username == "" || $phone == "" || $address == "" || $payment == "") {
        $errIn4 = "Vui lòng điền đủ thông tin";
    }

    if ($errIn4 == "") {
        $saveInfo = $db_user->updateUser($username, $address, $phone, $row_user['user_id']);

        $commodityCodes = rand(0, 999999);
        for ($i = 0; $i < count($_POST['pay_prod_id']); $i++) {
            $pay_prod_id = $_POST['pay_prod_id'][$i];
            $pay_quantity = $_POST['pay_quantity'][$i];
            $pay_price = $_POST['pay_price'];
            $createOrder = $db->createOrder($pay_quantity, $pay_price, $commodityCodes, $address, $pay_prod_id, $row_user['user_id'], $payment);
            $deleteCarts = $db->deleteCartWhenOrder($pay_prod_id);
        }
        echo "<script>alert('Đang hàng của bạn đã đặt thành công !');</script>";
    }
}
?>

<section id="page-header" class="cart-header"></section>


<section id="cart" class="section-p1">

    <form action="" method="post">
        <table width="100%">
            <thead>
                <tr>
                    <td>Xóa</td>
                    <td>Ảnh</td>
                    <td>Sản Phẩm</td>
                    <td>Rom / Ram</td>
                    <td>Giá</td>
                    <td>Số Lượng</td>
                    <td>Tổng Tiền</td>
                </tr>
            </thead>

            <tbody>
                <?php
                $total = 0;
                $rowsCart = $db->getListCart();
                foreach ($rowsCart as $rowCart) {
                    $rowProd = $db->getListDetailByID($rowCart['prod_id']);
                    $subtotal = $rowProd['price'] * $rowCart['quantity'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><a href="?page=cart&delete=<?= $rowCart['cart_id'] ?>"><i class="fa-regular fa-circle-xmark"></i></a></td>
                        <td><img src="images/prod/<?= $rowProd['image'] ?>" alt=""></td>
                        <td>
                            <?= $rowProd['prod_name'] ?>
                        </td>
                        <td>
                            <?= $rowProd['ram'] ?> / <?= $rowProd['rom'] ?>
                        </td>
                        <td>
                            <?= $rowProd['price'] ?> VNĐ
                        </td>
                        <td>
                            <input type="number" min="1" name="quantity[]" value="<?= $rowCart['quantity'] ?>">
                            <input type="hidden" name="product_id[]" value="<?= $rowCart['prod_id'] ?>">
                        </td>
                        <td>
                            <?= $subtotal ?> VNĐ
                        </td>
                    </tr>
                <?php } ?>

            </tbody>

        </table>
    </form>

</section>

<section id="cart-add" class="section-p1">
    <div id="subtotal">
        <h3 style="text-align: center; font-weight: 600; padding-bottom: 15px; color: var(--scondry--color);">Tổng Tiền Cần Thanh Toán</h3>

        <table>
            <tr>
                <td>Tổng Giỏ Hàng</td>
                <td>
                    <?= $total ?> VNĐ
                </td>
            </tr>
            <tr>
                <td>Phí Vận Chuyển</td>
                <td>Miễn Phí</td>
            </tr>
            <tr>
                <td><strong>Tổng Tiên Cần Thanh Toán</strong></td>
                <td><strong>
                        <?= $total ?> VNĐ
                    </strong></td>
            </tr>
            <tr>
                <form method="post" action="">
                    <td colspan="2" align="center"><button type="submit" name="upd_cart" class="normal">Cập Nhập Giỏ Hàng</button>
                    </td>
                </form>
            </tr>
        </table>
    </div>
    <div id="checkout">
        <h3 style="text-align: center; font-weight: 600; padding-bottom: 15px; color: var(--scondry--color);">Thêm Địa Chỉ Giao Hàng</h3>
        <form method="post">
            <div class="form-group">
                <label for="">Tên: </label>
                <input type="text" name="customer_name" class="form-control" width="100%" value="<?php if (isset($row_user['name']))
                                                                                                        echo $row_user['name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Email: </label>
                <input type="button" style="width: 100%; text-align: left;" name="customer_email" class="form-control" value="<?php if (isset($row_user['email']))
                                                                                                                                    echo $row_user['email'] ?>">
            </div>
            <div class="form-group">
                <label for="">Số điện thoại: </label>
                <input type="text" name="customer_phone" class="form-control" value="<?php if (isset($row_user['phone']))
                                                                                            echo $row_user['phone'] ?>">
            </div>
            <div class="form-group">
                <label for="">Địa chỉ nhận hàng: </label>
                <input type="text" name="customer_address" class="form-control" value="<?php if (isset($row_user['address']))
                                                                                            echo $row_user['address'] ?>">
            </div>
            <div class="form-group">
                <label for="">Phương Thức Thanh Toán: </label>
                <select name="payment" class="form-control">
                    <option value="">Vui Lòng Chọn Phương Thức Thanh Toán</option>
                    <option value="COD">Thanh Toán Khi Nhận Hàng</option>
                    <option value="CreditCard">Chuyển Khoản</option>
                </select>
            </div>
            <?php
            global $errIn4;
            if ($errIn4 != "") { ?>
                <div class="alert alert-danger">
                    <?= $errIn4 ?>
                </div>
            <?php } ?>

            <?php
            $rows_pay = $db->getListCart();
            foreach ($rows_pay as $row_pay) { ?>
                <input type="hidden" name="pay_quantity[]" value="<?= $row_pay['quantity'] ?>">
                <input type="hidden" name="pay_prod_id[]" value="<?= $row_pay['prod_id'] ?>">
                <input type="hidden" name="pay_price" value="<?= $row_pay['price'] ?>">
            <?php } ?>
            <button class="normal btn-checkout" name="checkout">Đặt Hàng</button>
        </form>
    </div>

</section>


<?php
$db_bill = new Order();
$checkOrder = $db_bill->checkOrder($row_user['user_id']);
if ($checkOrder != 0) { ?>

    <section id="order" class="section-p1">
        <h3>Đơn Hàng Của Bạn</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tổng sản Phẩm</th>
                    <th scope="col">Tổng Tiền</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Tình Trạng</th>
                    <th scope="col">Hủy Đơn Hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rows_bill = $db_bill->getBillGrByCode();

                foreach ($rows_bill as $row_bill) { ?>

                <?php 
                $total_quantity = $db_bill->sumQuantity($row_bill['commodity_codes']);
                $total_price = $db_bill->totalPrice($row_bill['commodity_codes'], $row_bill['prod_id']);
                ?>
                    <tr>
                        <td><?= $total_quantity['total_quantity'] ?></td>
                        <td><?= $total_price['total_price'] ?> VNĐ</td>
                        <td><?= $row_bill['address']?></td>
                        <td>
                            <?= $row_bill['status']?>  
                        </td>
                        <td style="width: 200px;">
                        <?php
                                if ($row_bill['status'] == 'Chờ xử lý'){
                                    echo '<a href="?page=cencalOrder&code='.$row_bill['commodity_codes'].'"><button type="button" class="btn btn-danger">Hủy</button></a>';
                                }
                                else{
                                    echo '<button class="alert alert-danger">
                                    Đơn đã đc xử lý !
                                </button>';
                                }
                            ?>
                        </td>
                    </tr>
                <?php }
                ?>

            </tbody>
        </table>

    </section>

<?php }
?>