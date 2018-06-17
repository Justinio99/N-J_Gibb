<?php
require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';



  class GallerieRepository extends Repository
{


 public function createGallerie($userId,$name,$beschreibung){
    $query = "INSERT INTO gallerie (uid,name,beschreibung) VALUES (?,?,?)";
    $statement = ConnectionHandler::getConnection()->prepare($query);
    $statement->bind_param('iss', $userId,$name,$beschreibung);
    if(!$statement->execute()) throw new Exception($statement->error);
        return $statement->insert_id;
}

public function getGalleries($uid){
$query = "SELECT * FROM gallerie WHERE uid = ?";
$statement = ConnectionHandler::getConnection()->prepare($query);
$statement->bind_param('s',$uid);
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

public function deleteGallerie($gid){
  $query = "DELETE FROM gallerie WHERE gid = ?";
  $statement = ConnectionHandler::getConnection()->prepare($query);
  $statement->bind_param('i',$gid);
  $statement->execute();

}

public function updateGallerie($name,$beschreibung,$gid) {
$query = " UPDATE gallerie SET name= ?, beschreibung= ? WHERE gid = ?";
$statement = ConnectionHandler::getConnection()->prepare($query);
$statement->bind_param('ssi', $name,$beschreibung,$gid);
$statement->execute();

}

public function getAllGalleries(){
  $query = "SELECT * FROM gallerie";
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

public function adminDeleteGallerie($uid){
  $query = "DELETE FROM gallerie WHERE uid = ?";
  $statement = ConnectionHandler::getConnection()->prepare($query);
  $statement->bind_param('i',$uid);
  $statement->execute();

}

public function getGalleriesByGid($gid,$uid){
$query = "SELECT * FROM gallerie WHERE gid = ? AND uid = ?";
$statement = ConnectionHandler::getConnection()->prepare($query);
$statement->bind_param('ii',$gid,$uid);
$statement->execute();
$result = $statement->get_result();
if(!$result) throw new Exception($statement->error);
$row = $result->fetch_object();
$result->close();
return $row;
}

public function getGalleriesById($gid){
  $query = "SELECT * FROM gallerie WHERE gid = ?";
$statement = ConnectionHandler::getConnection()->prepare($query);
$statement->bind_param('i',$gid);
$statement->execute();
$result = $statement->get_result();
if(!$result) throw new Exception($statement->error);
$row = $result->fetch_object();
$result->close();
return $row;
}



   
}

?>