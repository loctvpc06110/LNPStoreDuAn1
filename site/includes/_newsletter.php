<?php
if (isset($_SESSION['login_email_user'])) {
    $email = $_SESSION['login_email_user'];
    $db_user = new User();
    $db_ques = new Question();
    $row_user = $db_user->getByEmail($email);

    if (isset($_POST['sendQuestion'])) {
        $question = $_POST['question'];
            $ques = $db_ques->createQues($question, $row_user['user_id']);
            echo "<script>document.location='index.php'</script>";
    }

}else if(isset($_SESSION['login_email_admin'])){
    $email = $_SESSION['login_email_admin'];
    $db_user = new User();
    $db_ques = new Question();
    $row_user = $db_user->getByEmail($email);

    if (isset($_POST['sendQuestion'])) {
        $question = $_POST['question'];
            $ques = $db_ques->createQues($question, $row_user['user_id']);
            echo "<script>document.location='index.php'</script>";
    }
} else {
    if (isset($_POST['sendQuestion'])) { 
        echo "<script>document.location='index.php?page=login';</script>";
    }
}
?>
<section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Giải quyết mọi thắc mắc</h4>
            <p>Điền thắc mắc câu hỏi của bạn để được chúng tôi hỗ trợ <span>nhanh nhất có thể.</span></p>
        </div>
        <form method="post" class="form">
            <input name="question" type="text" placeholder="Vấn đề bạn gặp phải ?">
            <button name="sendQuestion" class="normal">Gửi</button>
        </form>
</section>