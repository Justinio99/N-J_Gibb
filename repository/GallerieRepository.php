<?php
require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';



  class GallerieRepository extends Repository
{


 public function createGallerie($userId,$name,$beschreibung){
    $query = "INSERT INTO gallerie (uid,name,beschreibung) VALUES (?,?,?)";
    $statement = ConnectionHandler::getConnection()->prepare($query);
    $statement->bind_param('sss', $userId,$name,$beschreibung);
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
   
}

?>