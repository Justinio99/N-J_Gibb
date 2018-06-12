<?php 
require_once '../repository/UserRepository.php';
require_once '../repository/PictureRepository.php';


class PictureController{

    public function pictures(){
        $gid = $_GET['gid'];
        $view = new View('pictures');
        $view->title = 'User Pictures';
        $view->heading = 'User Pictures';
        $pictureRepo = new PictureRepository();
        $view->pictures = $pictureRepo->getPicturesByGid($gid);
        $view->display();
    }
    public function displayUploadeErorrs($errorsPicture) {
        $_SESSION['registerErrors'] = $errorsPicture;
  
     }
    public function upload(){
        $pictureRepo = new PictureRepository();
        $gid = $_GET['gid'];
        
        $uid = $_SESSION['uid'];
        $inputs = htmlspecialchars($_POST['tags']);
        $errorsRegister = [];
        $errorsPicture=[];
       
      
        
            if($_POST['submit']){
                if(!empty($_FILES['upload']['name'])){
                    $title = htmlspecialchars($_POST['titel'] || '');
                    $beschreibung = htmlspecialchars($_POST['beschreibung'] || '');
                    
                    $file_name = $_FILES['upload']['name'];
                    $file_type = $_FILES['upload']['type'];
                    $file_name_tmp = $_FILES['upload']['tmp_name'];
                    $target_dir = "../Pictures/";
                    //$randomName = bin2hex(random_bytes(10));
                    
                    //New 
                    $pid =  $pictureRepo->maxId()->pid + 1;
                    $path_parts = pathinfo($file_name);
                    $newFileName = $path_parts['filename'] . strval($gid) . strval($pid) . '.' . $path_parts['extension'];
                    //$newFileName = $path_parts['filename'].$randomName.'.'.$path_parts['extension'];
                  
               

                    if(move_uploaded_file($file_name_tmp,$target_dir.$newFileName)){
                    //   $pictureRepo = new PictureRepository();
                    //   $fullNamePicture = "/"."Pictures/".$newFileName;
                    //   $pictureRepo->uploadPicture($uid,$gid, $fullNamePicture,$title,$beschreibung);
                        // ---------------------------------------------------------------------------------------------------------------------------------------
                                // -----------------------------------------------Erzeugung Thumbnail---------------------------------------------------------------------
                                // ---------------------------------------------------------------------------------------------------------------------------------------
                                $img = imagecreatefromjpeg("../Pictures/" . $newFileName);
                                $width = 200;
                                $height = 200;
                                $TNimageWidth = $width;
                                $TNimageHeight = $height;
                                $imagesx = imagesx($img);
                                $imagesy = imagesy($img);
                                if ($height > $imagesy && $width > $imagesx) {
                                    $width = $imagesx;
                                    $height = $imagesy;
                                }
                                if ($imagesx / $imagesy >= $TNimageWidth / $TNimageHeight) {
                                    $height = round(($width / $imagesx) * $imagesy);
                                } else {
                                    $width = round(($height / $imagesy) * $imagesx);
                                }
                                $thumbnail = imagecreatetruecolor($TNimageWidth, $TNimageHeight);
                                imagecopyresampled($thumbnail, $img, 0, 0, 0, 0, $width, $height, $imagesx, $imagesy);
                                imagejpeg($thumbnail, "../thumbs/" . $newFileName);
                                imagedestroy($thumbnail);
                                imagedestroy($img);

                                //TODO: Call Uploade function in repo / change upload function (params) in PictureRepo

                }else{
                    
                    array_push($errorsRegister,'Kein Bild ausgewählt');
                    $this->displayRegisterErorrs($errorsRegister);
                    $pfad = $GLOBALS['appurl']."/picture/pictures?gid=".$gid;
                    header('Location: '.$pfad);
                }
            }
        
     

    }

    

    }
}