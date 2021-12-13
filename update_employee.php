<?php
session_start();
if (isset($_POST['real_name'])) {
    if (isset($_SESSION['admin_manager'])) {
        $employee_id = $_POST['employee_id'];
        $old_id = $_POST['old_id'];
        include("connect.php");

        if ($employee_id == $old_id) {
        } else {
            $stmt4 = $con->prepare("SELECT employee_id FROM employee WHERE employee_id=$employee_id");
            $stmt4->execute();
            $check_id = $stmt4->fetch();
            $count = $stmt4->rowCount();
            if ($count > 0) {
                echo 'this id is used';
                exit();
            }
        }
        $real_name = $_POST['real_name'];
        $facke_name = $_POST['facke_name'];
        $gender = $_POST['gender'];
        $whatsapp = $_POST['whatsapp'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $start_work = $_POST['start_work'];
        $end_work = $_POST['end_work'];
        $status = $_POST['status'];
        $rate = $_POST['rate'];
        $pay_way = $_POST['pay_way'];
        $active_days = $_POST['active_days'];
        $active_hours = $_POST['active_hours'];
        $target = $_POST['target'];
        $discount = $_POST['discount'];
        $bonuses = $_POST['bonuses'];
        $taxes = $_POST['taxes'];
        $old_image = $_POST['old_image'];
        $old_id1 = $_POST['old_id1'];
        $old_id2 = $_POST['old_id2'];
        $old_transfer = $_POST['old_transfer'];
        $old_add = $_POST['old_add'];

        $select_sys = $_POST['select_sys'];

        $valid_extensions1 = array("jpg", "jpeg", "png");

        if (isset($_FILES['image']['name'])) {
            $x = $_FILES['image']['name'];
            $imageFileType1 = pathinfo($x, PATHINFO_EXTENSION);
            $imageFileType1 = strtolower($imageFileType1);
            $image_name = rand(0, 9999999) . rand(0, 99999999) . '_image.' . $imageFileType1;

            if (in_array(strtolower($imageFileType1), $valid_extensions1)) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $image_name)) {

                    if ($old_image != "default.jpg") {
                        unlink("img/" . $old_image . "");
                    }
                } else {
                    $image_name = 'default.jpg';
                }
            }
        } else {
            $image_name = $old_image;
        }
        if (isset($_FILES['id_image1']['name'])) {
            $y = $_FILES['id_image1']['name'];
            $imageFileType2 = pathinfo($y, PATHINFO_EXTENSION);
            $imageFileType2 = strtolower($imageFileType2);
            $id1_name = rand(0, 9999999) . rand(0, 99999999) . '_id1.' . $imageFileType2;
            if (in_array($imageFileType2, $valid_extensions1)) {
                if (move_uploaded_file($_FILES['id_image1']['tmp_name'], 'img/id1/' . $id1_name)) {
                    if ($old_id1 != "default_id.jpg") {
                        unlink("img/id1/" . $old_id1 . "");
                    }
                } else {
                    $id1_name = 'default_id.jpg';
                }
            }
        } else {
            $id1_name = $old_id1;
        }
        if (isset($_FILES['id_image2']['name'])) {
            $z = $_FILES['id_image2']['name'];
            $imageFileType3 = pathinfo($z, PATHINFO_EXTENSION);
            $imageFileType3 = strtolower($imageFileType3);
            $id2_name = rand(0, 9999999) . rand(0, 99999999) . '_id2_' . $employee_id . '.' . $imageFileType3;
            if (in_array($imageFileType3, $valid_extensions1)) {
                if (move_uploaded_file($_FILES['id_image2']['tmp_name'], 'img/id1/' . $id2_name)) {

                    if ($old_id2 != "default_id.jpg") {
                        unlink("img/id1/" . $old_id2 . "");
                    }
                } else {
                    $id2_name = 'default_id.jpg';
                }
            }
        } else {
            $id2_name = $old_id2;
        }
        if (isset($_FILES['transfer_image']['name'])) {
            $y = $_FILES['transfer_image']['name'];
            $imageFileType2 = pathinfo($y, PATHINFO_EXTENSION);
            $imageFileType2 = strtolower($imageFileType2);
            $transfer_image = rand(0, 9999999) . rand(0, 99999999) . '_transfer_' . $employee_id . '.' . $imageFileType2;
            if (in_array($imageFileType2, $valid_extensions1)) {
                if (move_uploaded_file($_FILES['transfer_image']['tmp_name'], 'img/transfer/' . $transfer_image)) {
                    if ($old_transfer != "transfer.jpg") {
                        unlink("img/transfer/" . $old_transfer . "");
                    }
                } else {
                    $transfer_image = 'transfer.jpg';
                }
            }
        } else {
            $transfer_image = $old_transfer;
        }
        if (isset($_FILES['additional_image']['name'])) {
            $y = $_FILES['additional_image']['name'];
            $imageFileType2 = pathinfo($y, PATHINFO_EXTENSION);
            $imageFileType2 = strtolower($imageFileType2);
            $additional_image = rand(0, 9999999) . rand(0, 99999999) . '_add_' . $employee_id . '.' . $imageFileType2;
            if (in_array($imageFileType2, $valid_extensions1)) {
                if (move_uploaded_file($_FILES['additional_image']['tmp_name'], 'img/transfer/' . $additional_image)) {
                    if ($old_add != "add.jpg") {
                        unlink("img/additional/" . $old_add . "");
                    }
                } else {
                    $transfer_image = 'add.jpg';
                }
            }
        } else {
            $additional_image = $old_add;
        }
        include("connect.php");
        $stmt = $con->prepare("UPDATE employee SET employee_id=? ,whatsapp=? ,phone=?,real_name=?,facke_name=?,gender=?,address=?,
                                                start_work=?,end_work=?,status=?,rate=?,pay_way=?,
                                                active_days=?,active_hours=?,target_sys=?,target=?,discount=?,taxes=?,
                                                bonuses=?,image=?,id_image1=?,id_image2=?,additional_image=?,transfer_image=?
                                                WHERE employee_id=?");
        $stmt->execute(array(
            $employee_id, $whatsapp,  $phone, $real_name, $facke_name, $gender, $address,
            $start_work, $end_work, $status, $rate, $pay_way,
            $active_days, $active_hours, $select_sys, $target, $discount, $taxes,
            $bonuses, $image_name, $id1_name, $id2_name, $additional_image, $transfer_image, $old_id


        ));
        if ($stmt) {
            echo 'done';
        }
    }
}
