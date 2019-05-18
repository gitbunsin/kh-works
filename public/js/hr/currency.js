
var url = "/administration/pay-grade";


/**
 * Show Pop Assign Currency
 */

$('#btn_add').click(function(){
    $('#btn-save').val("add");
    $('#frmProducts').trigger("reset");
    $('#myModal').modal('show');
    $(".modal-backdrop.in").hide();
});

$(document).on('click','.open_modal',function(){
    var currency_id = $(this).attr('data-id');
    $.ajax({
        type: "GET",
        url: '/administration/pay-grade/' + currency_id,
        success: function (data) {
            console.log(data);
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




/***
 * Add Currency to PayGrade 
 */

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
