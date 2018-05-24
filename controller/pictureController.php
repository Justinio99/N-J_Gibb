<?php 
require_once '../repository/UserRepository.php';
require_once '../repository/GallerieRepository.php';
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
        $gid = $_GET['gid'];
        $_SESSION['registerErrors'] = [];
        $errorsPicture=[];
            if($_POST['submit']){
                if(!empty($_FILES['upload']['name'])){
                    $title = $_POST['titel'] || '';
                    $beschreibung = $_POST['beschreibung'] || '';
                    
                    $file_name = $_FILES['upload']['name'];
                    $file_type = $_FILES['upload']['type'];
                    $file_name_tmp = $_FILES['upload']['tmp_name'];
                    $target_dir = "../Pictures/";
                    $randomName = bin2hex(random_bytes(10));
                    
                    $path_parts = pathinfo($file_name);
              
                    $newFileName = $path_parts['filename'].$randomName.'.'.$path_parts['extension'];
               
                    if(move_uploaded_file($file_name_tmp,$target_dir.$newFileName)){
                      $pictureRepo = new PictureRepository();
                      $fullNamePicture = $target_dir.$newFileName;
                      $pictureRepo->uploadPicture($gid, $fullNamePicture,$title,$beschreibung);
                    }
                }else{
                    array_push($errorsPicture, "Kein Bild ausgewählt");
                    $_SESSION['registerErrors'] = $errorsPicture;
                    $pfad = $GLOBALS['appurl']."/picture/pictures?gid=".$gid;
                    header('Location: '.$pfad);
                }
            }
        
     

    }

}
    ?>