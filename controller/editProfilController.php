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
    public function displayRegisterErorrs($errorsRegister) {
        $_SESSION['registerErrors'] = $errorsRegister;
  
     }
    public function updateProfil(){
        $uid = $_SESSION['uid'];
        $email = htmlspecialchars($_POST['email']);
        $lastname = htmlspecialchars($_POST['nachname']);
        $firstname = htmlspecialchars($_POST['vorname']);
        $userRepo = new UserRepository();
        $userRepo->updateUserProfil($uid,$email,$firstname,$lastname);
        
    }
    
    public function updatePassword(){
        $errorsRegister =[];
        $userRepo = new UserRepository();
        $uid =   htmlspecialchars($_SESSION['uid']);
        $oldPw = htmlspecialchars($_POST['oldPw']);
        
        $newPw = htmlspecialchars($_POST['newPw']);
        $repeatPw = htmlspecialchars($_POST['repeatPw']);
        $user = $userRepo->getUserById($uid);
       $passwordDB = $user->passwort;
       $newPassword = password_hash($newPw,PASSWORD_DEFAULT);

       if($newPw == $repeatPw && $repeatPw && $newPw != '' && $repeatPw !=''){
        echo "DB valid";
        if(password_verify($oldPw,$passwordDB)){
          
                echo "repeat valllid";
             $userRepo->changePassword($uid,$newPassword);
             array_push($errorsRegister,'Passwort erfolgreich geändert');
             $this->displayRegisterErorrs($errorsRegister); 
             header('Location: '.$GLOBALS['appurl'].'/editProfil/index'); 
            
        }else{
            array_push($errorsRegister,'Altes Passwort ist inkorrekt');
            $this->displayRegisterErorrs($errorsRegister);
             header('Location: '.$GLOBALS['appurl'].'/editProfil/index');
        }
            }else{
                echo "DB invalid";
                array_push($errorsRegister,'Passwort stimmt nicht überein');
                $this->displayRegisterErorrs($errorsRegister);
                 header('Location: '.$GLOBALS['appurl'].'/editProfil/index');
            }

    }

}
    ?>

    