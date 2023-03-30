<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
body{ background-image: url('image2.jpg');color:white;}
h1{text-align:center;color:bisque;  }
</style>
</head>
<body >  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $dobErr=$genderErr = $degreeErr =$bgErr= "";
$name = $email =$dob= $gender = $degree = $bg =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' '-]*$/",$name)) {
      $nameErr = "Only letters, white space and dash allowed";
    }
  }}
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  } 
     if(isset($_POST['submit'])){
    $a=$_POST['month'];}
    if(isset($_POST['submit'])){
      $b=$_POST['year'];}
      if(isset($_POST['submit'])){
        $c=$_POST['day'];
        $dob="$c-$a-$b"; }
     

    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = $_POST["gender"];
    }

  if(isset($_POST['submit'])){
    $degree=$_POST["checkbox"];}
    
  






    if (isset($_POST["submit"])) {
      $bg = $_POST["bloodgroup"];}
    

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

?>

<h1><marquee>Log in Page</marquee></h1>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name:<br> <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail:<br> <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Date of Birth:<br>
  <select name = "day">
        <option>Day</option>
        <?php
	        for($day = 1; $day <= 31; $day++){
		       echo "<option value = '".$day."'>".$day."</option>";
		}
	?>
</select>
<select name = "month">
	<option>Month</option>
	<?php
		for($month = 1; $month <= 12; $month++)
		echo"<option value = '".$month."'>".$month."</option>";
	?>
</select>
<select name = "year">
	<option>Year</option>
	<?php
		$y = date("Y", strtotime("+8 HOURS"));
		for($y = 1953; $y <= 1998; $y++){
			echo "<option value = '".$y."'>".$y."</option>";
		}
	?>
</select>

<br>

  <h3>Gender:</h3>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <span class="error">* <?php echo $genderErr;?></span>
  <br>
  <h3>Degree:</h3>
  <input type="checkbox" name="checkbox" value="SSC" />SSC

<input type="checkbox" name="checkbox" value="HSC"/>HSC
<input type="checkbox"  name="checkbox" value="Bsc"/>BSC
<input type="checkbox"  name="checkbox" value="Msc"/>MSC

<h3>Blood Group:</h3>
<select name="bloodgroup">
    <option>A+</option>
    <option>A-</option>
    <option>B+</option>
    <option>B-</option>
    <option>AB+</option>
    <option>AB-</option>
    <option>O+</option>
    <option>O-</option>

    <option>Unknown</option>
    
</select><br><br>
  <input type="submit" name="submit" value="Submit"src="image1.jpg">  
</form>

<?php


echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo "<br>";
echo $bg;
echo "<br>";

?>


</body>
</html>