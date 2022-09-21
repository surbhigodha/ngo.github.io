<?php
$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email');
$subject = filter_input(INPUT_POST,'subject');
$message = filter_input(INPUT_POST,'message');

if(empty($name)){
  die('Please enter name');
}

if(empty($email)){
  die('Please enter email');
}

if(empty($subject)){
  die('Please enter subject');
}
if(empty($message)){
  die('Please enter message');
}

    $host ="localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "login" ;

    $conn = new mysqli($host , $dbusername , $dbpassword , $dbname);

      if(mysqli_connect_error()){
        die('Connect Error ('.mysqli_connect_errno().')' .mysqli_connect_errno() );
      }
      else{
        $sql = "INSERT INTO contact values ('$name', '$email','$subject','$message')";
        if ($conn->query($sql)){
          echo"New record is inserted successfully";
        }
        else{
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      }


?>