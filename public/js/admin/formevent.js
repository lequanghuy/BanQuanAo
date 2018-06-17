$(document).ready(function(){
        $(".start").datepicker({ dateFormat: 'yy-mm-dd' });
        $(".end").datepicker({ dateFormat: 'yy-mm-dd' });

        $('.ec').change(function(){
            if($(this).val() == 1){
                $('.phantram').prop('disabled', true);
            }
            else{
                $('.phantram').prop('disabled', false);
            }
        });


    $('.sl1').change(function()
    {
        if($(this).val() == 2 ){
            $('.sl3').prop('disabled', true);
        }
        else{
            $('.sl3').prop('disabled', false);
        }
        var key = $(this).val();
        $.ajax({
            url: '/eventproduct/'+ key,
            type: 'GET',
            success: function (res) {
                if (res) {
                    $(".sl2").empty();
                    $(".sl2").append('<option>Chọn...</option>');
                    $.each(res, function (key, value) {
                        $(".sl2").append('<option value="' + value.code + '">' + value.description + '</option>');
                    });
                } else{
                    $(".sl2").empty();
                }
            }
        });
    });



})

