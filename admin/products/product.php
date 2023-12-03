<?php
// code class Products
// Khai báo thuộc tính của Product

class Product
{
    var $id = null;
    var $name = null;
    var $status = null;
    var $image = null;
    var $price = null;
    var $view = null;
    var $promoID = null;
    var $cateID = null;

    public function getListDetail()
    {
        $db = new connect();
        $query = "SELECT * FROM products INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function lishProductNew()
    {
        $db = new connect();
        $query = "SELECT *, products.prod_id AS ID_prod FROM products 
        INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id 
        ORDER BY ID_prod desc limit 0,8";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function lishProductDM($id_pro)
    {
        $db = new connect();
        $query = "SELECT * FROM categories 
        INNER JOIN products ON categories.cate_id = products.cate_id
        INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id 
        WHERE products.cate_id='$id_pro';";
        $result = $db->pdo_query($query);
        return $result;
    }

    public function getList()
    {
        $db = new connect();
        $query = "SELECT  products.prod_id AS prod_id, products.status AS prod_status, products.image AS image, price, products.name AS prod_name, categories.name AS cate_name, promotions.name AS promo_name, products.view AS view  
        FROM products 
        INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id
        INNER JOIN categories ON products.cate_id = categories.cate_id
        INNER JOIN promotions ON products.promo_id = promotions.promo_id
        INNER JOIN desc_image ON products.prod_id = desc_image.prod_id
        GROUP BY prod_id;";

        $result = $db->pdo_query($query);
        return $result;
    }
    public function updateViews($id)
    {
        $db = new connect();
        $query = "UPDATE products SET view = view + 1 WHERE products.prod_id = $id";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function getSimilar($cate_name, $prod_id)
    {
        $db = new connect();
        $query = "SELECT *, products.prod_id AS id_prod, products.status AS prod_status, price, products.name AS prod_name, categories.name AS cate_name, promotions.name AS promo_name  
        FROM products 
        INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id
        INNER JOIN categories ON products.cate_id = categories.cate_id
        INNER JOIN promotions ON products.promo_id = promotions.promo_id
        WHERE categories.name = '$cate_name' AND products.prod_id != '$prod_id' LIMIT 4";
        $result = $db->pdo_query($query);
        return $result;
    }

    public function getListDetailByID($id)
    {
        $db = new connect();
        $query = "SELECT *, products.prod_id AS id_prod, products.status AS prod_status, price, products.name AS prod_name, categories.name AS cate_name, promotions.name AS promo_name  
        FROM products 
        INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id
        INNER JOIN categories ON products.cate_id = categories.cate_id
        INNER JOIN promotions ON products.promo_id = promotions.promo_id
        WHERE products.prod_id = $id";
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function checksearch($keyS)
    {
        $db = new connect();
        $sql = "SELECT count(*) FROM products WHERE products.name LIKE '%$keyS%'";
        $result = $db->pdo_execute($sql);
        $number_of_rows = $result->fetchColumn();
        return  $number_of_rows;
    }

    public function getByKey($keyS)
    {
        $db = new connect();
        $query = "SELECT *, products.prod_id AS id_prod, products.status AS prod_status, price, products.name AS prod_name, categories.name AS cate_name  
        FROM products 
        INNER JOIN categories ON products.cate_id = categories.cate_id
        INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id
        WHERE products.name LIKE '%$keyS%'";
        $result = $db->pdo_execute($query);
        $result = $db->pdo_query($query);
        return  $result;
    }

    public function sumPro()
    {
        $db = new connect();
        $query = "SELECT COUNT(prod_id) AS sum_pro FROM products";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function sumCate()
    {
        $db = new connect();
        $query = "SELECT COUNT(cate_id) AS sum_cate FROM categories";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function sumUser()
    {
        $db = new connect();
        $query = "SELECT COUNT(user_id) AS sum_user FROM users";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function sumComment()
    {
        $db = new connect();
        $query = "SELECT COUNT(cmt_id) AS sum_cmt FROM comments";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function prodPromo() 
    {
        $db = new connect();
        $query = "SELECT products.prod_id AS prod_id, products.status AS prod_status, products.image AS image, price, products.name AS prod_name, categories.name AS cate_name, promotions.name AS promo_name,
        promotions.value AS promo_value
        FROM products 
        INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id
        INNER JOIN categories ON products.cate_id = categories.cate_id
        INNER JOIN promotions ON products.promo_id = promotions.promo_id
        INNER JOIN desc_image ON products.prod_id = desc_image.prod_id
        WHERE value != '0' GROUP BY prod_id";
        $result = $db->pdo_query($query);
        return $result;
    }

    public function getDescImage($id)
    {
        $db = new connect();
        $query = "SELECT * FROM desc_image WHERE prod_id = '$id'";
        $result = $db->pdo_query($query);
        return  $result;
    }

    public function addCart($prod_id, $prod_price, $prod_quantity, $user_id)
    {
        $db = new connect();
        $query = "INSERT INTO carts(prod_id, price, quantity, user_id) VALUES ('$prod_id', '$prod_price', '$prod_quantity', '$user_id')";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function getListCart()
    {
        $db = new connect();
        $query = "SELECT * FROM carts";
        $result = $db->pdo_query($query);
        return $result;
    }

    public function checkProdCarts($prod_id)
    {
        $db = new connect();
        $sql = "SELECT count(*) FROM carts WHERE prod_id = '$prod_id'";
        $result = $db->pdo_execute($sql);
        $number_of_rows = $result->fetchColumn();
        return $number_of_rows;
    }

    public function getCartByProdID($prod_id)
    {
        $db = new connect();
        $query = "SELECT * FROM carts WHERE prod_id = '$prod_id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    public function upQuantityCart($quantity, $prod_id)
    {
        $db = new connect();
        $query = "UPDATE carts SET quantity = '$quantity' WHERE prod_id = '$prod_id'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function deleteCart($cart_id)
    {
        $db = new connect();
        $query = "DELETE FROM carts WHERE cart_id = '$cart_id'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function createOrder($quantity, $price, $commodity_code, $address, $prod_id, $user_id, $payment)
    {
        $db = new connect();
        $query = "INSERT INTO bills(quantity, price, commodity_codes, address, prod_id, user_id, payment) VALUES ('$quantity','$price','$commodity_code','$address','$prod_id','$user_id','$payment')";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function deleteCartWhenOrder($prod_id)
    {
        $db = new connect();
        $query = "DELETE FROM carts WHERE prod_id= '$prod_id'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function checkCart()
    {
        $db = new connect();
        $sql = "SELECT count(*) FROM carts";
        $result = $db->pdo_execute($sql);
        $number_of_rows = $result->fetchColumn();
        return $number_of_rows;
    }

    public function checkOrder($user_id){
        $db = new connect();
        $sql = "SELECT count(*) FROM bills WHERE user_id = '$user_id'"; 
        $result = $db->pdo_execute($sql);
        $number_of_rows = $result->fetchColumn(); 
        return $number_of_rows;
    }

    public function getBillGrByCode(){
        $db = new connect();
        $query = "SELECT * FROM bills GROUP BY commodity_codes";
        $result = $db->pdo_query($query);
        return $result;
    }

    public function countProd($commodity_code){
        $db = new connect();
        $sql = "SELECT count(*) FROM bills WHERE commodity_codes = '$commodity_code'"; 
        $result = $db->pdo_execute($sql);
        $number_of_rows = $result->fetchColumn();
        return $number_of_rows;
    }

    public function sumQuantity($commodity_code){
        $db = new connect();
        $query = "SELECT SUM(quantity) AS total_quantity FROM bills WHERE commodity_codes = '$commodity_code'";
        $result = $db->pdo_query_one($query);
        return $result;
    }
    
    public function totalPrice($commodity_code){
        $db = new connect();
        $query = "SELECT SUM(quantity * price) AS total_price FROM bills WHERE commodity_codes = '$commodity_code'";
        $result = $db->pdo_query_one($query);   
        return $result;
    }

    public function cencalOrder($code) {
        $db = new connect();
        $query = "DELETE FROM bills WHERE commodity_codes= '$code'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function getListLimit($start, $limit) {
        $db = new connect();
        $query = "SELECT *, products.prod_id AS prod_id, products.status AS prod_status, products.image AS image, price, products.name AS prod_name, categories.name AS cate_name, promotions.name AS promo_name  
        FROM products 
        INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id
        INNER JOIN categories ON products.cate_id = categories.cate_id
        INNER JOIN promotions ON products.promo_id = promotions.promo_id
        INNER JOIN desc_image ON products.prod_id = desc_image.prod_id
        GROUP BY products.prod_id ASC LIMIT $start, $limit;";
        $result = $db->pdo_query($query);
        return $result;
    }

    public function number_rows(){
        $db = new connect();
        $sql = "SELECT count(*) FROM products"; 
        $result = $db->pdo_execute($sql);
        $number_of_rows = $result->fetchColumn(); 
        return $number_of_rows;
    }

    public function format_price($price) {
        $formatted_price = number_format($price, 0, ',', '.');
        return $formatted_price;
    }

    public function getProdByID($prod_id) {
        $db = new connect();
        $query = "SELECT * FROM products WHERE prod_id = '$prod_id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }
}
