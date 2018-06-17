$(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    $('.order').click(function(){
        var rid = $(this).parent().parent().attr('id');
        $.ajax({
            url: '/admin/customerbill/'+ rid,
            type: 'GET',
            success: function () {
                $( "#editEmployeeModal" ).load("/admin/customerbill/"+rid + " " + ".content", function(){

                });
            }
        })
    })

});