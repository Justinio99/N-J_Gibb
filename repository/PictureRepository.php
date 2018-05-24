<?php
require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';

  class PictureRepository extends Repository
  {
    
    public function uploadPicture($gid,$picture,$titel, $beschreibung){
      $query = "INSERT INTO picture (gid,picture,title,beschreibung) VALUES (?,?,?,?)";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('isss', $gid,$picture,$titel,$beschreibung);
      if(!$statement->execute()) throw new Exception($statement->error);
      return $statement->insert_id;
    }

    public function getPicturesByGid($gid){
      $query = "SELECT * FROM picture WHERE gid = ?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$gid);
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

  }
?>

 <!-- $query = "SELECT * FROM benutzer WHERE email = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s',$email);
        $statement->execute();
        $result = $statement->get_result();
        if(!$result) throw new Exception($statement->error);
        $row = $result->fetch_object();
        $result->close();
        return $row; -->