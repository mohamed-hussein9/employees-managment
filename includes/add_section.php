     <section class="add_employee">
         <div>
             <h1>إضافة موظف</h1>
             <p class="line"></p>
         </div>
         <form action="" method="" enctype="multipart/form-data" id="formadd">
             <div>
                 <div class=" part1_form">
                     <label for=""> رقم الـ ID : <span style="color:red"> *</span></label>
                     <input type="text" id="employee_id" required="required">
                     <label for=""> الاسم الحقيقي :</label>
                     <input type="text" id="real_name">
                     <label for=""> الاسم المستعار : </label>
                     <input type="text" id="facke_name">

                     <label for=""> رقم الهاتف <span style="font-size: 10px;"> لاستخدامه عند ارسال الحوالة</span></label>
                     <input type="number" id="phone">
                     <label for="">whatsapp</label>
                     <input type="number" id="whatsapp">
                     <label for=""> العنوان</label>
                     <input type="text" id="address">
                     <label for=""> تاريخ البدء</label>
                     <input type="text" id="start_work">
                     <label for=""> تاريخ الانتهاء</label>
                     <input type="text" id="end_work">
                     <label for="">
                         الجنس
                         <select name="gender" id="gender">
                             <option value="1">ذكر</option>
                             <option value="2">انثى</option>

                         </select>
                         الحالة
                         <select name="rate" id="status">
                             <option value="0">غير نشط</option>
                             <option value="1">نشط</option>

                         </select>

                         التقييم
                         <select name="rate" id="rate">
                             <option value="1">*</option>
                             <option value="2">**</option>
                             <option value="3">***</option>
                             <option value="4">****</option>
                             <option value="5">*****</option>
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
                     <input type="text" id="pay_way">

                     <label for="">ايام النشاط</label>
                     <input type="number" id="active_days">
                     <label for=""> ساعات النشاط</label>
                     <input type="number" id="active_hours">
                     <label for=""> التارجيت (نقطة) </label>

                     <select name="" id="select_sys">
                         <option value="sys1">نظام جديد</option>

                         <option value="sys2">نظام قديم</option>
                     </select>


                     <select name="" id="target">
                         <option value="sys1_10000">10000</option>
                         <option value="sys1_15000">15000</option>
                         <option value="sys1_25000">25000</option>
                         <option value="sys1_35000">35000</option>
                         <option value="sys1_50000">50000</option>
                         <option value="sys1_100000">100000</option>
                         <option value="sys1_200000">200000</option>
                         <option value="sys1_350000">350000</option>
                         <option value="sys1_500000">500000</option>
                         <option value="sys1_750000">750000</option>
                         <option value="sys1_1000000">1000000</option>

                     </select>
                     <label for=""> خصم (بالليرة السورية)</label>
                     <input type="number" id="discount">
                     <label for="">مكافآت (بالليرة السورية)</label>
                     <input type="number" id="bonuses">
                     <label for="">ضرائب (%)</label>
                     <input type="number" id="taxes" value="8">
                     <label for="">صورة شخصية
                         <input type="file" id="image">

                     </label>

                     <label for="">صورة وصل الحوالة
                         <input type="file" id="transfer_image">

                     </label>
                     <label for="">صورة اضافية
                         <input type="file" id="additional_image">

                     </label>
                 </div>
             </div>
             <div class="controll_form">

                 <input type="button" class="c1btn" id="exit_add" value="خروج">
                 <input type="reset" class="c1btn" value="تفريغ  الحقول">
                 <input type="button" class="c1btn" value=" إضافة " id="add_new_employee">

             </div>


         </form>
     </section>