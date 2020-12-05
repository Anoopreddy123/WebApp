<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="Log.css">
    <meta charset="utf-8">
    <title>
        Login
  </title>
  </head>
  <body>
    <div id="s1">
  <h1>Please Login Here</h1>
  </div>

     <div  id="s2">
       <p> Enter your details below </p>
     </div>
      <form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="Forms">
        <label for="Name">UserName : </label>
        <input type="text" name="Name" placeholder="Enter here"><br><br>
        <label for="Pass" >Password : </label>
        <input type="password" name="Pass"placeholder="enter here"><br>
        </div>
        <input id = "p1" type="Submit"/>

        <p id = "p1"> <a href="Create.php">Create Account</a> </p>
      </form>
      <?php

      $host = "localhost";
      $username = "root";
      $password = "";
      $db = "demo";
      $conn = mysqli_connect($host,$username,$password,$db);
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
 if($_SERVER["REQUEST_METHOD"] == "POST") {
   // collect value of input field
   $name = ($_REQUEST['Name']);
   if (empty($name)) {
       echo "Name is empty";
   } else {
     $sql = ("Select pass from student where Name = '$name'");
     $result = mysqli_query($conn,$sql);

     if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
       if($_REQUEST['Pass']==$row['pass']){
         header("location: web.php");

       }else{
         echo "Invalid Login";
       }
 }
} else {
  echo "Try again";
}





}
}





?>

</body>
</html>
