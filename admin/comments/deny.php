<?php
    if(isset($_GET['deny'])){
        $id = $_GET['deny'];
        $db = new Comment();
        $rowCmt = $db->getCmtByID($id);
        echo $rowCmt['status'];
        if($rowCmt['status'] == "Hiện"){
            $hiddenCmt = $db->hiddenCmt($id);
        }else{
            $visibleCmt = $db->visibleCmt($id);
        }
        echo "<script>document.location='index.php?page=detailComment&id=".$rowCmt['prod_id']."';</script>";
    }
?>