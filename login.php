<?php 

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style/designLogin.css">
  <title>Random Login Form</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
                    <div>
                            <span>Site Random</span>
                    </div>
		</div>
		<br>
                <div id="error" ></div>
		<div class="login">
                    
                    <form method="POST" action="API.php">
                                
				<input type="text" placeholder="username" name="user" id="user"><br>
				<input type="password" placeholder="password" name="password"><br>
				<!--<input type="button" name="command" value="Login">-->
                                <button name="command" value="Login" >Login</button>
                                <button name="command" value="Logout" >goBack</button>
                                </form>
		</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

</body>

</html>
