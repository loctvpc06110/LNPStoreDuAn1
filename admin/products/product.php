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
        $query = "SELECT * FROM products INNER JOIN detail_prod ON products.prod_id = detail_prod.prod_id"; // viết câu lệnh sql 
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
        $query = "SELECT * FROM products INNER JOIN categories ON products.cate_id = categories.cate_id WHERE products.name LIKE '%$keyS%'";
        $result = $db->pdo_execute($query);
        $result = $db->pdo_query($query);
        return  $result;
    }
}
