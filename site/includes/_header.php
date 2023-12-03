<header id="header">
    <a href="?page=home"><img src="images/logoShop.png" class="logo"></a>
    <div>
        <ul id="navbar">
            <li><a href="?page=home">Trang Chủ</a></li>
            <li><a href="?page=shop">Cửa Hàng</a></li>
            <li><a href="?page=blog">Tin Tức</a></li>
            <li><a href="?page=about">Giới Thiệu</a></li>
            <li><a href="?page=contact">Liên Hệ</a></li>
            <?php
            if (isset($_SESSION['login_email_admin'])) {
                echo '<li><a href="?page=admin">Quản Lý</a></li>';
            }
            ?>
            <li id="lg-search"><a class="openBtn" onclick="openSearch()"><i class="fa fa-search"></i></a></li>
            <?php
            if (isset($_SESSION['login_email_user'])) {
                echo "<li id='lg-user'><a href='?page=infouser'>" . $_SESSION['login_email_user'] . "</a></li>";
            } else if (isset($_SESSION['login_email_admin'])) {
                echo "<li id='lg-user'><a href='?page=infouser'>" . $_SESSION['login_email_admin'] . "</a></li>";
            } else {
                echo "<li id='lg-user'><a href='?page=login'><i class='fa-solid fa-user'></i></a></li>";
            }
            ?>

            <li id="lg-bag"><a href="?page=cart"><i class="fa-solid fa-bag-shopping"></i></a></li>
            <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
        </ul>
    </div>
    <div id="mobile">
        <a class="openBtn" onclick="openSearch()"><i class="fa fa-search"></i></a>
        <?php
        if (isset($_SESSION['login_email_user'])) {
            echo '<a href="?page=infouser"><i class="fa-solid fa-user"></i></a>';
        } else if (isset($_SESSION['login_email_admin'])) {
            echo '<a href="?page=infouser"><i class="fa-solid fa-user"></i></a>';
        } else {
            echo '<a href="?page=login"><i class="fa-solid fa-user"></i></a>';
        }
        ?>
        <a href="?page=cart"><i class="fa-solid fa-bag-shopping"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>

    <div id="myOverlay" class="overlay">
        <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
        <div class="overlay-content">
            <form method="POST" action="?page=search">
                <input type="text" placeholder="Search.." name="txt_search">
                <button type="submit" class="btn" name="search"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</header>
<script>
    function openSearch() {
        document.getElementById("myOverlay").classList.add('show-search');
    }

    function closeSearch() {
        document.getElementById("myOverlay").classList.remove('show-search');
    }
</script>