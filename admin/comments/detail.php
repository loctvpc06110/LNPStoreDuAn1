<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $db_prod = new Product();
    $row_prod = $db_prod->getDetailProductByID($id);
?>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card text-black">
          <img src="content/img/prod/<?echo $row_prod['image']?>"
            class="card-img-top" alt="image - product" />
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title"><?echo $row_prod['prd_name']?></h5>
              <p class="text-muted mb-4"><?echo $row_prod['cate_name']?></p>
            </div>
            <div>
              <div class="d-flex justify-content-between">
                <span>Price: </span><span><?echo $row_prod['price']?></span>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<h1 class="h3 mb-2 text-gray-800">Comment</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Create At</th>
                        <th>Content</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Create At</th>
                        <th>Content</th>   
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $i = 1;
                    $db_cmt = new Comment();
                    $rows = $db_cmt->getDetail($id);

                    foreach ($rows as $row) { ?>
                        <tr>
                            <td><? echo $i++ ?></td>
                            <td><? echo $row['email']?></td>
                            <td><? echo $row['create_at']?></td>
                            <td><?echo $row['content']?></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>