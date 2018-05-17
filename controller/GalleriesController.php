<?php 

require_once '../repository/GallerieRepository.php';
require_once '../repository/UserRepository.php';

class GalleriesController{

  
    public function index()
    {
      $view = new View('userHome');
      $view->title = 'User Home';
      $view->heading = 'User Home';
      $view->display();
      $uid = $_SESSION['uid'];
      $gallerieRepo = new GallerieRepository();
      $galleries = $gallerieRepo->getGalleries($uid);
        var_dump($galleries);
      
    }
    public function createGallerie()
    {
        $userId = $_SESSION['uid'];
        var_dump($_SESSION['uid']);
        $name = $_POST['gallerieName'];
        $beschrieb = $_POST['beschreiubng'];
        $userRepository = new UserRepository();
        if($name != ''){
            $userRepository->createGallerie($userId,$name,$beschrieb);
        }
        

    }

}

?>