// alert('ok');
var date = new Date().format('Y-m-d h:i:s');  // 07-06-2016 06:38:34
// var month = d.getMonth()+1;
// var day = d.getDate();
//
// var current_date = d.getFullYear() + '-' +
//     ((''+month).length<2 ? '0' : '') + month + '-' +
//     ((''+day).length<2 ? '0' : '') + day;
// alert(current_date);
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
    var candidate_id = $(this).attr('data-id');
    alert(candidate_id);
    // Populate Data in Edit Modal Form
    //('administration/job/' . $jobs->id . '/edit')
    $.ajax({
        type: "GET",
        url: url + '/' + candidate_id,
        success: function (data) {
            alert(JSON.stringify(data));
            $('#product_id').val(data.id);
            $('#first_name').val(data.first_name),
            $('#last_name').val(data.last_name),
            $('#middle_name').val(data.middle_name),
            $('#email').val(data.email),
            $('#keywords').val(data.keywords),
            $('#comment').val(data.comment),
            $('#date-of-application').val(data.date_of_application);
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
        first_name : $('#first_name').val(),
        last_name: $('#last_name').val(),
        middle_name : $('#middle_name').val(),
        email : $( "#email" ).val(),
        keywords : $('#keywords').val(),
        comment : $('#comment').val(),
        date_of_application :date,
        // job_title :$('#job_title').val(),
    }
    alert(JSON.stringify(formData));
    var state = $('#btn-save').val();
    var type = "POST"; //for creating new resource
    var candidate_id = $('#product_id').val();
    var my_url = url;
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + candidate_id;
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
            var table =
                '<tr id="candidate_id'+ data.id +'">' +
                '<td class="sorting_1">' + data.first_name + '</td>'+
                '<td class="sorting_1">' + data.last_name + '</td>'+
                '<td class="sorting_1">' + data.date_of_application	+ '</td>';
            table += '<td><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal"> <i class="glyphicon glyphicon-edit"></i></a><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
            if (state == "add"){ //if user added a new record
                $('#products-list').append(table);
            }else{ //if user updated an existing record
                $("#candidate_id" + candidate_id).replaceWith(table);
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
        var candidate_id = $(this).attr('data-id');
//            alert(job_title_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            cache: false,
            url: url + '/' + candidate_id,
            dataType: "Json",
            success: function (data) {
                //alert(JSON.stringify(data));
                $("#candidate_id" + candidate_id).remove();
            },
            error: function (data) {
                alert(JSON.stringify(data));
            }
        });
    }
});

// DO NOT REMOVE : GLOBAL FUNCTIONS!
