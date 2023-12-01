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

    public function getListDetailByID($id)
    {
        $db = new connect();
        $query = "SELECT *, products.prod_id AS id_prod, products.status AS prod_status, price, products.name AS prod_name, categories.name AS cate_name, promotions.name AS promo_name  
        FROM products 
        INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id
        INNER JOIN categories ON products.cate_id = categories.cate_id
        INNER JOIN promotions ON products.promo_id = promotions.promo_id
        WHERE products.prod_id = $id
        GROUP BY id_prod;";
        $result = $db->pdo_query($query);
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
}
