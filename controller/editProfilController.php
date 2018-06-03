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
    public function updateProfil(){
        $uid = $_SESSION['uid'];
        $email = $_POST['email'];
        $lastname = $_POST['nachname'];
        $firstname = $_POST['vorname'];
        $userRepo = new UserRepository();
        $userRepo->updateUserProfil($uid,$email,$firstname,$lastname);
        
    }
    
    public function updatePassword(){
        $userRepo = new UserRepository();
        $uid = $_SESSION['uid'];
        $oldPw = $_POST['oldPw'];
        $newPw = $_POST['newPw'];
        $repeatPw = $_POST['repeatPw'];
        $user = $userRepo->getUserById($uid);
       $passwordDB = $user->passwort;
       $newPassword = password_hash($newPw,PASSWORD_DEFAULT);

        if(password_verify($oldPw,$passwordDB)){
            if($newPw === $repeatPw){
             $userRepo->changePassword($uid,$newPassword);
             echo "yes";   
            }
        }
    }

}
    ?>

    