<?php 
require_once '../repository/UserRepository.php';
require_once '../repository/GallerieRepository.php';
require_once '../repository/PictureRepository.php';


class PictureController{

    public function pictures(){
        
        $view = new View('pictures');
        $view->title = 'User Pictures';
        $view->heading = 'User Pictures';
        $view->display();
    }
    public function displayUploadeErorrs($errorsPicture) {
        $_SESSION['registerErrors'] = $errorsPicture;
  
     }
    public function upload(){
        $_SESSION['registerErrors'] = [];
        $errorsPicture=[];
            if($_POST['submit']){
                if(!isset($_FILES['upload']['name'])){
                    $gid = $_SESSION['gid'];
                    $file_name = $_FILES['upload']['name'];
                    $file_type = $_FILES['upload']['type'];
                    $file_name_tmp = $_FILES['upload']['tmp_name'];
                    $target_dir = "../Pictures/";
                    $randomName = bin2hex(random_bytes(10));
                    
                    $path_parts = pathinfo($file_name);
              
                    $newFileName = $path_parts['filename'].$randomName.'.'.$path_parts['extension'];
                    echo $newFileName;
                    if(move_uploaded_file($file_name_tmp,$target_dir.$newFileName)){
                      echo true;
                    }
                }else{
                    array_push($errorsPicture, "Bild upload fehler");
                    $_SESSION['registerErrors'] = $errorsPicture;
                    header('Location: '.$GLOBALS['appurl'].'/picture/pictures');
                }
            }
        
     

    }

}
    ?>