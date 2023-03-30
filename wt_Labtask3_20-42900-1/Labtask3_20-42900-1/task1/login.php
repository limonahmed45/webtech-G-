<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
</head>
<body>
	<?php
		$passwordErrMsg=$usernameErrMsg="";
		$Password=$Username ="";
		$loginStatus="";
		$count1=0;
			$errorcount=0;
			if ($_SERVER['REQUEST_METHOD'] === "POST"){
			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
        
			$Password = test_input($_POST['password']);
			$Username = test_input($_POST['username']);
            if(empty($Username)){
				$usernameErrMsg = "Username is Empty";
				$errorcount++;
			}
            else if (!preg_match("/^[a-zA-Z-' '-]*$/",$Username)) {
                $usernameErrMsg = "Only letters, white space and dash allowed";
              }	
			else if(empty($Password)){
				$passwordErrMsg = "Password is Empty";
				$errorcount++;
			}
            else if (!preg_match("^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$^",	$Password)) {
                $passwordErrMsg = "Need atleast 8 charecter and one speical symbol";
              }	
		
			}
			
	?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="POST" novalidate>
	
		<h1><b>Log in Info<b></h1>
		<label for="username">Username:</label>
		<input type="text" name="username" id="username">
		<span style="color: red">*
		<?php
			echo $usernameErrMsg;
		?>
		</span>
		<br><br>
		<label for="password"> Password :</label>
		<input type="password" name="password" id="password">
		<span style="color: red">*
		<?php
			echo $passwordErrMsg;
		?>
		</span>
	
	<br><br>
    
<input type="checkbox" name="checkbox" value="remember"/>Remember Me<br><br>
	<input type="Submit" value="Submit">
	<u style="color:blue">Forgot password?</u><br><br>
	<?php
    echo"Your Input:" ;
			echo $Username;
            echo "<br>";
			echo $Password;
?>
</form>
</body>
</html>