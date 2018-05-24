<?php
require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';

  class PictureRepository extends Repository
  {
    public function createGallerie($userId,$name,$beschreibung){
        $query = "INSERT INTO gallerie (uid,name,beschreibung) VALUES (?,?,?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('iss', $userId,$name,$beschreibung);
        if(!$statement->execute()) throw new Exception($statement->error);
            return $statement->insert_id;
    }

    public function uploadPicture($gid){
        
    }

  }
?>