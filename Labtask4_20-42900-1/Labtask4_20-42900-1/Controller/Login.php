<?php
$userErr = $passErr =$user = $pass =$message = '';  

if($_SERVER["REQUEST_METHOD"] == "POST"){  
if(empty($_POST["user"])){  
 $userErr = "User Name is required";  
}
else if(strlen($_POST["user"]) <2){
$userErr = "User Name must contain at least two characters";
}
else{
 $user = $_POST['user'];
 if(!preg_match("/^[a-zA-Z0-9_ .-]*$/",$user)){
 $userErr = "User Name must contain alpha numeric characters, period, dash or underscore only";
}
}
if(empty($_POST["pass"])){  
$passErr = "Password Required!";  
}  
else if(strlen($_POST['pass']) <8){
 $passErr = "Password can not be less than 8 characters";
}  
else{
    $data = file_get_contents("../Data/data.json");
    $data = json_decode($data, true);  
 session_start();
 if (isset($_POST['login'])){               
 foreach($data as $row){
 if($row["username"] == $_POST['user'] && $row["password"] == $_POST['pass']){
 $_SESSION['name'] = $row["name"];
 $_SESSION['email'] = $row["e-mail"];
 $_SESSION['user'] = $row["username"];
 $_SESSION['pass'] = $row["password"];
 $_SESSION['gender'] = $row["gender"];
 $_SESSION['dob'] = $row["dob"];
header("location: ../View/dashboard.php");
}
else{
 $message="Invalid Username or Password";
}
} 
}
}
} 
if(!empty($_POST["remember"])){
  setcookie ("username",$_POST["user"],time()+ (86400*30));
  setcookie ("password",$_POST["pass"],time()+ (86400*30));
  echo $_COOKIE['username'];
} 
else{
   setcookie("username","");
   setcookie("password","");
}
?>