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
        $query = "SELECT * FROM products INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id"; 
        $result = $db->pdo_query($query);
        return $result;
    }
    public function lishProductNew() {
        $db = new connect();
        $query = "SELECT *, products.prod_id AS ID_prod FROM products INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id ORDER BY ID_prod desc limit 0,8";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function lishProductDM() {
        $db = new connect();
        $query = "SELECT products.prod_id AS ID_prod FROM products INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id ORDER BY ID_prod desc limit 0,8";
        $result = $db->pdo_query($query);
        return $result;
    }
    
}
?>