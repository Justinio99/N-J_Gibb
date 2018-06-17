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


    public function deleteGallerieAndPicture(){
        $gid = $_GET['gid'];
        $gallerieRepo = new GallerieRepository();
        $gallerieRepo->deleteGallerie($gid);
        header('Location: '.$GLOBALS['appurl'].'/admin/index');
    }

    public function editUser(){
        $view = new View('adminEditUser');
        $view->title = 'EditUser';
        $view->heading = 'EditUser';
        $view->display();
    }

    public function updateUser(){
        $errorsRegister = [];
        $uid = $_GET['uid'];
        $email = $_POST['email'];
        $vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $userRepo = new UserRepository();
        if($vorname != '' || $nachname != ''|| $email != ''){

            $userRepo->updateUserProfil($uid,$email,$vorname,$nachname);
            header('Location: '.$GLOBALS['appurl'].'/admin/index');
        }else{
            header('Location: '.$GLOBALS['appurl'].'/admin/index');
        }
    }

    

}
    ?>

    