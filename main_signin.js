$("#signin").submit(function(e){

let signindata = new FormData ($("#signin").get(0));

e.preventDefault();

$.ajax({

type: "post",
contentType:false,
dataType:false,
processData:false,
url: "sessionManager.php",
data:signindata,

success: function (result){

    console.log("succesfull connection");
    $("#signin_warning").html(result);

}




});


});