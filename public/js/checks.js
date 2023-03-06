$("#name").mouseout(function(){
    var username = $("#name").val();
    $.ajax({
        type: "GET",
        url: "/exists/username/"+username,
        dataType: "json",   //expect html to be returned
        success: function(data){
            if (data==true){
                $("#name").addClass("border-danger")
            }
            else{
                $("#name").removeClass("border-danger")
            }
       },
   });
})


$("#email").mouseout(function(){
    var email=$("#email").val();
    $.ajax({
        type: "GET",
        url: "/exists/email/"+email,
        dataType: "json",   //expect html to be returned
        success: function(data){
            if (data==true){
                $("#email").addClass("border-danger")
            }
            else{
                $("#email").removeClass("border-danger")
            }
       },
   });
})

$("#sensor").mouseout(function(){
    var sensor=$("#sensor").val();
    $.ajax({
        type: "GET",
        url: "/exists/sensor/"+sensor,
        dataType: "json",   //expect html to be returned
        success: function(data){
            console.log(data)
            if (data==true){
                $("#sensor").addClass("border-danger")
            }
            else{
                $("#sensor").removeClass("border-danger")
            }
       },
   });
})
