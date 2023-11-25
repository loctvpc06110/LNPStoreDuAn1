<?php 
    session_start();
    if(isset($_GET['login'])){
        $logout_user = $_GET['login'];
    }
    else {
        $logout_user = '';
    }
    if($logout_user == 'logout_user'){
        if ($_SESSION['login_email_user']){
            unset($_SESSION['login_email_user']);
            echo "<script>document.location='index.php?page=login';</script>";
        } else {
            unset($_SESSION['login_email_admin']);
            echo "<script>document.location='index.php?page=login';</script>";
        }
        
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NLP Store</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
        />
        <link rel="stylesheet" href="site/contents/css/style.css">
        
    </head>
    <body>
        <?php include('site/includes/_header.php'); ?>

        <?php
        include('admin/includes/pdo.php');
        include('admin/products/product.php');
        include('admin/users/user.php');

        if (isset($_GET["page"])) {
            $url = $_GET["page"];
        } else {
            $url = "home";
        }

        switch ($url) {
            case 'home':    
                include("site/includes/home.php");
                break;
            case 'shop':
                include("site/includes/shop.php");
                break;
            case 'blog':
                include("site/includes/blog.php");
                break;
            case 'about':
                include("site/includes/about.php");
                break;
            case 'contact':
                include("site/includes/contact.php");
                break;
            case 'login':
                include("site/includes/login.php");
                break;
            case 'signup':
                include("site/includes/signup.php");
                break;
            case 'cart':
                include("site/includes/cart.php");
                break;
            case 'forgot':
                include("site/includes/forgot.php");
                break;
            case 'search':
                include("site/includes/search.php");
                break;
            case 'detail':
                include("site/includes/dtlproduct.php");
                break;
            case 'infouser':
                include("site/includes/info.php");
                break;
        }
        ?>

        <?php include('site/includes/_footer.php'); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        
        <script
        type="text/javascript"
        src="https://code.jquery.com/jquery-1.11.0.min.js"
        ></script>
        <script
        type="text/javascript"
        src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
        ></script>
        <script
        type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
        ></script>

        <script src="site/contents/js/menu.js"></script>
        <script src="site/contents/js/slickSlider.js"></script>

        <!-- <script>
        var mainImg = document.getElementById('mainImg');
        var smallImg = document.getElementsByClassName('smallImg');

        smallImg[0].onclick = function() {
                mainImg.src = smallImg[0].src;
        }
        smallImg[1].onclick = function() {
                mainImg.src = smallImg[1].src;
        }
        smallImg[2].onclick = function() {
                mainImg.src = smallImg[2].src;
        }
        smallImg[3].onclick = function() {
                mainImg.src = smallImg[3].src;
        }
        </script> -->
    </body>

    </html>