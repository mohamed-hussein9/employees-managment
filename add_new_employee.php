<?php
session_start();

if (isset($_SESSION['admin_manager']) && isset($_POST['real_name']) && isset($_POST['employee_id'])) {
    $employee_id = $_POST['employee_id'];
    if (!empty($employee_id)) {

        include("connect.php");
        $stmt4 = $con->prepare("SELECT employee_id FROM employee WHERE employee_id=$employee_id");
        $stmt4->execute();
        $count = $stmt4->rowCount();
        if ($count > 0) {
            echo '<script>alert("this id is used");</script>';
            exit();
        }


        $select_sys = $_POST['select_sys'];
        $real_name = $_POST['real_name'];
        $facke_name = $_POST['facke_name'];
        $gender = $_POST['gender'];
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
        $whatsapp = $_POST['whatsapp'];
        $select_sys = $_POST['select_sys'];

        $valid_extensions1 = array("jpg", "jpeg", "png");

        if (isset($_FILES['image']['name'])) {
            $x = $_FILES['image']['name'];
            $imageFileType1 = pathinfo($x, PATHINFO_EXTENSION);

            $imageFileType1 = strtolower($imageFileType1);
            $image_name = rand(0, 9999999) . rand(0, 99999999) . '_image_' . $employee_id . '.' . $imageFileType1;

            if (in_array(strtolower($imageFileType1), $valid_extensions1)) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], 'img/image/' . $image_name)) {
                } else {
                    $image_name = 'default.jpg';
                }
            }
        } else {
            $image_name = 'default.jpg';
        }
        if (isset($_FILES['id_image1']['name'])) {
            $y = $_FILES['id_image1']['name'];
            $imageFileType2 = pathinfo($y, PATHINFO_EXTENSION);
            $imageFileType2 = strtolower($imageFileType2);
            $id1_name = rand(0, 9999999) . rand(0, 99999999) . '_id1_' . $employee_id . '.' . $imageFileType2;
            if (in_array($imageFileType2, $valid_extensions1)) {
                if (move_uploaded_file($_FILES['id_image1']['tmp_name'], 'img/id1/' . $id1_name)) {
                } else {
                    $id1_name = 'default_id.jpg';
                }
            }
        } else {
            $id1_name = 'default_id.jpg';
        }
        if (isset($_FILES['id_image2']['name'])) {
            $z = $_FILES['id_image2']['name'];
            $imageFileType3 = pathinfo($z, PATHINFO_EXTENSION);
            $imageFileType3 = strtolower($imageFileType3);
            $id2_name = rand(0, 9999999) . rand(0, 99999999) . '_id2_' . $employee_id . '.' . $imageFileType3;
            if (in_array($imageFileType3, $valid_extensions1)) {
                if (move_uploaded_file($_FILES['id_image2']['tmp_name'], 'img/id1/' . $id2_name)) {
                } else {
                    $id2_name = 'default_id.jpg';
                }
            }
        } else {
            $id2_name = 'default_id.jpg';
        }
        if (isset($_FILES['transfer_image']['name'])) {
            $x = $_FILES['transfer_image']['name'];
            $imageFileType3 = pathinfo($x, PATHINFO_EXTENSION);

            $imageFileType3 = strtolower($imageFileType3);
            $transfer_image = rand(0, 9999999) . rand(0, 99999999) . '_transfer_image_' . $employee_id . '.' . $imageFileType3;

            if (in_array(strtolower($imageFileType3), $valid_extensions1)) {
                if (move_uploaded_file($_FILES['transfer_image']['tmp_name'], 'img/transfer/' . $transfer_image)) {
                } else {
                    $transfer_image = 'transfer.jpg';
                }
            }
        } else {
            $transfer_image = 'transfer.jpg';
        }
        if (isset($_FILES['additional_image']['name'])) {
            $x = $_FILES['additional_image']['name'];
            $imageFileType1 = pathinfo($x, PATHINFO_EXTENSION);

            $imageFileType1 = strtolower($imageFileType1);
            $additional_image = rand(0, 9999999) . rand(0, 99999999) . '_transfer_image_' . $employee_id . '.' . $imageFileType1;

            if (in_array(strtolower($imageFileType1), $valid_extensions1)) {
                if (move_uploaded_file($_FILES['additional_image']['tmp_name'], 'img/additional/' . $additional_image)) {
                } else {
                    $additional_image = 'add.jpg';
                }
            }
        } else {
            $additional_image = 'add.jpg';
        }

        $stmt = $con->prepare("INSERT INTO employee (employee_id,phone,real_name,facke_name,gender,address,
                                                start_work,end_work,status,rate,pay_way,
                                                active_days,active_hours,target_sys,target,discount,taxes,
                                                bonuses,image,id_image1,id_image2,additional_image,transfer_image,whatsapp)
                                        values(?,?,?,?,?,?,
                                                ?,?,?,?,?,
                                                ?,?,?,?,?,?,
                                                ?,?,?,?,?,?,?)");
        $stmt->execute(array(
            $employee_id, $phone, $real_name, $facke_name, $gender, $address,
            $start_work, $end_work, $status, $rate, $pay_way,
            $active_days, $active_hours, $select_sys, $target, $discount, $taxes,
            $bonuses, $image_name, $id1_name, $id2_name, $additional_image, $transfer_image, $whatsapp


        ));
        if ($stmt) {

?>

            <tr <?php if ($status == 0) {
                    echo 'style="    background: #ff000070;"';
                }
                ?>>

                <td><?php echo $employee_id;  ?></td>

                <td><?php echo $facke_name;  ?></td>
                <td><?php echo $whatsapp;  ?></td>

                <td><?php if ($status == 1) {
                        echo "Active";
                    } else {
                        echo "Not Active";
                    }  ?></td>
                <td><?php
                    if ($rate == 1) {
                        echo "*";
                    } elseif ($rate == 2) {
                        echo "**";
                    } elseif ($rate == 3) {
                        echo "***";
                    } elseif ($rate == 4) {
                        echo "****";
                    } elseif ($rate == 5) {
                        echo "*****";
                    } ?></td>
                <td><?php echo $address;  ?></td>
                <td class="controll_employee"><span><a href="detaile.php?id=<?php echo $employee_id;  ?>"> التفاصيل</span></a>
                    <span id="dad_of_delete"><a href="#" data_id="<?php echo $employee_id;  ?>" id="delete" class="delete"> إزالة</a></span>
                    <?php if ($status == 1) {
                    ?>


                        <div class="copy_con">
                            <span class="copy_show c1btn">copy</span>
                            <input class="copy" style="" value="<?php

                                                                switch ($target) {
                                                                    case 'sys1_10000':
                                                                        $total_income = 83000;
                                                                        $salary1 = 66000;
                                                                        break;
                                                                    case 'sys1_15000':
                                                                        $total_income = 104000;
                                                                        $salary1 = 83000;
                                                                        break;
                                                                    case 'sys1_25000':
                                                                        $total_income = 151000;
                                                                        $salary1 = 120000;
                                                                        break;
                                                                    case 'sys1_35000':
                                                                        $total_income = 206000;
                                                                        $salary1 = 165000;
                                                                        break;
                                                                    case 'sys1_50000':
                                                                        $total_income = 274000;
                                                                        $salary1 = 205000;
                                                                        break;
                                                                    case 'sys1_100000':
                                                                        $total_income = 508000;
                                                                        $salary1 = 381000;
                                                                        break;
                                                                    case 'sys1_200000':
                                                                        $total_income = 937000;
                                                                        $salary1 = 702000;
                                                                        break;
                                                                    case 'sys1_350000':
                                                                        $total_income = 1500000;
                                                                        $salary1 = 1125000;
                                                                        break;
                                                                    case 'sys1_500000':
                                                                        $total_income = 2142000;
                                                                        $salary1 = 1607000;
                                                                        break;
                                                                    case 'sys1_750000':
                                                                        $total_income = 3214000;
                                                                        $salary1 = 2410000;
                                                                        break;
                                                                    case 'sys1_1000000':
                                                                        $total_income = 4285000;
                                                                        $salary1 = 3214000;
                                                                        break;
                                                                    case 'sys2_5000':
                                                                        $total_income = 68000;
                                                                        $salary1 = 50000;
                                                                        break;
                                                                    case 'sys2_10000':
                                                                        $total_income = 135000;
                                                                        $salary1 = 100000;
                                                                        break;
                                                                    case 'sys2_20000':
                                                                        $total_income = 270000;
                                                                        $salary1 = 200000;
                                                                        break;
                                                                    case 'sys2_30000':
                                                                        $total_income = 365000;
                                                                        $salary1 = 260000;
                                                                        break;
                                                                    case 'sys2_40000':
                                                                        $total_income = 460000;
                                                                        $salary1 = 320000;
                                                                        break;
                                                                    case 'sys2_50000':
                                                                        $total_income = 575000;
                                                                        $salary1 = 400000;
                                                                        break;
                                                                    case 'sys2_70000':
                                                                        $total_income = 805000;
                                                                        $salary1 = 560000;
                                                                        break;
                                                                    case 'sys2_100000':
                                                                        $total_income = 1150000;
                                                                        $salary1 = 800000;
                                                                        break;
                                                                    case 'sys2_125000':
                                                                        $total_income = 1438000;
                                                                        $salary1 = 1000000;
                                                                        break;
                                                                    case 'sys2_150000':
                                                                        $total_income = 1725000;
                                                                        $salary1 = 1200000;
                                                                        break;
                                                                    case 'sys2_200000':
                                                                        $total_income = 2300000;
                                                                        $salary1 = 1600000;
                                                                        break;
                                                                    case 'sys2_250000':
                                                                        $total_income = 2875000;
                                                                        $salary1 = 2000000;
                                                                        break;
                                                                    case 'sys2_300000':
                                                                        $total_income = 3450000;
                                                                        $salary1 = 2400000;
                                                                        break;
                                                                    case 'sys2_350000':
                                                                        $total_income = 4025000;
                                                                        $salary1 = 2800000;
                                                                        break;
                                                                    case 'sys2_400000':
                                                                        $total_income = 4600000;
                                                                        $salary1 = 3200000;
                                                                        break;
                                                                    case 'sys2_450000':
                                                                        $total_income = 5175000;
                                                                        $salary1 = 3600000;
                                                                        break;
                                                                    case 'sys2_500000':
                                                                        $total_income = 5750000;
                                                                        $salary1 = 4000000;
                                                                        break;
                                                                    case 'sys2_550000':
                                                                        $total_income = 6325000;
                                                                        $salary1 = 4400000;
                                                                        break;
                                                                    case 'sys2_600000':
                                                                        $total_income = 6900000;
                                                                        $salary1 = 4800000;
                                                                        break;
                                                                    case 'sys2_700000':
                                                                        $total_income = 8050000;
                                                                        $salary1 = 5600000;
                                                                        break;
                                                                    case 'sys2_800000':
                                                                        $total_income = 9200000;
                                                                        $salary1 = 6400000;
                                                                        break;
                                                                    case 'sys2_900000':
                                                                        $total_income = 10350000;
                                                                        $salary1 = 7200000;
                                                                        break;
                                                                    case 'sys2_1000000':
                                                                        $total_income = 11500000;
                                                                        $salary1 = 8000000;
                                                                        break;
                                                                }
                                                                $profit = $total_income - $salary1;
                                                                if (empty($discount)) {
                                                                    $discount = 0;
                                                                }

                                                                $salary = ($salary1 - $discount);
                                                                if (empty($taxes)) {
                                                                    $taxes = 0;
                                                                }
                                                                $x = 100 - $taxes;
                                                                $y = $x / 100;
                                                                $salary_taxes = $salary * $y;
                                                                if (empty($bonuses)) {
                                                                    $bonuses = 0;
                                                                }

                                                                $final_transfer = $salary * $y + $bonuses;
                                                                echo 'ID = ' . $employee_id . '  ||  ';
                                                                echo 'الاسم المراد التحويل اليه  :' . $real_name . '  ||  ';
                                                                echo 'العنوان :' . $address . '  ||  ';
                                                                echo 'رقم الهاتف :' . $whatsapp . '  ||  ';
                                                                echo 'الراتب :' . $final_transfer . '  ||  ';


                                                                ?>" />




                        </div>


                    <?php
                    } ?>
                </td>



            </tr>
<?php
        }
    }
    //if employee_id is iempty
    else {
        echo '<script>alert("You cannot leave id empty");</script>';
    }
}
