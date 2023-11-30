<?php
$db = new Product();
if (isset($_POST['add_cart'])) {
    $prod_price = $_POST['prod_price'];
    $prod_id = $_POST['prod_id'];
    $prod_quantity = $_POST['prod_quantity'];
    

    $count = $db->checkProdCarts($prod_id);
    if($count > 0){
        $fixCart = $db->getCartByProdID($prod_id);
        $quantity_cart = $prod_quantity + $fixCart['quantity'];
        $upCart = $db->upQuantityCart($quantity_cart, $prod_id);
    }
    else{
        $addToCart = $db->addCart($prod_id, $prod_price, $prod_quantity);
    }
} else if (isset($_POST['upd_cart'])){

    for($i = 0; $i<count($_POST['product_id']); $i++){
        $product_id = $_POST['product_id'][$i];
        $quantity = $_POST['quantity'][$i];
        $upCart = $db->upQuantityCart($quantity, $product_id);
    }

    $product_id = $_POST['product_id'];

}
else if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $deleCart = $db->deleteCart($id);
}

?>


<section id="page-header" class="cart-header">

</section>

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
                        <td><a href="?page=cart&delete=<?= $rowCart['cart_id']?>"><i
                                    class="fa-regular fa-circle-xmark"></i></a></td>
                        <td><img src="images/prod/<?= $rowProd['image']?>" alt=""></td>
                        <td>
                            <?= $rowProd['prod_name']?>
                        </td>
                        <td>
                        <?= $rowProd['ram']?> / <?= $rowProd['rom']?>
                        </td>
                        <td>
                        <?= $rowProd['price']?> VNĐ
                        </td>
                        <td>
                            <input type="number" min="1" name="quantity[]" value="<?= $rowCart['quantity']?>">
                            <input type="hidden" name="product_id[]" value="<?= $rowCart['prod_id']?>">
                        </td>
                        <td>
                            <?= $subtotal?> VNĐ 
                        </td>
                    </tr>
                <?php } ?>

            </tbody>

        </table>

</section>

<section id="cart-add" class="section-p1">
    <div id="subtotal">
        <h3>Tổng Tiền Cần Thanh Toán</h3>

        <table>
            <tr>
                <td>Tổng Giỏ Hàng</td>
                <td>
                    <?= $total?> VNĐ
                </td>
            </tr>
            <tr>
                <td>Phí Vận Chuyển</td>
                <td>Miễn Phí</td>
            </tr>
            <tr>
                <td><strong>Tổng Tiên Cần Thanh Toán</strong></td>
                <td><strong>
                <?= $total?> VNĐ
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
        <h3>Checkout</h3>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Tên: </label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Email: </label>
                <input type="email" name="customer_email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Số điện thoại: </label>
                <input type="text" name="customer_phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Địa chỉ nhận hàng: </label>
                <input type="text" name="customer_address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Payment: </label>
                <select name="payment" class="form-control">
                    <option value="COD">COD</option>
                    <option value="CreditCard">Credit Card</option>
                </select>
            </div>

            <button class="normal btn-checkout" name="checkout">Pay Now</button>
        </form>
    </div>

</section>