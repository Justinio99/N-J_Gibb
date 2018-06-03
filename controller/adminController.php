<?php 
require_once '../repository/UserRepository.php';
require_once '../repository/GallerieRepository.php';
require_once '../repository/PictureRepository.php';


class adminController{


    public function index()
    {
      $userRepo = new UserRepository();
      $gallerieRepo = new GallerieRepository();
      $view = new View('admin');
      $view->title = 'Admin';
      $view->users = $userRepo->getAllUsers();
      $view->galleries = $gallerieRepo->getAllGalleries();
      $view->heading = 'Admin';
      $view->display();
    }

    public function deleteAllUserData(){
        $uid = $_GET['uid'];
        $pictureRepo = new PictureRepository();
        $gallerieRepo = new GallerieRepository();
        $userRepo = new UserRepository();
        $pictureRepo->adminDeletePicture($uid);
        $gallerieRepo->adminDeleteGallerie($uid);
        $userRepo->adminDeleteUser($uid);
        header('Location: '.$GLOBALS['appurl'].'/admin/index');
    }

    

}
    ?>

    