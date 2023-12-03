<section id="page-header">

</section>
<section id="logo-brand" class="section-p1">
    <?php
    $db = new Categories();
    $rows2 = $db->lishCategories();

    foreach ($rows2 as $row2) { ?>
        <a href="?page=product_dm&id=<?php echo $row2['cate_id'] ?>">
            <img src="images/prod/<?php echo $row2['images'] ?>" alt="Image Shirt" width="60%">
        </a>
    <?php } ?>
</section>

<section id="product1" class="section-p1">
    <h2>Tất Cả Sản Phẩm</h2>
    <p>Sản phẩm công nghệ hiện đại mới nhất</p>
    <div class="pro-container">

        <?php
        // Limit là số dòng dữ liệu hiển thị mỗi trang
        $limit = 12;

        // Tìm CURRENT_PAGE
        if (isset($_GET["pagination"])) {
            $current_page = $_GET["pagination"];
        } else {
            $current_page = 1;
        };

        // Start là đòng dữ liệu bất đầu
        $start = (intval($current_page - 1)) * $limit;

        // Truy vấn danh sách
        $dblist = new Product();
        $rows = $dblist->getListLimit($start, $limit);

        foreach ($rows as $row1) { ?>

            <a href="?page=detail&id=<?= $row1['prod_id']; ?>">
                <div class="pro">
                    <img src="images/prod/<?= $row1['image'] ?>" alt="Image Shirt">
                    <div class="des">
                        <span>
                            <?= $row1['rom'] ?> / <?= $row1['ram'] ?>
                        </span>
                        <h5>
                            <?= $row1['name'] ?>
                        </h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>
                            <?= $row1['price'] ?> VNĐ
                        </h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </a>

        <?php } ?>
    </div>

</section>

<?php
$limit = 12;
// tính tổng số dòng dữ liệu

$total_records = $dblist->number_rows();

// Tính tổng số trang
$total_page = ceil($total_records / $limit);

$pageLink = "<section id='pagination' class='section-p1'>";
for ($i = 1; $i <= $total_page; $i++) {
    $pageLink .= "<a href='?page=shop&pagination=" . $i . "'>$i</a>";
}
echo $pageLink . "</section>";
?>

<?php include("_newsletter.php"); ?>
<!--End news -->