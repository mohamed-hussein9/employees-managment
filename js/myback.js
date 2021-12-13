$(function () {
    $('#active_e').children().css('width', '100%')


    $("#add_emp_btn").on("click", function () {
        $(".add_employee").fadeIn(500);
    });
    $("#exit_add").on("click", function () {
        $(".add_employee").fadeOut(500);
    });
    $("#add_new_employee").on("click", function () {

        var fd = new FormData();

        var files1 = $('#image')[0].files;
        var files2 = $('#id_image1')[0].files;
        var files3 = $('#id_image2')[0].files;
        var files4 = $('#transfer_image')[0].files;
        var files5 = $('#additional_image')[0].files;


        // Check file selected or not
        if (files1.length > 0) {


            fd.append('image', files1[0]);

        }
        if (files2.length > 0) {
            fd.append('id_image1', files2[0]);

        }
        if (files3.length > 0) {
            fd.append('id_image2', files3[0]);

        }
        if (files4.length > 0) {
            fd.append('transfer_image', files4[0]);

        }
        if (files5.length > 0) {
            fd.append('additional_image', files5[0]);

        }

        var real_name = $("#real_name").val();
        var facke_name = $("#facke_name").val();
        var gender = $("#gender").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var start_work = $("#start_work").val();
        var end_work = $("#end_work").val();
        var status = $("#status").val();
        var rate = $("#rate").val();

        var pay_way = $("#pay_way").val();

        var active_days = $("#active_days").val();
        var active_hours = $("#active_hours").val();
        var target = $("#target").val();
        var discount = $("#discount").val();
        var bonuses = $("#bonuses").val();
        var taxes = $("#taxes").val();
        var whatsapp = $("#whatsapp").val();
        var select_sys = $("#select_sys").val();
        var employee_id = $("#employee_id").val();



        fd.append('real_name', real_name);
        fd.append('facke_name', facke_name);
        fd.append('gender', gender);
        fd.append('phone', phone);
        fd.append('address', address);
        fd.append('start_work', start_work);
        fd.append('end_work', end_work);
        fd.append('status', status);
        fd.append('rate', rate);
        fd.append('pay_way', pay_way);
        fd.append('active_days', active_days);
        fd.append('active_hours', active_hours);
        fd.append('target', target);
        fd.append('discount', discount);
        fd.append('bonuses', bonuses);
        fd.append('taxes', taxes);
        fd.append('whatsapp', whatsapp);
        fd.append('transfer_image', transfer_image);
        fd.append('additional_image', additional_image);
        fd.append('select_sys', select_sys);
        fd.append('employee_id', employee_id);


        $.ajax({
            url: 'add_new_employee.php',
            method: 'post',
            data: fd,
            beforeSend: function () {
                $("#add_new_employee").attr("disabled", "disabled");
            },
            contentType: false,
            processData: false,
            success: function (response) {
                $(".employee_list table tbody").append(response);
                // if (response != 0) {
                //     $("#img").attr("src", response);
                //     $('.preview img').show();
                // } else {
                //     alert('File not uploaded');
                // }
            },
            complete: function () {

                $("#add_new_employee").removeAttr("disabled");
                $(".add_employee").fadeOut(500);

            }
        });
    });

    // start delete

    $(".employee_list tbody").on("click", ".delete", function (e) {

        e.preventDefault();
        if (confirm("سيتم حذف الموظف نهائياَ .. هل  انت متأكد؟")) {
            var data_id = $(this).attr("data_id");
            var the_item = $(this);

            $.ajax({

                method: "POST",
                url: "delete.php",
                data: { "data_id": data_id },
                beforeSend: function () { },
                success: function (response) {
                    alert(response);
                    the_item.parent().parent().parent().remove();
                },
                complete: function () { }

            })
        }

    });

    //==========edit emploee=====
    $("#edit_employee").on("click", function () {

        var fd = new FormData();

        var files1 = $('#image')[0].files;
        var files2 = $('#id_image1')[0].files;
        var files3 = $('#id_image2')[0].files;
        var files4 = $('#transfer_image')[0].files;
        var files5 = $('#additional_image')[0].files;


        // Check file selected or not
        if (files1.length > 0) {


            fd.append('image', files1[0]);

        }
        if (files2.length > 0) {
            fd.append('id_image1', files2[0]);

        }
        if (files3.length > 0) {
            fd.append('id_image2', files3[0]);

        }
        if (files4.length > 0) {
            fd.append('transfer_image', files4[0]);

        }
        if (files5.length > 0) {
            fd.append('additional_image', files5[0]);

        }


        var real_name = $("#real_name").val();
        var facke_name = $("#facke_name").val();
        var gender = $("#gender").val();
        var whatsapp = $("#whatsapp").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var start_work = $("#start_work").val();
        var end_work = $("#end_work").val();
        var status = $("#status").val();
        var rate = $("#rate").val();

        var pay_way = $("#pay_way").val();

        var active_days = $("#active_days").val();
        var active_hours = $("#active_hours").val();
        var target = $("#target").val();
        if (target) { }
        else { var target = $("#target_val_hide").val(); }
        var discount = $("#discount").val();
        var bonuses = $("#bonuses").val();
        var taxes = $("#taxes").val();
        var old_image = $("#old_image").val();
        var old_id1 = $("#old_id1").val();
        var old_id2 = $("#old_id2").val();
        var old_transfer = $("#old_transfer").val();
        var old_add = $("#old_add").val();
        var select_sys = $("#select_sys").val();
        var employee_id = $("#employee_id").val();
        var old_id = $('#old_id').val();







        fd.append('real_name', real_name);
        fd.append('facke_name', facke_name);
        fd.append('gender', gender);
        fd.append('phone', phone);
        fd.append('address', address);
        fd.append('start_work', start_work);
        fd.append('end_work', end_work);
        fd.append('status', status);
        fd.append('rate', rate);
        fd.append('pay_way', pay_way);

        fd.append('active_days', active_days);
        fd.append('active_hours', active_hours);
        fd.append('target', target);
        fd.append('discount', discount);
        fd.append('bonuses', bonuses);
        fd.append('taxes', taxes);
        fd.append('old_image', old_image);
        fd.append('old_id1', old_id1);
        fd.append('old_id2', old_id2);
        fd.append('employee_id', employee_id);
        fd.append('select_sys', select_sys);
        fd.append('whatsapp', whatsapp);
        fd.append('transfer_image', transfer_image);
        fd.append('additional_image', additional_image);
        fd.append('old_transfer', old_transfer);
        fd.append('old_add', old_add);
        fd.append('old_id', old_id);



        $.ajax({
            url: 'update_employee.php',
            method: 'post',
            data: fd,
            beforeSend: function () {
                $("#edit_employee").attr("disabled", "disabled");
            },
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response);
            },
            complete: function () {

                $("#edit_employee").removeAttr("disabled");
                location.reload();

            }
        });
    });
    $(".copy").on('click', function () {

        var copyText = $(this).select();


        document.execCommand("copy");
        $(this).delay(300).fadeOut();


    });
    $(".copy_show").on("click", function () {
        $(".copy").fadeOut();

        $(this).next().slideToggle(500);
    });
    $('#coby_details').on('click', function () {

        var txt = $(this).select();
        document.execCommand("copy");
        console.log(txt[0].innerHTML)
    });
    $('#target_val_hide').one('click', function () {
        $(this).hide();
        var sys = $(this).prev().prev().val();
        var the_target = $(this).prev();

        if (sys == 'sys2') {
            $(the_target).html('<option value="sys2_5000">5000</option>' +
                '<option value="sys2_10000">10000</option>' +
                '<option value="sys2_20000">20000</option>' +
                '<option value="sys2_30000">30000</option>' +
                '<option value="sys2_40000">40000</option>' +
                '<option value="sys2_50000">50000</option>' +
                '<option value="sys2_70000">70000</option>' +
                '<option value="sys2_100000">100000</option>' +
                '<option value="sys2_125000">125000</option>' +
                '<option value="sys2_150000">150000</option>' +
                '<option value="sys2_200000">200000</option>' +
                '<option value="sys2_250000">250000</option>' +
                '<option value="sys2_300000">300000</option>' +
                '<option value="sys2_350000">350000</option>' +
                '<option value="sys2_400000">450000</option>' +
                '<option value="sys2_450000">500000</option>' +
                '<option value="sys2_500000">500000</option>' +
                '<option value="sys2_550000">550000</option>' +
                '<option value="sys2_600000">600000</option>' +
                '<option value="sys2_700000">700000</option>' +
                '<option value="sys2_800000">800000</option>' +
                '<option value="sys2_900000">900000</option>' +
                '<option value="sys2_1000000">1000000</option>');
        }
        else if (sys == 'sys1') {
            $(the_target).html('<option value="sys1_10000">10000</option>' +
                '<option value="sys1_15000">15000</option>' +
                '<option value="sys1_25000">25000</option>' +
                '<option value="sys1_35000">35000</option>' +
                '<option value="sys1_50000">50000</option>' +
                '<option value="sys1_100000">100000</option>' +
                '<option value="sys1_200000">200000</option>' +
                '<option value="sys1_350000">350000</option>' +
                '<option value="sys1_500000">500000</option>' +
                '<option value="sys1_750000">750000</option>' +
                '<option value="sys1_1000000">1000000</option>');
        }
        the_target.show();


    });
    $('#select_sys').on('change', function () {

        var sys = $(this).val();
        if (sys == 'sys2') {
            $(this).next().html('<option value="sys2_5000">5000</option>' +
                '<option value="sys2_10000">10000</option>' +
                '<option value="sys2_20000">20000</option>' +
                '<option value="sys2_30000">30000</option>' +
                '<option value="sys2_40000">40000</option>' +
                '<option value="sys2_50000">50000</option>' +
                '<option value="sys2_70000">70000</option>' +
                '<option value="sys2_100000">100000</option>' +
                '<option value="sys2_125000">125000</option>' +
                '<option value="sys2_150000">150000</option>' +
                '<option value="sys2_200000">200000</option>' +
                '<option value="sys2_250000">250000</option>' +
                '<option value="sys2_300000">300000</option>' +
                '<option value="sys2_350000">350000</option>' +
                '<option value="sys2_400000">450000</option>' +
                '<option value="sys2_450000">500000</option>' +
                '<option value="sys2_500000">500000</option>' +
                '<option value="sys2_550000">550000</option>' +
                '<option value="sys2_600000">600000</option>' +
                '<option value="sys2_700000">700000</option>' +
                '<option value="sys2_800000">800000</option>' +
                '<option value="sys2_900000">900000</option>' +
                '<option value="sys2_1000000">1000000</option>');
        }
        else if (sys == 'sys1') {
            $(this).next().html('<option value="sys1_10000">10000</option>' +
                '<option value="sys1_15000">15000</option>' +
                '<option value="sys1_25000">25000</option>' +
                '<option value="sys1_35000">35000</option>' +
                '<option value="sys1_50000">50000</option>' +
                '<option value="sys1_100000">100000</option>' +
                '<option value="sys1_200000">200000</option>' +
                '<option value="sys1_350000">350000</option>' +
                '<option value="sys1_500000">500000</option>' +
                '<option value="sys1_750000">750000</option>' +
                '<option value="sys1_1000000">1000000</option>');
        }

    });
    // drop down
    $('.drop_det').on('click', function () {
        $(this).parent().next().toggle();
        if ($(this).text() === '+') {
            $(this).text('-');
            $(this).css('background', '#e67448')

        }
        else {
            $(this).text('+');
            $(this).css('background', '#4edb5a');
        }


    })



})
