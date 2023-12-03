<?php
session_start();

if (!isset($_SESSION['login_email_admin'])) {
    echo "<script>document.location='../index.php?page=login';</script>";
}
if (isset($_GET['login'])) {
    $logout = $_GET['login'];
} else {
    $logout = '';
}
if ($logout == 'logout') {
    unset($_SESSION['login_email_admin']);
    echo "<script>document.location='../frontend/index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LNP Store</title>

    <!-- Custom fonts for this template-->
    <link href="contents/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="contents/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this dataTables -->
    <link href="contents/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Fort awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('includes/sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('includes/topbar.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php

                    include('includes/pdo.php');
                    include('products/product.php');      
                    include('categories/categories.php');
                    include('users/user.php');
                    include('comments/comment.php');
                    include('questions/question.php');
                    include('orders/order.php');

                    if (isset($_GET["page"])) {
                        $url = $_GET["page"];
                    } else {
                        $url = "home";
                    }
                    switch ($url) {
                        case "home":
                            include('includes/dashboard.php');
                            break;
                        case "listProducts":
                            include('products/list.php');
                            break;
                        case "addProd":
                            include('products/add.php');
                            break;
                        case "editProd":
                            include('products/edit.php');
                            break;
                        case "removeProd":
                            include('products/remove.php');
                            break;
                        case "listCategories":
                            include('categories/list.php');
                            break;
                        case "addCate":
                            include('categories/add.php');
                            break;
                        case "editCate":
                            include('categories/edit.php');
                            break;
                        case "removeCate":
                            include('categories/remove.php');
                            break;
                        case "listUsers":
                            include('users/list.php');
                            break;
                        case "lockUser":
                            include('users/lock.php');
                            break;
                        case "listComments":
                            include('comments/list.php');
                            break;
                        case "detailComment":
                            include('comments/detail.php');
                            break;
                        case "denyCommnet":
                            include('comments/deny.php');
                            break;
                        case "listQuestions":
                            include('questions/list.php');
                            break;
                        case "listOrders":
                            include('orders/list.php');
                            break;
                        case "updStatusOrder":
                            include('orders/update.php');
                            break;
                        case "detailOrder":
                            include('orders/detail.php');
                            break;
                        case "nextPage":
                            echo "<script>document.location='../index.php';</script>";
                            break;
                        case "logout":
                            unset($_SESSION['login_email_admin']);
                            echo "<script>document.location='../index.php';</script>";
                            break;
                    }
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('includes/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="contents/vendor/jquery/jquery.min.js"></script>
    <script src="contents/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="contents/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="contents/js/sb-admin-2.min.js"></script>


    <!-- Page level plugins -->
    <script src="contents/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="contents/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="contents/js/demo/datatables-demo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        <?php
        $db_cmt = new Comment();
        ?>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Comment',
                    data: [<? echo $db_cmt->cmt_month(1) ?>,
                        <? echo $db_cmt->cmt_month(2) ?>,
                        <? echo $db_cmt->cmt_month(3) ?>,
                        <? echo $db_cmt->cmt_month(4) ?>,
                        <? echo $db_cmt->cmt_month(5) ?>,
                        <? echo $db_cmt->cmt_month(6) ?>,
                        <? echo $db_cmt->cmt_month(7) ?>,
                        <? echo $db_cmt->cmt_month(8) ?>,
                        <? echo $db_cmt->cmt_month(9) ?>,
                        <? echo $db_cmt->cmt_month(10) ?>,
                        <? echo $db_cmt->cmt_month(11) ?>,
                        <? echo $db_cmt->cmt_month(12) ?>
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>