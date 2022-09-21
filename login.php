<?php
$username = filter_input(INPUT_POST,'uname');
$password = filter_input(INPUT_POST,'psw');

if(!empty($username)){
  if(!empty($password)){
    $host ="localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "login" ;

    $conn = new mysqli($host , $dbusername , $dbpassword , $dbname);

    if(mysqli_connect_error()){
       die('Connect Error ('.mysqli_connect_errno().')' .mysqli_connect_errno() );
    }
    else{
      $sql_login = "INSERT INTO loginus values ('$username', '$password')";
      $conn->query($sql_login);
      $sql = "SELECT * FROM signup WHERE username='$username' AND password='$password'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count = mysqli_num_rows($result);  
      if($count == 1){  
        echo "<h1><center> Login successful </center></h1>";  
      }  
      else{  
          echo "<h1> Login failed. Invalid username or password.</h1>";  
      }
    }
    }
    else{
      die();
    }
  }


?>







