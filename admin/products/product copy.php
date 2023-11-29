<?php 
// code class Products
// Khai báo thuộc tính của Product

class Product {
    var $id = null;
    var $name = null;
    var $status = null;
    var $image = null;
    var $price = null;
    var $view = null;
    var $promoID = null;
    var $cateID = null;

   
    public function getListDetail() {
        $db = new connect();
        $query = "SELECT * FROM products INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id limit 6";
        $result = $db->pdo_query($query);
        return $result;
    }

    public function getList() {
        $db = new connect();
        $query = "SELECT  products.prod_id AS prod_id, products.status AS prod_status, products.image AS image, price, products.name AS prod_name, categories.name AS cate_name, promotions.name AS promo_name  
        FROM products 
        INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id
        INNER JOIN categories ON products.cate_id = categories.cate_id
        INNER JOIN promotions ON products.promo_id = promotions.promo_id
        INNER JOIN desc_image ON products.prod_id = desc_image.prod_id
        GROUP BY prod_id;";
        
        $result = $db->pdo_query($query);
        return $result;
    }

}
?>