<?php
class Category
{
    // Khai báo thuộc tính
    var $id = null;
    var $name = null;
    var $status = null;

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
    public function add($name,$status){
        $db = new connect();
        $query = "INSERT INTO categories (cate_id, name, status) values (null, '$name', '$status')";
        $result = $db->pdo_execute($query);
        return $result;
    }

    //hàm cập nhập dữ liệu
    public function update($name, $status, $cate_id ){
        $db = new connect();
        $query = "UPDATE categories SET name = '$name', status = '$status' WHERE cate_id = '$cate_id'";
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
}
?>
