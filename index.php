<?php session_start(); ?>

<?php
include('init.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    if ($username == 'admin' && $password == '12345') {

        $_SESSION['admin_manager'] = $username;
    }
}
if (isset($_SESSION['admin_manager'])) {

    $order = 'employee_id';
    $kind = 'DESC';
    if (isset($_GET['order'])) {

        $order = filter_var($_GET['order'], FILTER_SANITIZE_STRING);
        $kind = filter_var($_GET['kind'], FILTER_SANITIZE_STRING);
    }
    $where = '';
    if (isset($_GET['status'])) {
        $stat = $_GET['status'];

        if ($stat == 1 || $stat == 0) {
            $where = 'WHERE status=' . $stat;
        }
    }
    $stmt = $con->prepare("SELECT * FROM employee $where  ORDER BY $order $kind");
    $stmt->execute();
    $results = $stmt->fetchAll();


    $add_or_edit = '<span id="add_emp_btn">إضافة موظف جديد</span>';
    include('includes/header.php');
?>

    <div class="container">
        <div class="h1">
            <h1> قائمة الموظفين : </h1>

        </div>

        <div class="status">
            <a href="index.php?status=1" class="c2btn" id="active_e">الموظفين النشطين </a>
            <a href="index.php?status=0" class="c2btn" id="unactive_e">الموظفين غير نشطين </a>
            <a href="index.php?status=3" class="c2btn" id="all_e">الكل</a>
        </div>


        <?php


        if (!empty($results)) { ?>
            <div class="employee_list">
                <table>
                    <div>
                        <tr>
                            <td class="top_drop_table"></td>
                            <td style="min-width: 80px;">ID</td>


                            <td>الاسم الحقيقي
                                <span> | </span>
                                <span><a href="?order=real_name&kind=DESC" class="up">></a></span>
                                <span> <a href="?order=real_name&kind=ASC" class="down">
                                        < </a> </span>
                            </td>
                            <td>whatsapp</td>
                            <td class="hide_med"> الاقامة
                                <span> | </span>
                                <span><a href="?order=real_name&kind=DESC" class="up">></a></span>
                                <span> <a href="?order=real_name&kind=ASC" class="down">
                                        < </a> </span>
                            </td>

                            <td class="hide_med"> الحالة
                                <span> | </span>
                                <span><a href="?order=status&kind=DESC" class="up">></a></span>
                                <span> <a href="?order=status&kind=ASC" class="down">
                                        < </a> </span>
                            </td>
                            <td class="hide_med">التقييم
                                <span> | </span>
                                <span><a href="?order=rate&kind=DESC" class="up">></a></span>
                                <span> <a href="?order=rate&kind=ASC" class="down">
                                        < </a> </span>
                            </td>

                            <td class="hide_med">التحكم</td>



                        </tr>
                    </div>
                    <div id="emp_list_add">
                        <?php foreach ($results as $result) { ?>
                            <tr <?php if (!isset($_GET['status'])) {
                                    if ($result['status'] == 0) {
                                        echo 'style="    background: #ff000070;"';
                                    }
                                } else {
                                    if ($_GET['status'] == 3) {
                                        if ($result['status'] == 0) {
                                            echo 'style="    background: #ff000070;"';
                                        }
                                    }
                                }  ?>>

                                <td class="drop-hide drop_det"><span class="">+</span></td>
                                <td style="min-width: 80px;"><?php echo $result["employee_id"];  ?></td>

                                <td><?php echo $result["real_name"];  ?>

                                </td>
                                <td><?php echo $result["whatsapp"];  ?></td>
                                <td class="hide_med"><?php echo $result["address"];  ?></td>

                                <td class="hide_med"><?php if ($result["status"] == 1) {
                                                            echo "Active";
                                                        } else {
                                                            echo "Not Active";
                                                        }  ?></td>
                                <td class="hide_med"><?php
                                                        echo  rate($result["rate"]);
                                                        ?></td>

                                <td class="controll_employee hide_med a"><span><a href="detaile.php?id=<?php echo $result["employee_id"];  ?>" class="det_btn"> التفاصيل</span></a>
                                    <span><a href="#" class="delete del_btn" id="delete" data_id="<?php echo $result["employee_id"];  ?>"> إزالة</a></span>
                                    <?php if ($result["status"] == 1) {
                                    ?>


                                        <div class="copy_con">
                                            <span class="copy_show c1btn">copy</span>
                                            <input class="copy" style="" value="<?php
                                                                                $r = target($result["target"]);
                                                                                $total_income = $r[0];
                                                                                $salary1 = $r[1];

                                                                                $profit = $total_income - $salary1;
                                                                                $discount = $result["discount"];
                                                                                $salary = ($salary1 - $discount);
                                                                                $taxes = $result["taxes"];
                                                                                $x = 100 - $taxes;
                                                                                $y = $x / 100;
                                                                                $salary_taxes = $salary * $y;
                                                                                $bonuses = $result["bonuses"];
                                                                                $final_transfer = $salary * $y + $bonuses;
                                                                                echo 'ID = ' . $result["employee_id"] . '  ||  ';
                                                                                echo 'الاسم المراد التحويل اليه  :' . $result["real_name"] . '  ||  ';
                                                                                echo 'العنوان :' . $result["address"] . '  ||  ';
                                                                                echo 'رقم الهاتف :' . $result["whatsapp"] . '  ||  ';
                                                                                echo 'الراتب :' . $final_transfer . '  ||  ';


                                                                                ?>" />




                                        </div>


                                    <?php
                                    } ?>
                                </td>



                            </tr>
                            <tr class="div_dropdown">
                                <td colspan="4">
                                    <div><span>الاقامة :</span> <span><?php echo $result["address"];  ?></span></div>
                                    <div><span>الحالة :</span> <span><?php if ($result["status"] == 1) {
                                                                            echo "Active";
                                                                        } else {
                                                                            echo "Not Active";
                                                                        }  ?></span></div>
                                    <div><span>التحكم :</span> <span><a href="detaile.php?id=<?php echo $result["employee_id"]; ?>" class="det_btn"> التفاصيل</span></a>
                                        <span><a href="#" class="delete del_btn" id="delete " data_id="<?php echo $result["employee_id"];  ?>"> إزالة</a></span>
                                        <?php if ($result["status"] == 1) {
                                        ?>


                                            <div class="copy_con c">
                                                <span class="copy_show c1btn">copy</span>

                                                <textarea class="copy" name="" id="" class><?php
                                                                                            echo 'ID = ' . $result["employee_id"] . '  ||  ';
                                                                                            echo 'الاسم المراد التحويل اليه  :' . $result["real_name"] . '  ||  ';
                                                                                            echo 'العنوان :' . $result["address"] . '  ||  ';
                                                                                            echo 'رقم الهاتف :' . $result["whatsapp"] . '  ||  ';
                                                                                            echo 'الراتب :' . $final_transfer . '  ||  ';
                                                                                            ?></textarea>
                                            </div>
                                        <?php
                                        } ?>
                                    </div>

                                </td>
                            </tr>
                        <?php } ?>
                    </div>
                </table>
            </div>
        <?php } else {
            echo '<div><h1>لا يوجد موظفين يمكنك اضافة موظف بالضغط على زر اضافة موظف جديد</h1></div>';
        } ?>
    </div>

    <!--  =============== ADD EMPLOYEE PAGE =============== -->
    <?php include('includes/add_section.php');  ?>

<?php } else {
?>
    <div class="login">

        <div>
            <h1>تسجيل الدخول</h1>
            <form action="" method="POST">
                <label for=""> اسم المستخدم </label>
                <input type="text" name="username" spellcheck="false" autocomplete="off">
                <label for="">كلمة المرور </label>
                <input type="password" name="password" spellcheck="false" autocomplete="off">
                <input type="submit" value="دخول" class="c1btn">


            </form>
        </div>
    </div>
    <?php

    include('includes/footer.php')
    ?>



<?php
}
include('includes/footer.php')
?>