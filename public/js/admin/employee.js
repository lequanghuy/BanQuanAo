$(document).ready(function(){
   $('.edit').click(function(){
       var rid = $(this).parent().parent().attr('id');
       console.log(rid);
       $.ajax({
           url: '/admin/edit/'+ rid,
           type: 'GET',
           success: function () {
               $( "#editEmployeeModal" ).load("/admin/edit/"+rid + " " + ".content", function(){

               });
           }
       })
   });

    setTimeout(function(){
        $(".alert").fadeIn().delay(5000).fadeOut('slow');
    });
});