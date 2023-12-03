    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thống Kê Số Lượng</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Total Product -->
        <?php
        $db = new Product();
        $sumPro = $db->sumPro();

        foreach ($sumPro as $sumProd) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Tổng Sản Phẩm</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="?page=listProducts"><?= $sumProd['sum_pro']; ?> sản phẩm</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-shop fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- Total Product Category -->
        <?php
        $db = new Product();
        $sumCate = $db->sumCate();

        foreach ($sumCate as $sumCategori) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Tổng Loại</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="?page=listCategories"><?= $sumCategori['sum_cate']; ?> danh mục</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-shirt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- Total User -->
        <?php
        $db = new Product();
        $sumUser = $db->sumUser();

        foreach ($sumUser as $sumUsers) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số Người Dùng
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><a href="?page=listUsers"><?= $sumUsers['sum_user']; ?> người dùng</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- Pending Requests Card Example -->
        <?php
        $db = new Product();
        $sumComment = $db->sumComment();

        foreach ($sumComment as $sumComments) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Tổng Bình Luận</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="?page=listComments"><?= $sumComments['sum_cmt']; ?> bình luận</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

        </div>

    </div>