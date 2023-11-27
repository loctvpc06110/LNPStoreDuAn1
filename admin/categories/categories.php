<?php 
// code class Categories
// Khai báo thuộc tính của Categories

class Categories{
    var $cate_id = null;
    var $name = null;
    var $status = null;
   
    public function addCategories($name, $status) {
        $db = new connect();
        $query = "INSERT INTO categories(name, status) VALUES ('$name', '$status')"; 
        $result = $db->pdo_query($query);
        return $result;
    }
    public function lishCategories() {
        $db = new connect();
        $sql = "SELECT * FROM categories order by cate_id desc";
        $nameCategories = $db->pdo_query($sql);
        return $nameCategories;
    }
    public function lishCategoriesName() {
        $db = new connect();
        $sql = "SELECT categories.name AS prod_name FROM categories INNER JOIN products ON categories.cate_id = products.cate_id";
        $CategoriesDM = $db->pdo_query($sql);
        return $CategoriesDM;
    }
    // public function lishProductDM() {
    //     $db = new connect();
    //     $sql = "SELECT * FROM categories INNER JOIN products ON categories.cate_id = products.cate_id";
    //     $ProductDM = $db->pdo_query($sql);
    //     return $ProductDM;
    // }
}
?>