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

    public function upload(){
      $gid = $_SESSION['gid'];
      $file_name = $_FILES['upload']['name'];
      $file_type = $_FILES['upload']['type'];
      $file_name_temp = $_FILES['upload']['tmp_name'];
      var_dump($file_name_temp);
      $target_dir = "../pictures/";
      $randomName = bin2hex(random_bytes(16));

    }

}
    ?>