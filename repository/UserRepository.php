<?php
require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';




class UserRepository extends Repository
{


    public function createuser($email,$firstname,$lastname,$password){

        $query = "INSERT INTO benutzer (email,firstname,lastname,passwort) VALUES (?,?,?,?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss', $email,$firstname,$lastname,$password);
        if(!$statement->execute()) throw new Exception($statement->error);
            return $statement->insert_id;


    }
    public function validateEmail($email){
        $mailValid = false;
        $query = "SELECT * FROM benutzer WHERE email = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s',$email);
        $statement->execute();
        $result = $statement->get_result();
        if(!$result) throw new Exception($statement->error);
        if($result->num_rows > 0) $mailValid = true;
        $result->close();
        return $mailValid;
    }

    public function getUser($email){
        $query = "SELECT * FROM benutzer WHERE email = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s',$email);
        $statement->execute();
        $result = $statement->get_result();
        if(!$result) throw new Exception($statement->error);
        $row = $result->fetch_object();
        $result->close();
        return $row;
    }
    public function getAllUsers(){
        $query = "SELECT * FROM benutzer";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        
        $rows = array();
        while($row =$result->fetch_object()){
          $rows[] = $row;
        }
        if(!$result) throw new Exception($statement->error);
        $row = $result->fetch_object();
        $result->close();
        return $rows;
    }

    public function adminDeleteUser(){
        // $uid = $_GET['uid'];
    }

   
}

?>