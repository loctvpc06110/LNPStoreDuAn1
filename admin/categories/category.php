<?php
class Category
{
    // Khai báo thuộc tính
    var $id = null;
    var $name = null;
    var $status = null;
    var $image = null;

    // hàm lấy tất cả dữ liệu của bảng Categoris
    public function getList() {
        $db = new connect();
        $query = "SELECT * FROM categories"; // viết câu lệnh sql select *
        $result = $db->pdo_query($query);
        return $result;
    }

    // hàm lấy 1 dòng dữ liệu của bảng categoris dựa trên id
    public function getByID($id) {
        $db = new connect();
        $query = "SELECT * FROM categories where cate_id = '$id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    //hàm insert dữ liệu, create dữ liệu, thêm mới dữ liệu
    public function add($name, $status, $images){
        $db = new connect();
        $query = "INSERT INTO categories (name, status, images) values ('$name', '$status', '$images')";
        $result = $db->pdo_execute($query);
        return $result;
    }

    //hàm cập nhập dữ liệu
    public function update($name, $status, $image, $cate_id ){
        $db = new connect();
        $query = "UPDATE categories SET name = '$name', status = '$status', images = '$image' WHERE cate_id = '$cate_id'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function delete($id){
        $db = new connect();
        $query = "DELETE FROM categories WHERE cate_id = '$id' AND cate_id != '6'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    public function setProdCate($cate_id){
        $db = new connect();
        $db = new connect();
        $query = "UPDATE tb_product SET cate_id = 6 WHERE cate_id = $cate_id";
        $result = $db->pdo_query($query);
        return $result;
    }

    public function number_rows(){
        $db = new connect();
        $sql = "SELECT count(*) FROM categories"; 
        $result = $db->pdo_execute($sql);
        $number_of_rows = $result->fetchColumn(); 
        return $number_of_rows;
    }

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
    
    public function lishCategoriesName($id) {
        $db = new connect();
        $sql = "SELECT categories.name AS cate_name FROM categories INNER JOIN products ON categories.cate_id = products.cate_id WHERE products.cate_id='$id';";
        $CategoriesDM = $db->pdo_query_one($sql);
        return $CategoriesDM;
    }

    public function uptStatusNKD($cate_id){
        $db = new connect();
        $sql = "UPDATE products SET status = 'Ngừng kinh doanh' WHERE cate_id = '$cate_id'";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    public function uptStatusKD($cate_id){
        $db = new connect();
        $sql = "UPDATE products SET status = 'Đang bán' WHERE cate_id = '$cate_id'";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    public function removeCate($cate_id) {
        $db = new connect();
        $query = "DELETE FROM categories WHERE cate_id = '$cate_id'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function checkProduct($cate_id){
        $db = new connect();
        $sql = "SELECT count(*) FROM products WHERE cate_id = '$cate_id'"; 
        $result = $db->pdo_execute($sql);
        $number_of_rows = $result->fetchColumn(); 
        return $number_of_rows;
    }
}
?>
