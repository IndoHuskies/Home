<?php

require_once "../models/config.php";
  /* 
    Below is a very simple example of how to process a new user.
     Some simple validation (ideally more is needed).
    
    The first goal is to check for empty / null data, to reduce workload here we let the user class perform it's own internal checks, just in case they are missed.
  */

//Forms posted
if(!empty($_POST))
{

  echo "Form posted!";

    $errors = array();
    $name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $confirm_pass = trim($_POST["passwordc"]);

    //TO BE EDITED FOR FORM VALIDATION
    $user = new User($username,$password,$email,$name);
    $user->userPieAddUser();
  }
?>
<!DOCTYPE HTML>
<html>
	<head>
			<link rel="stylesheet" type="text/css" href="test.css">
      <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div id="registration">
        <div class="row">
          <H2><span class="glyphicon glyphicon-pencil"></span> Create ISAUW Account</H2>
          <hr>
            <form method="POST" action="" role="form">
              <div class="form-group">
                <label for="inputName">Full Name</label>
                  <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                    <input type="text" class="form-control" name="full_name" id="inputFullName" placeholder="enter your full name..." required>
                  </div>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <div id="userResponse" class="input-group">
                  <span class="input-group-addon glyphicon glyphicon-user"></span>
                  <input type="text" class="form-control" name="username" id="username" placeholder="choose a username..." required>
                </div>
                <div id='username_availability_result'></div> 
              </div>
              <div class="form-group">
                <label for="inputEmail">Email</label>
                <div id="emailResponse"class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="enter your email..." required>
                  </div>
                  <div id='email_match_result'></div> 
              </div>
              <div class="form-group">
                <label for="inputPassword">Password</label>
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="choose a password..." required>
                  </div>
              </div>
              <div class="form-group">
                <label for="inputPasswordVerify">Verify Password</label>
                <div id="passResponse" class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
                    <input type="password" class="form-control" name="passwordc" id="inputPasswordVerify" placeholder="please verify password..." required>
                  </div>
                  <div id='password_match_result'></div> 
              </div>
              <div id="check-form" style="display: none;">
                <input class="abc" type="checkbox" name="form-input" id="check-username" value="username">
                <input class="abc" type="checkbox" name="form-input" id="check-password" value="password">
                <input class="abc" type="checkbox" name="form-input" id="check-email" value="email">
                <input class="abc" type="checkbox" name="form-input" id="check-name" value="name" checked>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" id="reg-btn" class="btn btn-info" value="SIGN UP!">
                </div>
              </div>
            </form>
        </div>
      </div>
		</div>
	</body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <script type="text/javascript">  
      $(document).ready(function() {

      });

        function validate() {
          var password1 = $("#inputPassword").val();
          var password2 = $("#inputPasswordVerify").val();
            
            if(password1 == password2) {
              $("#passResponse").removeClass("has-error"); 
              $("#passResponse").addClass("has-success");

              $('#password_match_result').html('Password match!');
              $('#check-password').prop('checked', true);       
            }
            else {
              $("#passResponse").removeClass("has-success"); 
              $("#passResponse").addClass("has-error");

              $('#password_match_result').html('Password does NOT match!');
              $('#check-password').prop('checked', false); 
            }
        }
      </script>
</html>