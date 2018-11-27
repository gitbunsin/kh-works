
var url = $('#url').val();
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
    var Job_id = $(this).attr('data-id');
    //alert(Job_id);
    // Populate Data in Edit Modal Form
    //('administration/job/' . $jobs->id . '/edit')
    $.ajax({
        type: "GET",
        url: url + '/' + Job_id,
        success: function (data) {
            $('#product_id').val(data.id);
            $('#job_title').val(data.job_title);
            $('#description').val(data.job_description);
            $('#note').val(data.note);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
            $(".modal-backdrop.in").hide();
        },
        error: function (data) {
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
        job_title : $('#job_title').val(),
        job_description: $('#description').val(),
        note : $('#note').val() ,
    }
    // alert(JSON.stringify(formData));
    var state = $('#btn-save').val();
    var type = "POST"; //for creating new resource
    var job_id = $('#product_id').val();
    var my_url = url;
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + job_id;
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
            $("tbody>tr>td.dataTables_empty").hide();
            var table =
                '<tr id="job_id'+data.id+'">' +
                '<td class="sorting_1">' + data.job_title + '</td>'+
                '<td class="sorting_1">' + data.job_description + '</td>'+
                '<td class="sorting_1">' + data.note + '</td>';
            table += '<td><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal"> <i class="glyphicon glyphicon-edit"></i></a><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
            if (state == "add"){ //if user added a new record
                $('#products-list').append(table);
            }else{ //if user updated an existing record
                $("#job_id" + job_id).replaceWith(table);
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
        var id = $(this).attr('data-id');
          alert(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            cache: false,
            url: url + '/' + id,
            dataType: "Json",
            success: function (data) {
                var concatId = 'job_id'+id;
                concatId = concatId.replace(/\s/g, '');
                document.getElementById(concatId).remove();
                $("tbody>tr>td.dataTables_empty").show();
            },
            error: function (data) {
                alert(JSON.stringify(data));
            }
        });
    }
});

// DO NOT REMOVE : GLOBAL FUNCTIONS!
