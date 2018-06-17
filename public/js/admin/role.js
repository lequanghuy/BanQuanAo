$(document).ready(function () {
    $('.role').change(function () {

        var id = $(this).val();
        $('input[type=checkbox]').prop("checked", false);
        //console.log(id);
        $.ajax({
            url: '/getpermission/' + id,
            type: 'GET',
            success: function (res) {
                //console.log(res);
                for (var j = 0; j < res.length; j++) {
                    if (res[j]['title'] == $('.checkbox' + res[j]['id']).attr('name')) {
                        $('.checkbox'+ res[j]['id']).prop("checked", true);
                    }
                    if(res[j]['title'] != $('.checkbox' + res[j]['id']).attr('name')){
                        $('.checkbox'+ res[j]['id']).prop("checked", false);
                    }
                }
            }
        });
        $('.plus').css('display', 'block');
    });

    $('.save').click(function(){
       var roleid = $('.role').val();
        var arr = [];
        $('input[type=checkbox]').each(function () {
            if(this.checked){
                arr.push($(this).attr('id'));
            }
        });
        $.ajax({
            url: '/admin/updatepermissions/'+ roleid,
            type: 'GET',
            data: { data: arr },
            success: function(){
                $('.thongbao').append('<div class="alert alert-success" role="alert">Sửa thành công!!</div>');
                $('.alert').fadeIn().delay(3000).fadeOut(2000, function(){ $(this).remove();});
            }
        })

    });

    setTimeout(function(){
        $(".a1").fadeIn().delay(3000).fadeOut(2000, function(){ $(this).remove();});
    });
});