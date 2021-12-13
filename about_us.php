<?php session_start();
include('init.php');

if (isset($_SESSION['admin_manager'])) {
    $add_or_edit = '<span id="add_emp_btn">إضافة موظف جديد</span>';
    include('includes/header.php');
?>

    <main>
        <div style="height: 50px;"></div>
        <div class="about_container">
            <div class="about-img"><img src="icons/logo.png" alt=""></div>
            <div class="about-info">
                <p><span>Developed By: ENG.Mohamed Hussein </span></p>
                <p> Web Division team leader in Akitu Dynamic</p>
                <p>Master Web Development</p>
            </div>
            <div class="about-contact">
                <h2>Contact Us</h2>
                <p><span>TEL : </span><span>+963962804965</span></p>
                <p><span>EMAIL : </span><span>mohamed.hussein.a93@gmail.com</span></p>
            </div>

        </div>
    </main>





<?php  } else {
    echo '<div><h1 style="color:red;width:fit-content;margin:auto;">غير مسموح لك بالوصول لهذه الصفحة</h1></div>';
} ?>
<?php include('includes/footer.php') ?>