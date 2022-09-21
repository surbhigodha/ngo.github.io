<?php
$username = filter_input(INPUT_POST,'uname');
$password = filter_input(INPUT_POST,'psw');
$mail = filter_input(INPUT_POST,'mail');


if(empty($username)){
  echo "username should not be empty";
  die();
}

if(empty($password)){
  echo "password should not be empty";
  die();
}

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Please Enter Proper Email";
  echo $emailErr;
  die();
}
if(!empty($username) && !empty($password) && !empty($mail)  ){
    $host ="localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "login" ;

    $conn = new mysqli($host , $dbusername , $dbpassword , $dbname);

    if(mysqli_connect_error()){
       die('Connect Error ('.mysqli_connect_errno().')' .mysqli_connect_errno() );
    }
    else{
      $sql = "INSERT INTO signup values ('$username', '$mail', '$password')";
      if ($conn->query($sql)){
        echo"New record is inserted successfully";
      }
      else{
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
    }
  }


?>