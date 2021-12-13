<?php
session_start();
if (isset($_POST["data_id"])) {
    if (isset($_SESSION['admin_manager'])) {
        include("connect.php");
        $stmt2 = $con->prepare("SELECT image,id_image1,id_image2,additional_image,transfer_image FROM employee WHERE employee_id=?");
        $stmt2->execute(array($_POST["data_id"]));
        $images = $stmt2->fetch();


        $stmt = $con->prepare("DELETE FROM employee WHERE employee_id=:i");
        $stmt->bindParam(":i", $_POST["data_id"]);
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {

            if ($images['image'] != 'default.jpg') {
                unlink("img/image/" . $images['image'] . "");
            }
            if ($images['id_image1'] != 'default_id.jpg') {
                unlink("img/id1/" . $images['id_image1'] . "");
            }
            if ($images['id_image2'] != 'default_id.jpg') {
                unlink("img/id1/" . $images['id_image2'] . "");
            }
            if ($images['additional_image'] != 'add.jpg') {
                unlink("img/additional/" . $images['additional_image'] . "");
            }
            if ($images['transfer_image'] != 'transfer.jpg') {
                unlink("img/transfer/" . $images['transfer_image'] . "");
            }
            echo 'تم الحذف';
        } else {
            echo 'خطأ .. لم يتم الحذف';
        }
    }
}
