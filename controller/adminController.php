<?php 
require_once '../repository/UserRepository.php';
require_once '../repository/GallerieRepository.php';


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

    

}
    ?>