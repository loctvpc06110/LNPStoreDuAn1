<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Quản Lý Bình Luận</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sản Phẩm</th>
                        <th>Bình Luận Mới Nhất</th>
                        <th>Số Bình Luận</th>
                        <th>Xem Chi Tiết</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Sản Phẩm</th>
                        <th>Bình Luận Mới Nhất</th>
                        <th>Số Bình Luận</th>
                        <th>Xem Chi Tiết</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $i = 1;
                    $db = new Comment();
                    $rows = $db->getProductHaveComment();

                    foreach ($rows as $row) { ?>

                        <tr>
                            <td>
                                <?= $i++; ?>
                            </td>
                            <td>
                                <?= $row['name'] ?>
                            </td>
                            <td>
                                <?php
                                $lastcmt = $db->getLastComment($row['id_prod']);
                                $formattedDate = date("Y-m-d", strtotime($lastcmt['lastCmt']));
                                ?>
                                <?= $formattedDate ?>
                            </td>
                            <td>
                                <?php
                                $totalcmt = $db->getTotalComment($row['id_prod']);
                                ?>
                                <?= $totalcmt['totalCmt']; ?>
                            </td>
                            <td><a href="?page=detailComment&id=<?= $row['id_prod'] ?>"><button type="button" class="btn btn-secondary">Xem</button></a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>