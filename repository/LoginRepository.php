<?php
require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';
/**
 * Datenbankschnittstelle für die Benutzer
 */

// $servername = "localhost";
// $username = "root";  //your user name for php my admin if in local most probaly it will be "root"
// $password = "gibbiX12345";  //password probably it will be empty
// $databasename = "nicijustindata"; //Your db nane
// // Create connection
// $conn = new mysqli($servername, $username, $password,$databasename);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
// echo "Connected successfully";


  class LoginRepository extends Repository
  {

    public function checkLogin($username,$password){

      $query = "select * from benutzer where username = '$username' and passwort ='$password'"
      
        //prevent sql injection
    // $username = stripcslashes($username);
    // $password = stripcslashes($password);
    // $username = mysql_real_escape_string($username);
    // $password = mysql_real_escape_string($password);

    $statement = ConnectionHandler::getConnection()->prepare($query);

    $row = mysql_fetch_array($statement->execute());

    if($row['username'] === $username && $row['passwort'] === $password){
      echo "Login Success";
    }else{
      echo "Login verschissä";
    }
    }

  }
?>