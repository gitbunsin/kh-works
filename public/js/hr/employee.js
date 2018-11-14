
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
