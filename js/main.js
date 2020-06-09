$(function(){
	//User Login
	$("#login").click(function(){
    var username = $("#username").val();
    var password = $("#password").val();
    var dataString = 'username='+username+'&password='+password;
    $.ajax({
      type: "POST",
      url:"getlogin.php",
      data:dataString,
      success:function(data){
      	if ($.trim(data) == 'login') {
      		window.location="exam.php";
      	}else{
        	$("#state").html(data);
    	}
      }
    });
    return false;
  });

  //Admin Login
  $("#admin-login").click(function(){
    var email = $("#email").val();
    var password = $("#password").val();
    var dataString = 'email='+email+'&password='+password;
    $.ajax({
        type:'POST',
        url:"adminlogin.php",
        data:dataString,
        success:function(data){
          if ($.trim(data) == 'admin-login') {
            window.location="index.php";
          }else{
            $("#state").html(data);
          }
        }
    });
    return false;
  })
});
