    <header>
        <nav class="nav">

            <div class="nav_det"> نظام ادارة الموظفين V 1.5</div>
            <div class="logo"><img src="icons/Logo.png" alt=""></div>
        </nav>
        <section class="search_bar">
            <div>
                <a href="index.php" class="c1btn">الرئيسية</a>
                <?php if (isset($add_or_edit)) {
                    echo $add_or_edit;
                } ?>

                <a href="about_us.php" class="c1btn">About</a>
                <form action="search.php" method="POST">
                    <input type="text" name="search_box" placeholder="search for employee">
                    <select name="search_by" class="search_select">
                        <option value="default"> بحث بحسب</option>
                        <option value="employee_id"> ID</option>
                        <option value="real_name">الاسم </option>
                        <option value="phone">رقم الهاتف</option>
                        <option value="address">الاقامة</option>
                    </select>
                    <input type="submit" value="بحث" class="c1btn">
                </form>

            </div>
            <div>
                <h2> المدير الحالي : <span><?php echo $_SESSION['admin_manager'] ?></span></h2>
                <span><a href="logout.php" class="c1btn"> الخروج</a></span>
            </div>
        </section>
    </header>