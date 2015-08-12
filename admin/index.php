<!DOCTYPE HTML>
<html>
	<head>
			<link rel="stylesheet" type="text/css" href="test.css">
	</head>
	<body>
		<div class="container">
			<form id="signup">
				<div class="header">
            		<img src="../img/logo_isauw_15.png" class="img-responsive">
            	</div>
        		<div class="sep"></div>
				    <div class="inputs">
        			<input type="text" id="name" name="username" placeholder="Username">
        			<input type="password" id="word" name="password" placeholder="Password">
            		<button id="submit" style="border-style:none;">LOG IN</button>
        		</div>
    		</form>
		</div>
	</body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        //Use AJAX to test login
            //If TRUE send to main.php
            //else append ERROR to .sep

        $(document).ready(function(){
             $('#signup').submit(function(e){  
                var formData = {
                  'username' : $('#name').val(),
                  'password' : $('#word').val(),
                  'active'  : $('#checky').val()
                }
                e.preventDefault();
                  $.ajax({
                    type: 'POST',
                    url: 'log-in-process.php',
                    data: formData,
                    dataType: 'json',
                    success: function(data){    
                        if(data.length == 0)    {
                            //$("#add_err").html("right username or password");
                            window.location='dashboard.php';
                        } else {
                            $(".sep").css('display', 'inline', 'important');
                            $(".sep").html("<img src='images/alert.png' />Wrong username or password");
                        }
                    },

                   beforeSend:function()
                   {
                        $(".sep").css('display', 'inline', 'important');
                        $(".sep").html("<img src='ajax-loader.gif' class='img-responsive' style='width: 10%;'> Loading...")
                   }
                  });
            });
        });
    </script>
</html>