<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
$db_prod = new Product();
$row_prod = $db_prod->getListDetailByID($id);
?>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card text-black">
          <img src="../images/prod/<?= $row_prod['image'] ?>" class="card-img-top" alt="image - product" />
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title"><?= $row_prod['prod_name'] ?></h5>
              <p class="text-muted mb-4"><?= $row_prod['cate_name'] ?></p>
            </div>
            <div>
              <div class="d-flex justify-content-between">
                <span>Giá: <?= $row_prod['price'] ?> VNĐ</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<h1 class="h3 mb-2 text-gray-800" style="padding: 20px 0; font-weight: 600;">Tất Cả Bình Luận Của Sản Phẩm</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Thời Gian</th>
            <th>Nội Dung</th>
            <th>Hiển Thị</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Thời Gian</th>
            <th>Nội Dung</th>
            <th>Hiển Thị</th>
          </tr>
        </tfoot>
        <tbody>

          <?php
          $i = 1;
          $db_cmt = new Comment();
          $rows = $db_cmt->getDetail($id);

          foreach ($rows as $row) { ?>
            <tr>
              <td><?= $i++ ?></td>
              <td>
                <?php
                if ($row['name'] != '') {
                  echo $row['name'];
                } else {
                  echo 'Chưa Nhập';
                }
                ?>
              </td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['create_at'] ?></td>
              <td><?= $row['content'] ?></td>
              <td>
                <a href="?page=denyCommnet&deny=<?= $row['cmt_id'] ?>">
                  <?php
                    if($row['status_cmt'] == "Hiện"){
                      echo "<button type='button' class='btn btn-success' name='status'>".$row['status_cmt']."</button>";
                    }else{
                      echo "<button type='button' class='btn btn-danger' name='status'>".$row['status_cmt']."</button>";
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