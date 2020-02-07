<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login-Project</title>
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form validate-form">
					<span class="login100-form-title p-b-34">
						Account Login
					</span>
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="user" class="input100" type="text" name="user" placeholder="User name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input id="pass" class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="submit">
							Sign in
						</button>
					</div>
				</div>
				<div class="login100-more" style="background-image: url('images/G3HdZ439.png');"></div>
			</div>
		</div>
    </div>
    
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
		//   console.log("ready!");
		login();
		});

		function login() {
			// Submit
			try {
				$("#submit").click(function() {
					let user_name = $("#user").val();
					let pass_word = $("#pass").val();
					
					var settings = {
						"async": true,
						"crossDomain": true,
						"url": "http://34.69.243.34:1880/mysql/api?user="+user+"&pass="+pass,
						"method": "GET",
						"headers": {
							"Content-Type": "application/x-www-form-urlencoded",
							"Accept": "*/*",
							"Cache-Control": "no-cache",
							"Postman-Token": "f24b1274-8b05-4608-9c4b-caf02edb3ac9,246b0efa-db29-48a4-8a9b-298b295af223",
							"cache-control": "no-cache"
						}
							// "data": '{"login":{"user":"'+user+'", "pass":"'+pass+'"}}'
					}
					console.log(user_name);
					//   console.log("ready!");
					$.ajax(settings).done(function (response) {
						// console.log(response);
						// let data = {
							// id : response[0].id,
							// user : response[0].user,
							// 	pass : response[0].pass,
							// 	}
							// 	console.log(data);
							if(response[0].user == user_name) {
								if(response[0].pass == pass_word){
									console.log(response[0].user);
									location.replace("./index.php?user="+response[0].user+"");
								}else{
									alert("ล๊อกอินไม่สำเร็จ")
								}
							}else{
								alert("ล๊อกอินไม่สำเร็จ")
							}
									// 	/*window.location.replace("./setsession.php?username="+val.login.username+"&pass=" + val.login.pass);
									// 	/*window.location.replace("../source/setsession.php?token="+val.user.token+"&email=" + val.user.email);*/
					});
  				});
		  	} catch (e) {
			console.log(e);
		  }
		}
	  </script>
</body>
</html>