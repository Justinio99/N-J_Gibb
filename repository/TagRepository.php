
<?php
require_once '../lib/Repository.php';
require_once '../lib/ConnectionHandler.php';

class TagRepository extends Repository
{

    public function addTagsToPicture($pid, $tags){
        $query = "INSERT INTO picture_tag (pid, tid) VALUES (?,?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ii',$pid,$tags);
        if (!$statement->execute()) throw Exception($statement->error);
        return $statement->insert_id;
    }
    public function getTagsByPid($pid){
        $query = "select t.tid tid, tag, tp.pid pid from tags t join picture_tag tp on tp.tid = t.tid where tp.pid = ?;";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$pid);
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
    public function insertTags($tags)
    {
        $query = "INSERT INTO tags (tag) VALUES (?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s',$tags);
        if (!$statement->execute()) throw Exception($statement->error);
        return $statement->insert_id;
    }
    public function selectTagIdfromTag_Picture($pid){
        $query = "SELECT tid FROM picture_tag WHERE pid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$pid);
        $statement->execute();
        $result = $statement->get_result();
        $rows = array();
        while($row = $result->fetch_object()){
            $rows[]= $row;
        }
        if(!$result) throw Exception($statement->error);
        $result->close();
        return $rows;
    }
    public function deletePictureTag($pid){
        $query = "DELETE FROM picture_tag WHERE pid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$pid);
        $statement->execute();
    }
    public function selectTagId($tag, $desctiption)
    {
    }
    public function selectTag($tag){
        $query = "SELECT tid FROM tags WHERE tag = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s',$tag);
        $statement->execute();
        $result = $statement->get_result();
        if(!$result) throw Exception($statement->error);
        $row = $result->fetch_object();
        $result->close();
        return $row;
    }
    public function deleteTag($tid){
        $query = "DELETE FROM tags WHERE tid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$tid);
        $statement->execute();
    }
}