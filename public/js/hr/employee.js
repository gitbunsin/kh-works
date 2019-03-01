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


// var url = $('#url').val();
//alert(url);
var url = '/administration/employee-emergency-contact';
// var url = '/administration/employee-emergency-update';
// alert(url);
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
    var emergency_id = $(this).attr('data-id');
     // alert(emergency_id);
    // Populate Data in Edit Modal Form
    //('administration/job/' . $jobs->id . '/edit')
    $.ajax({
        type: "GET",
        url: url +'/' + emergency_id,
        success: function (data) {
           // alert(JSON.stringify(data.eec_name));
            $('#product_id').val(data.id);
            $('#name').val(data.eec_name);
            $('#relationship').val(data.eec_relationship);
            $('#home_telephone').val(data.eec_home_no);
            $('#mobile').val(data.eec_mobile_no);
            $('#work_telephone').val(data.eec_office_no);
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
            // emp_id : $('#emp_id').val(),
            id: $('#product_id').val(),
            eec_name:$('#name').val(),
            eec_relationship:$('#relationship').val(),
            eec_home_no:$('#home_telephone').val(),
            eec_mobile_no:$('#mobile').val(),
            eec_office_no:$('#work_telephone').val(),
    }
     // alert(JSON.stringify(formData));
    var state = $('#btn-save').val();
    var employee_id = $('#emp_id').val();
    // alert(employee_id);
    var type = "POST"; //for creating new resource
    var emergency_id = $('#product_id').val();
    var my_url = url;
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + emergency_id;
    }
    //alert(JSON.stringify(formData));
    $.ajax({
        cache:false,
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            var table =
                '<tr id="emergency_id' + data.id +'">' +
                '<td class="sorting_1">' + data.eec_name + '</td>'+
                '<td class="sorting_1">' + data.eec_relationship + '</td>'+
                '<td class="sorting_1">' + data.eec_home_no + '</td>'+
                '<td class="sorting_1">' + data.eec_mobile_no + '</td>'+
                '<td class="sorting_1">' + data.eec_office_no + '</td>';
            table += '<td><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal"> <i class="glyphicon glyphicon-edit"></i></a><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
            if (state == "add"){ //if user added a new record
                alert("data has been inserted");
                $('#products-list').append(table);
            }else{ //if user updated an existing record
                alert("data has been updated");
                $("#emergency_id" + emergency_id).replaceWith(table);
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
//            alert(job_titles_id);
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
// ============================================Emp work Experience======================
// $('#btn_add_experience').click(function(){
//     //alert('ok');
//     $('#btn-save').val("add");
//     $('#frmProducts').trigger("reset");
//     $('#myModal_qualifications').modal('show');
//     $(".modal-backdrop.in").hide();
// });
//////////////////////////////////
$('#demo-experience').hide();
$(document).on('click','#btnclose',function(e){
    $('#demo-experience').hide({
        duration: 500,
    });
    $('#frmExperience').trigger("reset");
});

$(document).on('click','#show',function(e){
    $('#demo-experience').show({
        duration: 500,
    });
    $('#frmExperience').trigger("reset");
    $('#btn-save_experience').val("add");
});

$(document).on('click','.open_modal_experience',function(e){
    var emp_work_id = $(this).attr('data-id');
    // alert(emp_work_id);
    // Populate Data in Edit Modal Form
    //('administration/job/' . $jobs->id . '/edit')
    $.ajax({
        type: "GET",
        url: '/administration/employee-work-experience'+'/' + emp_work_id,
        success: function (data) {
            $('#demo-experience').show({
                duration: 500,
            });//you can list several class names
            $('#product_id').val(data.id);
            $('#company').val(data.eexp_employer);
            $('#job_titles').val(data.eexp_jobtit);
            $('#from_date').val(data.eexp_from_date);
            $('#btn-save_experience').val("update");
            $('#to_date').val(data.eexp_to_date);
            $('#comment').val(data.eexp_comments);
            e.preventDefault();
        },
        error: function (data) {
            alert(JSON.stringify(data));
            console.log('Error:', data);
        }
    });
});
////////////////////



$("#btn-save_experience").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData =
    {
        eexp_employer: $('#company').val(),
        eexp_jobtit: $('#job_titles').val(),
        eexp_from_date: $('#from_date').val(),
        eexp_to_date: $('#to_date').val(),
        eexp_comments: $('#comment').val(),

    }
    // alert(JSON.stringify(formData));
    var state = $('#btn-save_experience').val();
    var employee_id = $('#emp_id').val();
    // alert(employee_id);
    var type = "POST"; //for creating new resource
    var emp_work_id = $('#product_id').val();
    alert(emp_work_id);
    // alert(emp_work_id);
    var my_url = '/administration/employee-work-experience';
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + emp_work_id;
    }
    //alert(JSON.stringify(formData));
    $.ajax({
        cache:false,
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            $('#demo-experience').hide();
            var table =
                '<tr id="work_experience_id' + data.id +'">' +
                '<td class="sorting_1"><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal_experience">' + data.eexp_employer+ '</a></td>'+
                '<td class="sorting_1">' + data.eexp_jobtit +'</td>'+
                '<td class="sorting_1">' + data.eexp_from_date + '</td>'+
                '<td class="sorting_1">' + data.eexp_to_date + '</td>'+
                '<td class="sorting_1">' + data.eexp_comments + '</td>'
            table += '<td><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
            if (state == "add"){ //if user added a new record
                alert("data has been inserted");
                $('#demo-experience').hide();
                $("tbody>tr>td.dataTables_empty").hide();
                $('#products-list').append(table);
            }else{ //if user updated an existing record
                alert("data has been updated");
                $('#demo-experience').hide();
                $("#work_experience_id" + emp_work_id).replaceWith(table);
            }
             $('#frmExperience').trigger("reset");
        },
        error: function (data) {
            (JSON.stringify(data));
            console.log(data);
            //alert('failed');
        }
    });
});
// $('.datepicker1').datepicker({
//
// });
// DO NOT REMOVE : GLOBAL FUNCTIONS!
// ============================================Emp Skills======================
// $('#btn_add_skills').click(function(){
//     //alert('ok');
//     $('#btn_add_skills').val("add");
//     $('#frmProducts').trigger("reset");
//     $('#myModal_skills').modal('show');
//     $(".modal-backdrop.in").hide();
// });
//
//

$('#demo_skill').hide();
$(document).on('click','#btnclose_skill',function(e){
    $('#demo_skill').hide({
        duration: 500,
    });
    $('#frmProducts_skill').trigger("reset");
});

$(document).on('click','#show_skill',function(e){
    $('#demo_skill').show({
        duration: 500,
    });
    $('#frmProducts').trigger("reset");
    $('#btn_add_skills').val("add");
});
//Edit Skills
$(document).on('click','.edit_skill',function(e){
    var skill_id = $(this).attr('data-id');
    // alert(skill_id);
    $.ajax({
        type: "GET",
        url: '/administration/employee-work-skills'+'/' + skill_id,
        success: function (data) {
             // alert(JSON.stringify(data));
            $('#demo_skill').show({
                duration: 500,
            });
               $('#skill_id').val(data.id),
               $('#skills').val(data.skill_id),
               $('#year_of_experience ').val(data.years_of_exp),
               $('#comments').val(data.comments),
               $('#btn_add_skills').val("update");
               e.preventDefault();
        },
        error: function (data) {
            alert(JSON.stringify(data));
            console.log('Error:', data);
        }
    });
});

$("#btn_add_skills").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData =
        {
             skill_id: $('#skills').val(),
             years_of_exp: $('#year_of_experience ').val(),
             comments: $('#comments').val(),
        }
    // alert(JSON.stringify(formData));
    var state = $('#btn_add_skills').val();
    var employee_id = $('#emp_id').val();
    // alert(employee_id);
    var type = "POST"; //for creating new resource
    var emp_skill_id = $('#skill_id').val();
    //alert(emp_work_id);
    var my_url = '/administration/employee-work-skills';
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + emp_skill_id;
    }
    //alert(JSON.stringify(formData));
    $.ajax({
        cache:false,
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            $('#demo_skill').hide();
            var table =
                '<tr id="employee_skills_id' + data.id +'">' +
                '<td class="sorting_1"><a data-id=" '+ data.skill_id +' " href="#" style="text-decoration:none;" class="btn-detail edit_skill">' + data.name + '</a></td>'+
                '<td class="sorting_1">' + data.years_of_exp + '</td>'+
                '<td class="sorting_1">' + data.comments + '</td>'
            table += '<td><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
            if (state == "add"){ //if user added a new record
                alert("data has been inserted");
                $('#demo_skill').hide();
                $("tbody>tr>td.dataTables_empty").hide();
                $('#products-list-skill').append(table);
            }else{ //if user updated an existing record
                alert("data has been updated");
                $('#demo_skill').hide();
                $('#employee_skills_id' + emp_skill_id).replaceWith(table);
            }
            $('#frmProducts_skill').trigger("reset");
        },
        error: function (data) {
            (JSON.stringify(data));
            console.log(data);
            //alert('failed');
        }
    });
});
// ================================================================= Education ==============================

$('#demo_Education').hide();
$(document).on('click','#btnclose_education',function(e){
    $('#demo_Education').hide({
        duration: 500,
    });
    $('#frmProducts_education').trigger("reset");
});

$(document).on('click','#btn_education',function(e){
    $('#demo_Education').show({
        duration: 500,
    });
    $('#frmEducation').trigger("reset");
    $('#btn_save_education').val("add");

});

//Edit Education 
$(document).on('click','.education_edit',function(e){
    var education_id = $(this).attr('data-id');
   // alert(education_id);
    // Populate Data in Edit Modal Form
    //('administration/job/' . $jobs->id . '/edit')
    $.ajax({
        type: "GET",
        url: '/administration/employee-education'+'/' + education_id,
        success: function (data) {
            //alert(JSON.stringify(data));
            $('#demo_Education').show({
                duration: 500,
            });//you can list several class names
            $('#education_id').val(data.id),
            $('#level_id').val(data.name),
            $('#institute_id ').val(data.institute),
            $('#major').val(data.major),
            $('#year').val(data.year),
            $('#gpa_id').val(data.score),
            $('#start_date').val(data.start_date),
            $('#end_date').val(data.end_date),
            $('#btn_save_education').val("update");
            e.preventDefault();
        },
        error: function (data) {
            alert(JSON.stringify(data));
            console.log('Error:', data);
        }
    });
});
//
$("#btn_save_education").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData =
        {
            education_id: $('#level_id').val(),
            institute: $('#institute_id ').val(),
            major: $('#major').val(),
            year: $('#year').val(),
            score: $('#gpa_id').val(),
            start_date: $('#start_date').val(),
            end_date: $('#end_date').val(),
        }
    // alert(JSON.stringify(formData));
    var state = $('#btn_save_education').val();
    var employee_id = $('#emp_id').val();
    // alert(employee_id);
    var type = "POST"; //for creating new resource
    var education_id = $('#education_id').val();
    alert(education_id);
    // alert(emp_work_id);
    var my_url = '/administration/employee-education';
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + education_id;
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
            $('#demo_Education').hide();
            var table =
                '<tr id="education_id' + data.id +'">' +
                '<td class="sorting_1"><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal_skills">' + data.name + '</a></td>'+
                '<td class="sorting_1">' + data.year+ '</td>'+
                '<td class="sorting_1">' + data.score + '</td>'
            table += '<td><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
            if (state == "add"){ //if user added a new record
                alert("data has been inserted");
                $('#demo_Education').hide();
                $("tbody>tr>td.dataTables_empty").hide();
                $('#list-education').append(table);
                $('#frmEducation').trigger("reset");
            }else{ //if user updated an existing record
                alert("data has been updated");
                $('#demo_Education').hide();
                $("#education_id" + education_id).replaceWith(table);
            }
            $('#frmEducation').trigger("reset");
        },
        error: function (data) {
            (JSON.stringify(data));
            console.log(data);
            //alert('failed');
        }
    });
});
// ==========================LicenseType====================================
$('#demo_license').hide();
$(document).on('click','#btnclose_license',function(e){
    $('#demo_license').hide({
        duration: 500,
    });
    $('#frmProducts_license').trigger("reset");
});

$(document).on('click','#btn_license',function(e){
    $('#demo_license').show({
        duration: 500,
    });
    $('#frmProducts_license').trigger("reset");
    $('#btn_save_license').val("add");
});
$("#btn_save_license").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData =
        {
            licenseType_id : $('#license_type_id').val(),
            license_number: $('#license_number ').val(),
            issued_date: $('#issued_date').val(),
            expiry_date: $('#expiry_date').val(),
        }
    alert(JSON.stringify(formData));
    var state = $('#btn_save_license').val();
    var employee_id = $('#emp_id').val();
    // alert(employee_id);
    var type = "POST"; //for creating new resource
    var license_id = $('#product_id').val();
    // alert(emp_work_id);
    var my_url = '/administration/license';
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + license_id;
    }
    //alert(JSON.stringify(formData));
    $.ajax({
        cache:false,
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            alert(JSON.stringify(data));
            $('#demo_license').hide();
            var table =
                '<tr id="license_id' + data.id +'">' +
                '<td class="sorting_1"><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal_skills">' + data.name + '</a></td>'+
                '<td class="sorting_1">' + data.issued_date+ '</td>'+
                '<td class="sorting_1">' + data.expiry_date + '</td>'
            table += '<td><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
            if (state == "add"){ //if user added a new record
                alert("data has been inserted");
                $('#demo_license').hide();
                $("tbody>tr>td.dataTables_empty").hide();
                $('#list-license').append(table);
            }else{ //if user updated an existing record
                alert("data has been updated");
                $('#demo_license').hide();
                $("#license_id" + license_id).replaceWith(table);
            }
            $('#frmProducts_license').trigger("reset");
        },
        error: function (data) {
            (JSON.stringify(data));
            console.log(data);
            //alert('failed');
        }
    });
});
// ==========================================Language==========================================
$('#demo_Language').hide();
$(document).on('click','#btnclose_language',function(e){
    $('#demo_Language').hide({
        duration: 500,
    });
    $('#frmLanguage').trigger("reset");
});

$(document).on('click','#btn_language',function(e){
    $('#demo_Language').show({
        duration: 500,
    });
    // $('#frmLanguage').trigger("reset");
    $('#btn_save_language').val("add");
});
$("#btn_add_language").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData =
        {
            lang_id : $('#lang_id').val(),
            fluency_id: $('#fluency_id ').val(),
            competency_id : $('#competency_id').val(),
            comments : $('#comments_id').val()
        }
    // alert(JSON.stringify(formData));
    var state = $('#btn_save_license').val();
    var employee_id = $('#emp_id').val();
    // alert(employee_id);
    var type = "POST"; //for creating new resource
    var lang_id = $('#product_id').val();
    // alert(emp_work_id);
    var my_url = '/administration/employee-language';
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + lang_id;
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
            $('#demo_Language').hide();
            var table =
                '<tr id="language_id' + data.id +'">' +
                '<td class="sorting_1"><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal_skills">' + data.name + '</a></td>'+
                '<td class="sorting_1">' + data.fluency+ '</td>'+
                '<td class="sorting_1">' + data.competency + '</td>'+
                '<td class="sorting_1">' + data.comments + '</td>'
            table += '<td><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
            if (state == "add"){ //if user added a new record
                alert("data has been inserted");
                $('#demo_Language').hide();
                $("tbody>tr>td.dataTables_empty").hide();
                $('#list-language').append(table);
            }else{ //if user updated an existing record
                alert("data has been updated");
                $('#demo_Language').hide();
                $("#language_id" + lang_id).replaceWith(table);
            }
            $('#frmLanguage').trigger("reset");
        },
        error: function (data) {
            (JSON.stringify(data));
            console.log(data);
            //alert('failed');
        }
    });
});





