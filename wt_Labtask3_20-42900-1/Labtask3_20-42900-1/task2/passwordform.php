<!DOCTYPE HTML>  
<html>
<head>
<style>
</style>
</head>
<body>
    





















<h2>CHANGE PASSWORD</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<h3>Current Password:<input type="password" name="pass1" value=""><br>
<h3 style="color:green">New Password:  <input type="password" name="pass2" value=""><br>
<h3 style="color:red">Retype New Password: <input type="password" name="pass3" value="">
<br><br><input type="submit" name="submit" value="Submit">  <br><br>

</form>




<?php
$currpass="abc@1234";
$newpass=$retypepass="";

if(isset($_POST['submit'])){
   
    $newpass=$_POST["pass2"];
    $retypepass=$_POST["pass3"];




if($currpass==$newpass){
    echo" Current password and new password cant be same ";
}
else if($newpass!=$retypepass){
    echo" New password should match with the re type password";

}
else if($currpass!=$newpass&&$newpass==$retypepass){
    echo ".....PASSWORD CHANGED....";
}
}




function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;}


?>




</body>
</html>
