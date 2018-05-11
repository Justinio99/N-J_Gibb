<?php
require_once '../repository/UserRepository.php';
require_once '../repository/LoginRepository.php';
/**
 * Controller für das Login und die Registration, siehe Dokumentation im DefaultController.
 */
  class LoginController
  {
   
    /**
     * Default-Seite für das Login: Zeigt das Login-Formular an
	 * Dispatcher: /login
     */

     
    public function index()
    {
      $loginRepository = new LoginRepository();
      $view = new View('login_index');
      $view->title = 'Bilder-DB';
      $view->heading = 'Login';
      $view->display();
    }
    /**
     * Zeigt das Registrations-Formular an
	 * Dispatcher: /login/registration
     */
    public function registration()
    {
      if(isset($_POST['lastname']))
      {
        $errorsRegister = [];
      $userRepository = new UserRepository();
      $lastname = $_POST['lastname'];
      $firstname = $_POST['firstname'];
      $email = $_POST['email'];
      $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
      $passwordRepeat = $_POST["pwRepeat"];
      $user = $userRepository->getUser($email);
         
      if($_POST['password'] != $passwordRepeat){
        array_push($errorsRegister,'Passwort stimmt nicht überein');
        $this->displayRegisterErorrs($errorsRegister);
      }
      if($email == ''){
        array_push($errorsRegister,'Bitte Email eingeben');
        $this->displayRegisterErorrs($errorsRegister);
      }
      if($user->email == $_POST['email'] && $email != ''){
        array_push($errorsRegister,'Email ist bereits vergeben');
        $this->displayRegisterErorrs($errorsRegister);
      }
      if($_POST['password'] == $passwordRepeat && $user->email !== $_POST['email']){

        $userRepository->createuser($email,$firstname,$lastname,$password);
        header('Location: '.$GLOBALS['appurl'].'/login');   
<<<<<<< HEAD
      }
=======
      }else{
        
      echo "<h2 id='test'>Email oder Password falsch</h2>";
    }
      
     
       
      
>>>>>>> nici-dev
    }
     $view = new View('login_registration');
      $view->title = 'Bilder-DB';
      $view->heading = 'Registration';
      $view->display();
    }
    public function displayRegisterErorrs($errorsRegister) {
      $_SESSION['registerErrors'] = $errorsRegister;

   }


    public function login(){
      if($_POST['send']){
        $email = $_POST['email'];
        $passwordInput = $_POST['password'];
        $errorsLogin = [];
        $userRepository = new UserRepository();
        echo $userRepository->validateEmail($email);
        if($userRepository->validateEmail($email));
        $user = $userRepository->getUser($email);
        $name = $user->firstname." ".$user->lastname;
        $passwordDB = $user->passwort;
        
        if(password_verify($passwordInput,$passwordDB)){
          $_SESSION['uid'] =$user->uid;
          $_SESSION['userName'] = $name;
          header('Location: '.$GLOBALS['appurl'].'/galleries/index');

        }else{
          array_push($errorsLogin,"Das Passwort wurde falsch eingegeben");
          $this->displayLoginErorrs($errorsLogin, "/login");
        }
       
      }
    }

      public function displayLoginErorrs($errorsLogin, $location) {
         $_SESSION['loginErrors'] = $errorsLogin;
         header('Location: '.$GLOBALS['appurl'].$location); 
      }

      public function logout(){
          session_destroy();
          header('Location: '.$GLOBALS['appurl'].'/login'); 
        }
        
}

  
?>

