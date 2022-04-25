$("#login").submit(function(e){
  
  let loginData = new FormData ($("#login").get(0));
  
  e.preventDefault();
  
    $.ajax({
      type : "post",
      contentType:false,
      dataType: false,
      processData:false,
      url: "sessionManager.php",
      data: loginData,
      success: function( result) {
        console.log(result);
        $("#login_status").html(result);

        if (result==1)
          window.location='index.html';
  
      }
  
    });
  
  });