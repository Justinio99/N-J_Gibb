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
        $gallerieRepo->createGallerie($userId,$name,$beschrieb);
        
        

    }

}

?>