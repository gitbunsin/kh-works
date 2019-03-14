$('#name').prop('disabled', true);
$('#email').prop('disabled', true);
$('#postal_address').prop('disabled', true);
$('#city').prop('disabled', true);
$('#zip_code').prop('disabled', true);
$('#street1').prop('disabled', true);
$('#country').prop('disabled', true);
$('#province').prop('disabled', true);
$('#tax_id').prop('disabled', true);
$('#website').prop('disabled', true);
$('#registration_number').prop('disabled', true);
$('#note').prop('disabled', true);
$('#company_profile').prop('disabled', true);
$('#phone').prop('disabled', true);
$('#fax').prop('disabled', true);
$('#mobile').prop('disabled', true);
$('#company_logo').prop('disabled',true);

$(document).ready(function () {

    var edit = $('#btn_company').val('Edit');
    // alert(emp_number);
    $('#btn_company').click(function(e){
        $isEdit = $('#btn_company').val();
        // alert($isEdit);
        if($isEdit =="Edit"){
            $('#name').prop('disabled', false);
            $('#email').prop('disabled', false);
            $('#postal_address').prop('disabled', false);
            $('#city').prop('disabled', false);
            $('#zip_code').prop('disabled', false);
            $('#street1').prop('disabled', false);
            $('#country').prop('disabled', false);
            $('#province').prop('disabled', false);
            $('#tax_id').prop('disabled', false);
            $('#website').prop('disabled', false);
            $('#registration_number').prop('disabled', false);
            $('#note').prop('disabled', false);
            $('#company_profile').prop('disabled', false);
            $('#phone').prop('disabled', false);
            $('#fax').prop('disabled', false);
            $('#mobile').prop('disabled', false);
            $('#company_logo').prop('disabled',false);
            var Save = $('#btn_company').val('Save');
        }else{
            $isSave = $('#btn_company').val();
            var company_id = $('#company_id').val();
            if($isSave == "Save") {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                $('#frmCompany').submit();

                // var formData = {
                //     name: $('#name').val(),
                //     email: $('#email').val(),
                //     postal_address: $('#postal_address').val(),
                //     city: $('#city').val(),
                //     zip_code:$('#zip_code').val(),
                //     street1: $('#street1').val(),
                //     country: $('#country').val(),
                //     province:$('#province').val(),
                //     tax_id   :$('#tax_id').val(),
                //     website: $('#website').val(),
                //     register_number:$('#registration_number').val(),
                //     note: $('#note').val(),
                //     company_profile:$('#company_profile').val(),
                //     phone:$('#phone').val(),
                //     fax: $('#fax').val(),
                //     mobile:$('#mobile').val(),
                //     company_log:$('#company_logo').val()
                // }
                // $.ajax({
                //     cache:false,
                //     type: "PUT",
                //     url: '/administration/companyProfile/' + company_id,
                //     data: formData,
                //     dataType: 'json',
                //     success: function (data) {
                //         $('#name').prop('disabled', true);
                //         $('#email').prop('disabled', true);
                //         $('#postal_address').prop('disabled', true);
                //         $('#city').prop('disabled', true);
                //         $('#zip_code').prop('disabled', true);
                //         $('#street1').prop('disabled', true);
                //         $('#country').prop('disabled', true);
                //         $('#province').prop('disabled', true);
                //         $('#tax_id').prop('disabled', true);
                //         $('#website').prop('disabled', true);
                //         $('#registration_number').prop('disabled', true);
                //         $('#note').prop('disabled', true);
                //         $('#company_profile').prop('disabled', true);
                //         $('#phone').prop('disabled', true);
                //         $('#fax').prop('disabled', true);
                //         $('#mobile').prop('disabled', true);
                //         $('#company_logo').prop('disabled',true);
                //         alert('data has been insert !');
                //         var Save = $('#btn_company').val('Edit');
                //     },
                //     error: function (data) {
                //         (JSON.stringify(data));
                //         console.log(data);
                //     }
                // });
            }else {
                alert('not found');
            }
        }

    });
});
