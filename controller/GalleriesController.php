<?php 

require_once '../repository/GallerieRepository.php';
require_once '../repository/UserRepository.php';

class GalleriesController{

  
    public function index()
    {
      $view = new View('userHome');
      $view->title = 'User Home';
      $view->heading = 'User Home';
      $uid = $_SESSION['uid'];
      $gallerieRepo = new GallerieRepository();
      $view->galleries = $gallerieRepo->getGalleries($uid);
      $view->display();
     
      
    }
    public function addGallerie()
    {
        $userId = $_SESSION['uid'];
        $name = $_POST['gallerieName'];
        $beschrieb = $_POST['beschreiubng'];
        $gallerieRepo = new GallerieRepository();
        if($name != ''){
            $gallerieRepo->createGallerie($userId,$name,$beschrieb);
            header('Location: '.$GLOBALS['appurl'].'/galleries/index');
        }else{
        header('Location: '.$GLOBALS['appurl'].'/galleries/index');
        }

    }
    
    public function pictures(){
        $view = new View('pictures');
        $view->title = 'User Pictures';
        $view->heading = 'User Pictures';
        $view->display();
    }

    public function deleteGallerie(){
        $gid = $_GET["gid"] 
    }

}

?>