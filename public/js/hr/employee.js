// alert('ok');
//  $(".custom_date").datetimepicker({format: 'dd-mm-yyy'});

 $('#emp_firstname').prop('disabled', true);
 $('#emp_lastname').prop('disabled', true);
 $('#employee_id').prop('disabled', true);
 $('#emp_middle_name').prop('disabled', true);
 $('#other_id').prop('disabled', true);
 $('#driver_license_number').prop('disabled', true);
 $('#driver_license').prop('disabled', true);
 $('#date_of_birth').prop('disabled', true);
 $('#license_expiry_date').prop('disabled', true);
 $('#gender_male').prop('disabled', true);
 $('#gender_female').prop('disabled', true);
 $('#martial_Status').prop('disabled', true);
 $('#nationality').prop('disabled', true);
 $('#military_service').prop('disabled', true);
 $('#checkbox-smoker').prop('disabled', true);
 $('#nickname').prop('disabled', true);
 ////////////////////////////////---------------------Employee Adress ----------------------------------//////////////////////////////
$('#emp_street1').prop('disabled', true);
$('#emp_street2').prop('disabled', true);
$('#city_code').prop('disabled', true);
$('#provin_code').prop('disabled', true);
$('#emp_zipcode').prop('disabled', true);
$('#coun_code').prop('disabled', true);
$('#emp_hm_telephone').prop('disabled', true);
$('#emp_mobile').prop('disabled', true);
$('#emp_work_telephone').prop('disabled', true);
$('#emp_work_email').prop('disabled', true);
$('#emp_oth_email').prop('disabled', true);

$(document).ready(function () {

    var edit = $('#btn_edit').val('Edit');
    // alert(emp_id);
    $('#btn_edit').click(function(e){
        $isEdit = $('#btn_edit').val();
        if($isEdit =="Edit"){
            $('#emp_firstname').prop('disabled', false);
            $('#emp_lastname').prop('disabled', false);
            $('#employee_id').prop('disabled', false);
            $('#emp_middle_name').prop('disabled', false);
            $('#other_id').prop('disabled', false);
            $('#driver_license_number').prop('disabled', false);
            $('#driver_license').prop('disabled', false);
            $('#date_of_birth').prop('disabled', false);
            $('#license_expiry_date').prop('disabled', false);
            $('#gender_male').prop('disabled', false);
            $('#gender_female').prop('disabled', false);
            $('#martial_Status').prop('disabled', false);
            $('#nationality').prop('disabled', false);
            $('#military_service').prop('disabled', false);
            $('#checkbox-smoker').prop('disabled', false);
            $('#nickname').prop('disabled', false);
            var Save = $('#btn_edit').val('Save');
        }else{
            $isSave = $('#btn_edit').val();
            var emp_id = $('#emp_id').val();
            // alert($isSave);
            if($isSave == "Save") {
                // alert('ok');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var formData = {
                    emp_firstname : $('#emp_firstname').val(),
                    emp_lastname: $('#emp_lastname').val(),
                    emp_middle_name : $('#emp_middle_name').val() ,
                    employee_id : $('#employee_id').val(),
                    other_id : $('#other_id').val(),
                    driver_license_number : $('#driver_license_number').val(),
                    emp_dri_lice_exp_date : $('#license_expiry_date').val(),
                    driver_license : $('#driver_license').val(),
                    date_of_birth : $('#date_of_birth').val(),
                    emp_marital_status : $('#martial_Status').val(),
                    emp_gender: $("input[name='gender']:checked").val(),
                    nationality : $('#nationality').val(),
                    military_service : $('#military_service').val(),
                    nickname : $('#nickname').val(),
                    smoker : $('#checkbox-smoker').val(),
                    isPersonalDeatils : $('#isPersonalDeatils').val(),


                }
                // alert(JSON.stringify(formData.emp_gender));
                    $.ajax({
                    cache:false,
                    type: "PUT",
                    url: 'employee/' + emp_id,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        $('#emp_firstname').prop('disabled', true);
                        $('#emp_lastname').prop('disabled', true);
                        $('#employee_id').prop('disabled', true);
                        $('#emp_middle_name').prop('disabled', true);
                        $('#other_id').prop('disabled', true);
                        $('#driver_license_number').prop('disabled', true);
                        $('#driver_license').prop('disabled', true);
                        $('#date_of_birth').prop('disabled', true);
                        $('#license_expiry_date').prop('disabled', true);
                        $('#gender_male').prop('disabled', true);
                        $('#martial_Status').prop('disabled', true);
                        $('#nationality').prop('disabled', true);
                        $('#military_service').prop('disabled', true);
                        $('#checkbox-smoker').prop('disabled', true);
                        $('#nickname').prop('disabled', true);
                        alert('data has been insert !');
                        var Save = $('#btn_edit').val('Edit');

                    },
                    error: function (data) {
                        (JSON.stringify(data));
                        console.log(data);
                        //alert('failed');
                    }
                });
            }else {
                alert('not found');
            }
        }

    });
});

///////////////////////////////////////////////////////////////////////
$(document).ready(function () {

    var edit = $('#btn_edit1').val('Edit');
    // alert(emp_id);
    $('#btn_edit1').click(function(e){
        $isEdit = $('#btn_edit1').val();
        if($isEdit =="Edit"){
            $('#emp_street1').prop('disabled', false);
            $('#emp_street2').prop('disabled', false);
            $('#city_code').prop('disabled', false);
            $('#provin_code').prop('disabled', false);
            $('#emp_zipcode').prop('disabled', false);
            $('#coun_code').prop('disabled', false);
            $('#emp_hm_telephone').prop('disabled', false);
            $('#emp_mobile').prop('disabled', false);
            $('#emp_work_telephone').prop('disabled', false);
            $('#emp_work_email').prop('disabled', false);
            $('#emp_oth_email').prop('disabled', false);
            var Save = $('#btn_edit1').val('Save');
        }else{
            $isSave = $('#btn_edit1').val();
            var emp_id = $('#emp_id').val();
            // alert($isSave);
            if($isSave == "Save") {
                // alert('ok');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var formData = {
                    emp_street1:$('#emp_street1').val(),
                    emp_street2:$('#emp_street2').val(),
                    city_code:$('#city_code').val(),
                    provin_code:$('#provin_code').val(),
                    emp_zipcode:$('#emp_zipcode').val(),
                    coun_code:$('#coun_code').val(),
                    emp_hm_telephone :$('#emp_hm_telephone').val(),
                    emp_mobile:$('#emp_mobile').val(),
                    emp_work_telephone:$('#emp_work_telephone').val(),
                    emp_work_email:$('#emp_work_email').val(),
                    emp_oth_email:$('#emp_oth_email').val(),
                    isContactDetails : $('#isContactDetails').val(),
                }
                // alert(JSON.stringify(formData));
                $.ajax({
                    cache:false,
                    type: "PUT",
                    url: 'employee/' + emp_id,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        $('#emp_street1').prop('disabled', true);
                        $('#emp_street2').prop('disabled', true);
                        $('#city_code').prop('disabled', true);
                        $('#provin_code').prop('disabled', true);
                        $('#emp_zipcode').prop('disabled', true);
                        $('#coun_code').prop('disabled', true);
                        $('#emp_hm_telephone').prop('disabled', true);
                        $('#emp_mobile').prop('disabled', true);
                        $('#emp_work_telephone').prop('disabled', true);
                        $('#emp_work_email').prop('disabled', true);
                        $('#emp_oth_email').prop('disabled', true);
                        alert('data has been insert !');
                        var Save = $('#btn_edit1').val('Edit');
                    },
                    error: function (data) {
                        (JSON.stringify(data));
                        console.log(data);
                        //alert('failed');
                    }
                });
            }else {
                alert('not found');
            }
        }

    });
});


var url = $('#url').val();
//alert(url);
//display modal form for creating new product *********************
$('#btn_add').click(function(){
    //alert('ok');
    $('#btn-save').val("add");
    $('#frmProducts').trigger("reset");
    $('#myModal').modal('show');
    $(".modal-backdrop.in").hide();
});

//alert(url);
$(document).on('click','.open_modal',function(){
    var employee_id = $(this).attr('data-id');
     alert(employee_id);
    // Populate Data in Edit Modal Form
    //('administration/job/' . $jobs->id . '/edit')
    $.ajax({
        type: "GET",
        url: url + '/' + employee_id,
        success: function (data) {
           // alert(JSON.stringify(data));
            $('#product_id').val(data.emp_id);
            $('#emp_firstname').val(data.emp_firstname);
            $('#emp_middle_name').val(data.emp_middle_name);
            $('#emp_lastname').val(data.emp_lastname);
            $('#employee_id').val(data.employee_id);
            $('#job_title').append('<option value="'+ data.job_title_code +'">'+ data.job_title +'</option>');
            $('#btn-save').val("update");
            $('#myModal').modal('show');
            $(".modal-backdrop.in").hide();
        },
        error: function (data) {
            alert(JSON.stringify(data));
            console.log('Error:', data);
        }
    });
});
//create new product / update existing product ***************************
$("#btn-save").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    e.preventDefault();
    var formData = {
        emp_lastname : $('#emp_lastname').val(),
        emp_firstname: $('#emp_firstname').val(),
        emp_middle_name : $('#emp_middle_name').val() ,
        employee_id : $('#employee_id').val(),
        job_title :$('#job_title').val(),
    }
     //alert(JSON.stringify(formData));
    var state = $('#btn-save').val();
    var type = "POST"; //for creating new resource
    var employee_id = $('#product_id').val();
    var my_url = url;
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + employee_id;
    }
    //alert(JSON.stringify(formData));
    $.ajax({
        cache:false,
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
           // alert(JSON.stringify(data));
            var table =
                '<tr id="employee_id'+data.emp_id +'">' +
                '<td class="sorting_1">' + data.employee_id + '</td>'+
                '<td class="sorting_1">' + data.emp_lastname + '</td>'+
                '<td class="sorting_1">' + data.emp_lastname + '</td>'+
                '<td class="sorting_1">' + data.emp_lastname + '</td>'+
                '<td class="sorting_1">' + data.emp_lastname + '</td>'+
                '<td class="sorting_1">' + data.emp_lastname + '</td>';
            table += '<td><a data-id=" '+ data.emp_id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal"> <i class="glyphicon glyphicon-edit"></i></a><a data-id=" '+ data.emp_id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
            if (state == "add"){ //if user added a new record
                $('#products-list').append(table);
            }else{ //if user updated an existing record
                $("#employee_id" + employee_id).replaceWith(table);
            }
            $('#frmProducts').trigger("reset");
            $('#myModal').modal('hide')
        },
        error: function (data) {
            (JSON.stringify(data));
            console.log(data);
            //alert('failed');
        }
    });
});
//delete product and remove it from TABLE list ***************************
$(document).on('click','.delete-item',function(){
    var confirmation = confirm("are you sure you want to remove the item?");
    if(confirmation) {
        var employee_id = $(this).attr('data-id');
//            alert(job_title_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            cache: false,
            url: url + '/' + employee_id,
            dataType: "Json",
            success: function (data) {
                alert(JSON.stringify(data));
                $("#employee_id" + employee_id).remove();
            },
            error: function (data) {
                alert(JSON.stringify(data));
            }
        });
    }
});

$( document ).ready(function() {
    $("#div_login").hide();
    $('#checkbox-login').change(function () {
        if (this.checked)
            $('#div_login').fadeIn('slow');
        else
            $('#div_login').fadeOut('slow');

    });
});

// DO NOT REMOVE : GLOBAL FUNCTIONS!
