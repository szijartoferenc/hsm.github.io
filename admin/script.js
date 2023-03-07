
$(document).ready(function(){
            
    show();
function show() {
    
    $.ajax ({
        url:"ajax_job_request.php",
        method:"POST",
        success:function(data) {
         $("#show").html(data);
        }
    });
}

$(document).on('click', '.approve', function(){

 let id = $(this).attr("id");

 alert(id);

    $.ajax ({
        url:"ajax_job_approve.php",
        method:"POST",
        data:{id:id},
        success:function(data) {
         show();
        }
    });
});

$(document).on('click', '.reject', function(){

    let id = $(this).attr("id");
   
    alert(id);
   
       $.ajax ({
           url:"ajax_job_reject.php",
           method:"POST",
           data:{id:id},
           success:function(data) {
            show();
           }
       });
   });
});
