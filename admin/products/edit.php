<?php 
    $id = $_GET['id'];
    $db = new Product();
    $rowProd = $db->getByID($id);
    $rowProdDtl = $db->getDetailProductByID($id);
?>

<div class="container-fluid">
        <div class="card-header">
            <h2>Edit Product</h2>
        </div>
    <form method="post" enctype="multipart/form-data">    
         
        <div class="form-floating mb-3 mt-3">
            <label>Product Name</label>
            <input type="text" class="form-control" placeholder="Enter Category Name" name="prodName" value="<?php echo $rowProd['prd_name']?>" required>
            
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Status</label>
            <select name="prodStatus" class="form-control">
                <option value="<?php echo $rowProd['prd_status']?>"><?php echo $rowProd['prd_status']?></option>
                <option value="Available">Available</option>
                <option value="Uavailable">Unavailable</option>
            </select>
        </div>
        <div class="form-floating mt-3 mb-3">
            <label>Image</label>
            <input type="file" class="form-control" placeholder="Enter Category Note" name="image" value="<?php echo $rowProd['image']?>">
            
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Price</label>
            <input type="number" class="form-control" placeholder="Enter Category Name" name="prodPrice" value="<?php echo $rowProd['price']?>" required>
        </div>
        <div class="form-floating mb-3 mt-3">
            <label>Inventory</label>
            <input type="number" class="form-control" placeholder="Enter Inventory" name="prodInventory" value="<?php echo $rowProd['inventory']?>" required>
            
        </div>
        <div class="form-floating mt-3 mb-3">
            <label>Description</label>
            <textarea name="prodDesc" class="form-control" cols="30" rows="5" required><?php echo $rowProd['description']?></textarea>        
        </div>
        <div class="form-floating mt-3 mb-3">
            <label>Product category</label>
            <select class="form-control" name="cateID">
                <option value="<? echo $rowProdDtl['cateID'] ?>"><? echo $rowProdDtl['cate_name'] ?></option>
                <?php
                $dbCate = new Category();
                $rows = $dbCate->getList();
                foreach ($rows as $row) { ?>
                    <option value="<? echo $row['cateID'] ?>"><? echo $row['cate_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <button name="editProd" class="btn btn-primary">Save</button>
    </form>
</div>

<?php

    if(isset($_POST['editProd'])) {
        $prodName = $_POST['prodName'];  
        $prodStatus = $_POST['prodStatus'];

        if($_FILES['image']['name']==''){
            $image = $rowProd['prd_name'];
        }else{
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp, 'content/img/prod/' . $image);
            move_uploaded_file($image_tmp, '../site/content/img/prod/' . $image);    
        }

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $prodPrice = $_POST['prodPrice'];
        $prodInventory = $_POST['prodInventory'];
        $prodDesc = $_POST['prodDesc'];
        
        $cateID = $_POST['cateID'];

        $edit = $db->update($id, $prodName, $prodStatus, $image, $prodPrice, $prodInventory, $prodDesc, $cateID);
        echo "<script>document.location='index.php?page=listProducts';</script>";
    }
?>
