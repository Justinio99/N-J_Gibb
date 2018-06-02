<?php 
require_once '../repository/UserRepository.php';
require_once '../repository/GallerieRepository.php';
require_once '../repository/PictureRepository.php';


class editProfilController{


    public function index()
    {
        $userRepo = new UserRepository();
        $uid = $_SESSION['uid'];
        $view = new View('profil');
        $view->title = 'Profil';
        $view->userInfo = $userRepo->getUserById($uid);
        $view->heading = 'Profil';
        $view->display();
    }

    

}
    ?>

    