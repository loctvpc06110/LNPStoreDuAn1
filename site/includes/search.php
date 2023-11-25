<section id="product1" class="section-p1">
         
<?php 
    if (isset($_POST['search'])){
        $keyS = $_POST['txt_search'];
        
        if ($keyS == ""){
            echo "<h3>Please enter your search</h3>";
        }
        else {
            $db = new Product();
            $count_s = $db->checkSearch($keyS);
            $count = (int)$count_s;
            
            if ($count = 0){
                echo "<h3>Can't find the keyword <b style='color: red;'>$keyS</b> you entered</h3>";
                //
            }
            else {
                echo "<h3>Here's the keyword matching information: <b style='color: red;'>$keyS</b></h3>";
                //  
                ?>

                <div class="pro-container">

                <?php
                $rows = $db->getByKey($keyS);

                    foreach ($rows as $row) { ?>

            <a href="?page=detail&id=<?php echo $row['productID'];?>">
                <div class="pro">
                    <img src="content/img/prod/<?php echo $row['image'] ?>" alt="Image Shirt">
                    <div class="des">
                    <span><?php echo $row['cate_name'] ?></span>
                    <h5><?php echo $row['prd_name'] ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$ <?php echo $row['price'] ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </a>            
                <?php } ?>
                
            </div>

                <?php
            }
        }
    }
?>

</section>