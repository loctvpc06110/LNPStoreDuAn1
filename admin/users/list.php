<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Quản Lý Tài Khoản</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                        <th>Email</th>
                        <th>Vai Trò</th>
                        <th>Tình Trạng</th>
                        <th>Khóa Tài Khoản</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                        <th>Email</th>
                        <th>Vai Trò</th>
                        <th>Tình Trạng</th>
                        <th>Khóa Tài Khoản</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $dblist = new User();
                    $rows = $dblist->getUser();

                    foreach ($rows as $row) { ?>
                        <tr>
                            <td><?= $row['user_id']?></td>
                            <td><?= $row['name']?></td>
                            <td><?= $row['address']?></td>
                            <td><?= $row['phone']?></td>
                            <td><?= $row['email']?></td>
                            <td><?= $row['role']?></td>
                            <td><?= $row['status']?></td>
                            <td>
                                <a href="?page=lockUser&id=<?= $row['user_id'] ?>" class="nav-link" style="text-align: center;">
                                <?php
                                    if($row['status'] == "Hoạt Động"){
                                        echo '<i class="fa-solid fa-lock-open"></i>';
                                    }else{
                                        echo '<i class="fa-solid fa-lock"></i>';
                                    }
                                ?>
                                
                                </a>
                            </td>     
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>