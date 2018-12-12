// alert('ok');
var url = "/administration/pay-grade";
//display modal form for creating new product *********************
$('#btn_add').click(function(){
    // alert('ok');
    $('#btn-save').val("add");
    $('#frmProducts').trigger("reset");
    $('#myModal').modal('show');
    $(".modal-backdrop.in").hide();
});

//alert(url);
$(document).on('click','.open_modal',function(){
    //alert('ok');
    var currency_id = $(this).attr('data-id');
     //alert(currency_id);
    // Populate Data in Edit Modal Form
    //('administration/job/' . $jobs->id . '/edit')
    $.ajax({
        type: "GET",
        url: '/administration/pay-grade/' + currency_id,
        success: function (data) {
             //alert(JSON.stringify(data));
            var item = $('#currency_id');
            item.empty();

            $.each(data.all_currency, function(key, value) {
                var isSelected = false;
                if(value.currency_id == currency_id) {
                    isSelected = true;
                }
                item.append("<option value='"+ value.currency_id +"' selected = '"+isSelected+"'>" + value.currency_name + "</option>");
            });
            var result = data.selected_currency;
            $('#product_id').val(result.id);
            $('#min_salary').val(result.min_salary);
            $('#max_salary').val(result.max_salary);
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
    // var name = $('#name').val();
    // var splice = name.substring(0,30);
    var formData = {
        pay_grade_id : $('#pay_grade_id').val(),
        currency_id : $('#currency_id').val(),
        min_salary : $('#min_salary').val(),
        max_salary : $('#max_salary').val(),
    }
    // alert(JSON.stringify(formData));
    var state = $('#btn-save').val();
    var type = "POST"; //for creating new resource
    var currency_id = $('#currency_id').val();
    alert(currency_id);
    var my_url ="/administration/add-currency-pay";
   // alert(my_url);
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url = "/administration/pay-grade"
        my_url += '/' + currency_id;
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
            $("tbody>tr>td.dataTables_empty").hide();
            var table =
                '<tr id="currency_id'+data.id+'">' +
                '<td class="sorting_1">' + data.currency_name + '</td>'+
                '<td class="sorting_1">' + data.min_salary+ '</td>'+
                '<td class="sorting_1">' + data.max_salary + '</td>';
            table += '<td><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail open_modal"> <i class="glyphicon glyphicon-edit"></i></a><a data-id=" '+ data.id +' " href="#" style="text-decoration:none;" class="btn-detail delete-item"> <i class="glyphicon glyphicon-trash" style="color:red;"></i></a></td></tr>';
            if (state == "add"){ //if user added a new record
                $('#products-list').append(table);
            }else{ //if user updated an existing record
                $("#currency_id" + currency_id).replaceWith(table);
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
                var concatId = 'currency_id'+id;
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
