<section id="page-header" class="cart-header">

   

</section>

<section id="cart" class="section-p1">

    <form action="" method="post">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Rom / Ram</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>

                <tbody>
                    <tr>
                        <td><a href="?page=cart&delete"><i
                                    class="fa-regular fa-circle-xmark"></i></a></td>
                        <td><img src="images/prod/prod01.jpg" alt=""></td>
                        <td>
                            Shirt - 01
                        </td>
                        <td>
                            256GB / 8GB
                        </td>
                        <td>
                            10000000 VNĐ
                        </td>
                        <td>
                            <input type="number" min="1" name="quantity[]" value="1">
                           
                        </td>
                        <td>$
                            10
                        </td>
                    </tr>
                </tbody>

        </table>

</section>

<section id="cart-add" class="section-p1">
    <div id="coupon">
        <h3>Apply coupon</h3>
        <div>
            <input type="text" placeholder="Enter Your Coupon">
            <button class="normal">Apply</button>
        </div>
    </div>

    <div id="subtotal">
        <h3>Cart Totals</h3>

        <table>
            <tr>
                <td>Cart Subtotal</td>
                <td>$
                    10
                </td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>Free</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>$
                        10
                    </strong></td>
            </tr>
            <tr>
                <form method="post" action="">
                    <td colspan="2" align="center"><button type="submit" name="upd_cart" class="normal">update</button>
                    </td>
                </form>
            </tr>
        </table>

        <h3>Checkout</h3>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name: </label>
                <input type="text" name="customer_name" class="form-control" required
                    >
            </div>
            <div class="form-group">
                <label for="">Email: </label>
                <input type="email" name="customer_email" class="form-control" required
                    >
            </div>
            <div class="form-group">
                <label for="">Phone: </label>
                <input type="text" name="customer_phone" class="form-control" required
                    >
            </div>
            <div class="form-group">
                <label for="">Address: </label>
                <input type="text" name="customer_address" class="form-control" required
                    >
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