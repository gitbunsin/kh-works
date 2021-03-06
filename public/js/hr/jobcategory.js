
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
    var category_id = $(this).attr('data-id');
    //alert(Job_id);
    // Populate Data in Edit Modal Form
    //('administration/job/' . $jobs->id . '/edit')
    $.ajax({
        type: "GET",
        url: url + '/' + category_id,
        success: function (data) {
            $('#product_id').val(data.id);
            $('#name').val(data.name);
            $('#description').val(data.description);
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
        name : $('#name').val(),
        description: $('#description').val(),
    }
    // alert(JSON.stringify(formData));
    var state = $('#btn-save').val();
    var type = "POST"; //for creating new resource
    var category_id = $('#product_id').val();
    var my_url = url;
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + category_id;
    }
    //alert(JSON.stringify(formData));
    $.ajax({
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        cache:false,
        success: function (data) {
            alert(JSON.stringify(data));
            var table =
                '<tr id="category_id'+data.id+'">' +
                '<td class="sorting_1">' + data.name + '</td>'+
                '<td class="sorting_1">' + data.description + '</td>';
            table += '<td><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal"> <i class="glyphicon glyphicon-edit"></i></a><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
            if (state == "add"){ //if user added a new record
                $('#products-list').append(table);
            }else{ //if user updated an existing record
                $("#category_id" + category_id).replaceWith(table);
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
            url: url + '/' + id,
            dataType: "Json",
            cache: false,
            success: function (data) {
                //alert(JSON.stringify(data));
                $("#category_id" + id).remove();
            },
            error: function (data) {
                alert(JSON.stringify(data));
            }
        });
    }
});

// DO NOT REMOVE : GLOBAL FUNCTIONS!
