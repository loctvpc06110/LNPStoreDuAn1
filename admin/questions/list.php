<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Các Câu Hỏi Khách Hàng</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>Người Gửi</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Câu Hỏi</th>
                        <th>Thời Gian</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Người Gửi</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Câu Hỏi</th>
                        <th>Thời Gian</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $i = 1;
                    $dblist = new Question();
                    $rows = $dblist->getList();

                    foreach ($rows as $row) { ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?php if($row['phone'] != ''){
                                echo $row['phone'];
                            }else{
                                echo 'Khách Hàng Chưa Nhập';
                            }
                            ?></td>
                            <td><?= $row['question'] ?></td>
                            <td><?= $row['create_at'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>