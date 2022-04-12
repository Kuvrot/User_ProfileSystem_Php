

$.ajax({
    url: "getUsers.php",
    success: function( result) {
      console.log(result);
      $("#GetUsers").html(result);

    }

  });