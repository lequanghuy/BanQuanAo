
    $(document).ready(function(){
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        // Select/Deselect checkboxes
        var arrid = [];

        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function(){
            var select = $(".select");

            if(this.checked){

                for(var i = 0; i < select.length; i++ ){
                    arrid.push(select[i].name);
                }

                checkbox.each(function(){
                    this.checked = true;
                });
            } else{
                arrid = [];
                checkbox.each(function(){
                    this.checked = false;
                });
            }

            //console.log(result);
            $('.xoahet').click(function(){
                var result = [];
                $.each(arrid, function(i, e) {
                    if ($.inArray(e, result) == -1) result.push(e);
                });
                $.ajax({
                    url: '/deleteselect',
                    type: 'GET',
                    data: { data: result },
                    success: function(){
                        window.location = '/admin/product';
                    }
                })
            });
        });
        checkbox.click(function(){
            var rid = $(this).parent().parent().parent().attr('id');
            if(!this.checked){
                $("#selectAll").prop("checked", false);
                var index = arrid.indexOf(rid);
                if(index > -1 ){
                    arrid.splice(index, 1);
                }

            }else {
                arrid.push(rid);
            }
            $('.xoahet').click(function(){
                var result = [];
                $.each(arrid, function(i, e) {
                    if ($.inArray(e, result) == -1) result.push(e);
                });
                $.ajax({
                    url: '/deleteselect',
                    type: 'GET',
                    data: { data: result },
                    success: function(){
                        window.location = '/admin/product';
                    }
                })
            });
        });


        $('.sl1').change(function()
        {
           var id = $(this).val();
           var theloai = $('.sl2').val();
                $.ajax({
                    url: '/getdetail/'+id +'/'+theloai,
                    type: 'GET',
                    success: function (res) {
                        if (res) {
                            $(".sl3").empty();
                            $(".sl3").append('<option>Chọn...</option>');
                            $.each(res, function (key, value) {
                                $(".sl3").append('<option value="' + value.code + '">' + value.description + '</option>');
                            });
                        } else{
                            $(".sl3").empty();
                        }
                    }
                });
        });

        $('.sl2').change(function()
        {
            var theloai = $(this).val();
            var id = $('.sl1').val();
                $.ajax({
                    url: '/getdetail/'+id +'/'+theloai,
                    type: 'GET',
                    success: function (res) {
                        if (res) {
                            $(".sl3").empty();
                            $(".sl3").append('<option>Chọn...</option>');
                            $.each(res, function (key, value) {
                                $(".sl3").append('<option value="' + value.code + '">' + value.description + '</option>');
                            });
                        } else {
                            $(".sl3").empty();
                        }
                    }
                });

        });

        $('.edit').click(function(){
            var rid = $(this).parent().parent().attr('id');
            $.ajax({
                url: '/edit/'+rid,
                type: 'GET',
                data:{},
                success: function(){

                    $( "#editEmployeeModal" ).load("/edit/"+rid + " " + ".content", function(){


                        $(".sl6").append('<option value="'+ $(".sl6").attr('id') +'">'+ $(".sl6").text() +'</option>');
                        $('.sl4').change(function()
                        {
                            var id = $(this).val();
                            var theloai = $('.sl5').val();
                            $.ajax({
                                url: '/getdetail/'+id +'/'+theloai,
                                type: 'GET',
                                success: function (res) {
                                    if (res) {
                                        $(".sl6").empty();
                                        $(".sl6").append('<option>Chọn...</option>');
                                        $.each(res, function (key, value) {
                                            $(".sl6").append('<option value="' + value.code + '">' + value.description + '</option>');
                                        });
                                    } else{
                                        $(".sl6").empty();
                                    }
                                }
                            });
                        });

                        $('.sl5').change(function()
                        {
                            var theloai = $(this).val();
                            var id = $('.sl4').val();
                            $.ajax({
                                url: '/getdetail/'+id +'/'+theloai,
                                type: 'GET',
                                success: function (res) {
                                    if (res) {
                                        $(".sl6").empty();
                                        $(".sl6").append('<option>Chọn...</option>');
                                        $.each(res, function (key, value) {
                                            $(".sl6").append('<option value="' + value.code + '">' + value.description + '</option>');
                                        });
                                    } else {
                                        $(".sl6").empty();
                                    }
                                }
                            });

                        });
                        $(function() {
                            bs_input_file();
                        });


                    });

                }
            })
        });

    });

    function bs_input_file() {
        $(".input-file").before(
            function() {
                if ( ! $(this).prev().hasClass('input-ghost') ) {
                    var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                    element.attr("name",$(this).attr("name"));
                    element.change(function(){
                        element.next(element).find('input').val(/img/+(element.val()).split('\\').pop());
                    });
                    $(this).find("button.btn-choose").click(function(){
                        element.click();
                    });
                    $(this).find('input').css("cursor","pointer");
                    $(this).find('input').mousedown(function() {
                        $(this).parents('.input-file').prev().click();
                        return false;
                    });
                    return element;
                }
            }
        );
    }
    $(function() {
        bs_input_file();
    });

    setTimeout(function(){
        $(".alert").fadeIn().delay(5000).fadeOut('slow');
    });

