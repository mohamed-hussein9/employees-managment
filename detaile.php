<?php session_start(); ?>

<?php
include('init.php');

if (isset($_SESSION['admin_manager'])) {
    $add_or_edit = '<span id="add_emp_btn">تعديل بيانات الموظف</span>';
    include('includes/header.php');
?>
    <?php
    include("connect.php");
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $stmt2 = $con->prepare("SELECT * FROM employee WHERE employee_id=?");
        $stmt2->execute(array($id));
        $row = $stmt2->rowCount();
        if ($row == 0) {
            echo "لا يوجد موظف في المعرف المحدد";
        } else {
            $employee = $stmt2->fetch();


    ?>

            <div class="container">
                <div class="h1">
                    <h1> تفاصيل الموظف :<span><?php echo $employee["facke_name"] ?></span> </h1>

                </div>
                <?php
                $target = $employee["target"];
                $r = target($target);
                $total_income = $r[0];
                $salary1 = $r[1];


                $profit = $total_income - $salary1;
                $discount = $employee["discount"];
                $salary = ($salary1 - $discount);
                $taxes = $employee["taxes"];
                $x = 100 - $taxes;
                $y = $x / 100;
                $salary_taxes = $salary * $y;
                $bonuses = $employee["bonuses"];
                $final_transfer = $salary * $y + $bonuses;

                ?>
                <?php if ($employee['status'] == 1) { ?>
                    <div class="copy_det">
                        <p class="c1btn copy_show">نسخ معلومات التحويل </p>
                        <textarea name="" id="coby" class="copy" cols="30" rows="10"><?php echo 'ID = ' . $employee["employee_id"] . '  ||  ';
                                                                                        echo 'الاسم المراد التحويل اليه  :' . $employee["real_name"] . '  ||  ';
                                                                                        echo 'العنوان :' . $employee["address"] . '  ||  ';
                                                                                        echo 'رقم الهاتف :' . $employee["whatsapp"] . '  ||  ';
                                                                                        echo 'الراتب :' . $final_transfer . '  ||  ';  ?></textarea>
                    </div>
                <?php  } ?>



                <div class="employee_list">
                    <div class="details">
                        <div>

                            <div>ID : </div>
                            <div><?php echo $employee["employee_id"] ?></div>
                        </div>
                        <div>
                            <div>whatsapp :</div>
                            <div><?php echo $employee["whatsapp"] ?></div>
                        </div>
                        <div>
                            <div>الاسم الحقيقي : </div>
                            <div><?php echo $employee["real_name"] ?></div>
                        </div>
                        <div>
                            <div>العنوان : </div>
                            <div><?php echo $employee["address"] ?></div>
                        </div>
                        <div>
                            <div>الحوالة :</div>
                            <div><?php echo $final_transfer ?></div>
                        </div>
                        <div>
                            <div>وسيلة الدفع : </div>
                            <div><?php echo $employee["pay_way"] ?></div>
                        </div>
                        <div>
                            <div>ايام النشاط : </div>
                            <div><?php echo $employee["active_days"] ?></div>
                        </div>
                        <div>
                            <div>ساعات النشاط : </div>
                            <div><?php echo $employee["active_hours"] ?></div>
                        </div>
                        <div>
                            <div>التارجيت : </div>
                            <div><?php echo $target  ?></div>
                        </div>
                        <div>
                            <div>اجمالي الدخل :</div>
                            <div><?php echo $total_income  ?></div>
                        </div>
                        <div>
                            <div>راتب الموظف : </div>
                            <div><?php echo $salary1; ?></div>
                        </div>
                        <div>
                            <div>الربح : </div>
                            <div><?php echo $profit; ?></div>
                        </div>
                        <div>
                            <div>خصم : </div>
                            <div><?php echo $discount ?><span> </span></div>
                        </div>
                        <div>
                            <div> الراتب الاجمالي : </div>
                            <div><?php echo $salary; ?><span> </span></div>
                        </div>
                        <div>
                            <div>ضرائب :</div>
                            <div><?php echo $taxes; ?><span> %</span></div>
                        </div>
                        <div>
                            <div> صافي : </div>
                            <div><?php echo $salary_taxes; ?></div>
                        </div>
                        <div>
                            <div>مكافآت :</div>
                            <div><?php echo $bonuses; ?></div>
                        </div>
                        <div>
                            <div>الحوالة :</div>
                            <div><?php echo $final_transfer; ?></div>
                        </div>
                        <div>
                            <div> الجنس :</div>
                            <div><?php if ($employee["gender"] == 1) {
                                        echo "ذكر";
                                    } else {
                                        echo "انثى";
                                    } ?></div>
                        </div>

                        <div>
                            <div>رقم الهاتف : </div>
                            <div><?php echo $employee["phone"] ?></div>
                        </div>
                        <div>
                            <div> تاريخ بدء العمل :</div>
                            <div><?php echo $employee["start_work"] ?></div>
                        </div>
                        <div>
                            <div>تاريخ انتهاء العمل : </div>
                            <div><?php echo $employee["end_work"] ?></div>
                        </div>
                        <div>
                            <div> الحالة : </div>
                            <div><?php if ($employee["status"] == 0) {
                                        echo "غير نشط";
                                    } else {
                                        echo "نشط";
                                    } ?></div>
                        </div>
                        <div>
                            <div>التقييم :</div>
                            <div><?php
                                    echo  rate($employee["rate"]);
                                    ?>
                            </div>
                        </div>









                    </div>

                    <div class="image_area">
                        <div class="personal_image">
                            <p>الصورة الشخصية</p>
                            <img id="personal_img" src="img/image/<?php echo $employee['image']; ?>" alt="">
                        </div>
                        <p>صورة الهوية : </p>
                        <div class="id_images">

                            <div>
                                <img src="img/id1/<?php echo $employee['id_image1']; ?>" alt="">
                            </div>
                            <div><img src="img/id1/<?php echo $employee['id_image2']; ?>" alt=""></div>
                        </div>
                        <div class="other_images">


                            <div>
                                <p>صورة الحوالة :</p>

                                <img src="img/transfer/<?php echo $employee['transfer_image']; ?>" alt="">
                            </div>

                            <div>
                                <p>صورة اخرى:</p>
                                <img src="img/additional/<?php echo $employee['additional_image']; ?>" alt="">
                            </div>


                        </div>
                    </div>

                </div>
            </div>
            <section class="add_employee">
                <div>
                    <h1>تعديل بيانات الموظف </h1>
                    <p class="line"></p>
                </div>
                <form action="" method="" enctype="multipart/form-data" id="formadd">
                    <div>
                        <div class=" part1_form">
                            <label for=""> رقم الـ ID : <span style="color:red"> *</span></label>
                            <input type="text" id="employee_id" required="required" value="<?php echo $employee["employee_id"] ?>">
                            <label for=""> الاسم الحقيقي :</label>
                            <input type="text" id="real_name" value="<?php echo $employee["real_name"] ?>">
                            <label for=""> الاسم المستعار : </label>
                            <input type="text" id="facke_name" value="<?php echo $employee["facke_name"] ?>">

                            <label for=""> رقم الهاتف</label>
                            <input type="number" id="phone" value="<?php echo $employee["phone"] ?>">
                            <label for="">whatsapp</label>
                            <input type="number" id="whatsapp" value="<?php echo $employee["whatsapp"] ?>">
                            <label for=""> العنوان</label>
                            <input type="text" id="address" value="<?php echo $employee["address"] ?>">
                            <label for=""> تاريخ البدء</label>
                            <input type="text" id="start_work" value="<?php echo $employee["start_work"] ?>">
                            <label for=""> تاريخ الانتهاء</label>
                            <input type="text" id="end_work" value="<?php echo $employee["end_work"] ?>">
                            <label for="">
                                الجنس
                                <select name="gender" id="gender">
                                    <option value="1" <?php if ($employee["gender"] == 1) {
                                                            echo "selected";
                                                        }  ?>>ذكر</option>
                                    <option value="2" <?php if ($employee["gender"] == 2) {
                                                            echo "selected";
                                                        }  ?>>انثى</option>

                                </select>
                                الحالة
                                <select name="status" id="status">
                                    <option value="0" <?php if ($employee["status"] == 0) {
                                                            echo "selected";
                                                        }  ?>>غير نشط</option>
                                    <option value="1" <?php if ($employee["status"] == 1) {
                                                            echo "selected";
                                                        }  ?>>نشط</option>

                                </select>




                                التقييم
                                <select name="rate" id="rate">
                                    <option value="1" <?php if ($employee["rate"] == 1) {
                                                            echo "selected";
                                                        }  ?>>*</option>
                                    <option value="2" <?php if ($employee["rate"] == 2) {
                                                            echo "selected";
                                                        }  ?>>**</option>
                                    <option value="3" <?php if ($employee["rate"] == 3) {
                                                            echo "selected";
                                                        }  ?>>***</option>
                                    <option value="4" <?php if ($employee["rate"] == 4) {
                                                            echo "selected";
                                                        }  ?>>****</option>
                                    <option value="5" <?php if ($employee["rate"] == 5) {
                                                            echo "selected";
                                                        }  ?>>*****</option>
                                </select>
                            </label>

                            <label for="">صورة هوية1
                                <input type="file" id="id_image1">

                            </label>
                            <label for="">صورة هوية2
                                <input type="file" id="id_image2">

                            </label>



                        </div>
                        <div class="part2_form">
                            <label for=""> وسيلة الدفع</label>
                            <input type="text" id="pay_way" value="<?php echo $employee["pay_way"] ?>">
                            <label for="">ايام النشاط</label>
                            <input type="number" id="active_days" value="<?php echo $employee["active_days"] ?>">
                            <label for=""> ساعات النشاط</label>
                            <input type="number" id="active_hours" value="<?php echo $employee["active_hours"] ?>">

                            <label for=""> التارجيت (نقطة) </label>

                            <select name="" id="select_sys" class="select_sts_edit">
                                <option value="sys1" <?php if ($employee["target_sys"] == 'sys1') {
                                                            echo 'selected';
                                                        }  ?>>نظام جديد</option>

                                <option value="sys2" <?php if ($employee["target_sys"] == 'sys2') {
                                                            echo 'selected';
                                                        }  ?>>نظام قديم</option>
                            </select>


                            <select class="target_list" name="" id="target" style="display:none;"></select>
                            <input id="target_val_hide" type="text" value="<?php echo $employee["target"] ?>">


                            <label for=""> خصم (بالليرة السورية)</label>
                            <input type=" number" id="discount" value="<?php echo $employee["discount"] ?>">
                            <label for="">مكافآت (بالليرة السورية)</label>
                            <input type="number" id="bonuses" value="<?php echo $employee["bonuses"] ?>">
                            <label for="">ضرائب (%)</label>
                            <input type="number" id="taxes" value="<?php echo $employee["taxes"] ?>">
                            <label for="">صورة شخصية
                                <input type="file" id="image">

                            </label>

                            <label for="">صورة وصل الحوالة
                                <input type="file" id="transfer_image">

                            </label>
                            <label for="">صورة اضافية
                                <input type="file" id="additional_image">

                            </label>
                            <input type="hidden" id="old_image" value="<?php echo $employee["image"] ?>">
                            <input type="hidden" id="old_id1" value="<?php echo $employee["id_image1"] ?>">
                            <input type="hidden" id="old_id2" value="<?php echo $employee["id_image2"] ?>">
                            <input type="hidden" id="old_transfer" value="<?php echo $employee["transfer_image"] ?>">
                            <input type="hidden" id="old_add" value="<?php echo $employee["additional_image"] ?>">
                            <input type="hidden" id="old_id" value="<?php echo $_GET['id']; ?>">





                        </div>
                    </div>
                    <div class="controll_form">
                        <input type="button" class="c1btn" id="exit_add" value="خروج">
                        <input type="reset" class="c1btn" value="تفريغ  الحقول">
                        <input type="button" class="c1btn" value=" حفظ " id="edit_employee">

                    </div>


                </form>
            </section>
    <?php }
    } else {
        echo "لا يمكنك الدخول الى هذه الصفحة مباشرة ";
    }
    ?>


<?php } else {
    echo '<div><h1 style="color:red;width:fit-content;margin:auto;">غير مسموح لك بالوصول لهذه الصفحة</h1></div>';
} ?>
<?php include('includes/footer.php') ?>