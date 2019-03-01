//alert('ok');
var date = new Date().format('Y-m-d h:i:s');  // 07-06-2016 06:38:34
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
    var job_id = $(this).attr('data-id');
    alert(job_id);
    $.ajax({
        type: "GET",
        url: url + '/' + job_id,
        success: function (data) {
            alert(JSON.stringify(data));
            $('#product_id').val(data.id);
            $('#name').val(data.name),
            $('#description').val(data.description),
            $('#hiring_manager_id').append('<option value="'+ data.hiring_manager_id +'">'+ data.hiring_manager_id +'</option>');
            $('#job_titles_code').append('<option value="'+ data.job_titles_code +'">'+ data.job_titles_code +'</option>');
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
        name : $('#name').val(),
        description: $('#description').val(),
        hiring_manager_id : $('#hiring_manager_id').val(),
        job_titles_code : $( "#job_titles_code" ).val(),
        city : $("#city").val(),
        job_type : $("[name=radio-inline]:checked").val(),
        CompanyName  : $("#CompanyName").val(),
        ContactName  : $("#ContactName").val(),
        email : $('#email').val(),
        defined_time : date,
        updated_time : date,
    }
    alert(JSON.stringify(formData));
    var state = $('#btn-save').val();
    var type = "POST"; //for creating new resource
    var job_id = $('#product_id').val();
    var my_url = url;
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + job_id;
    }
    alert(JSON.stringify(formData));
    $.ajax({
        cache:false,
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            //alert(JSON.stringify(data));
            var table =
                '<tr id="vacancy_id'+data.id +'">' +
                '<td class="sorting_1">' + data.name + '</td>'+
                '<td class="sorting_1">' + data.job_titles + '</td>'+
                '<td class="sorting_1">' + data.hiring_manager_id + '</td>'+
                '<td class="sorting_1">' + data.description	+ '</td>'+
                '<td class="sorting_1">' + data.description	+ '</td>';
            table += '<td><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal"> <i class="glyphicon glyphicon-edit"></i></a><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
            if (state == "add"){ //if user added a new record
                $('#products-list').append(table);
            }else{ //if user updated an existing record
                $("#vacancy_id" + job_id).replaceWith(table);
            }
            $('#frmProducts').trigger("reset");
            $('#myModal').modal('hide')
        },
        error: function (data) {
            (JSON.stringify(data));
            // console.log(data);
            //alert('failed');
        }
    });
});
//delete product and remove it from TABLE list ***************************
$(document).on('click','.delete-item',function(){
    var confirmation = confirm("are you sure you want to remove the item?");
    if(confirmation) {
        var job_id = $(this).attr('data-id');
//            alert(job_titles_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            cache: false,
            url: url + '/' + job_id,
            dataType: "Json",
            success: function (data) {
                //alert(JSON.stringify(data));
                $("#vacancy_id" + job_id).remove();
            },
            error: function (data) {
                alert(JSON.stringify(data));
            }
        });
    }
});
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
$(document).ready(function() {

    CKEDITOR.replace( 'ckeditor', { height: '380px', startupFocus : true} );

})
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
