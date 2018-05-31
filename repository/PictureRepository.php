<?php
require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';

  class PictureRepository extends Repository
  {
    
    public function uploadPicture($uid,$gid,$picture,$titel, $beschreibung){
      $query = "INSERT INTO picture (uid,gid,picture,title,beschreibung) VALUES (?,?,?,?,?)";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('iisss', $uid,$gid,$picture,$titel,$beschreibung);
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

    //This function expectes an array as Parameter!
    public function addTags($pid,$tagArray){
      
      $query = "INSERT INTO tags (pid,tag) VALUES (?,?)";
      for($i=0; $i< count($tagArray); $i++){
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('is', $pid, $tagArray[$i]->tag);
        if(!$statement->execute()) throw new Exception($statement->error);
      return $statement->insert_id;
      }
      
    }

  }
?>

