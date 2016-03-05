<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>iRecord</title>
    
    
    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="css/style.css">
<script>
  $(document).ready(function(){
    $('#submit').click(function(){
      $.ajax({
                    type: 'GET',
                    url: 'loggingin.php',
                    dataType: 'html',
                    data: $('#frmLogin').serialize(),
                    success: function(data){
                        var result = $.trim(data);
                        if(result == 1){
                            alert('Login Successful!');
                            
                            location.href ="index.php";
                        }
                        else{
                            alert('Wrong Input!');
                            location.href ="login.php";
                        }
                    }
      });
    });
  });
</script>    
  </head>

  <body>

    
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  
</div>
<!-- Form Module-->
<form action="" id="frmLogin">
<div class="login">
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    
  </div>
  <div class="form">
    <h2>Login to your account</h2>
      <input type="text" placeholder="Username" name="txtUsername" id="txtUsername" />
      <input type="password" placeholder="Password" name="txtPassword" />
      <button>Login</button>
    </form>
  </div>
  
  
</div>
</div>
</form>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
