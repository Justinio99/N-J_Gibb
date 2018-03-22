<?php
require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';



class UserRepository extends Repository
{

    public function validateEmail(){
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
}

?>