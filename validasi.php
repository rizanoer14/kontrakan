<?php
  include 'database.php';

  $username=$_POST['username'];
  $password=$_POST['password'];
  $sql = "SELECT * FROM `login` WHERE username = '$username' AND password = '$password' "; 
  $result = mysqli_query($conn, $sql);
  $res=mysqli_fetch_array($result);
  if ($res) {
    echo json_encode(array("statusCode"=>200));
  } 
  else {
    echo json_encode(array("statusCode"=>201));
  }
  mysqli_close($conn);

?>