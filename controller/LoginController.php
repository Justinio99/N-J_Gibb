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
      $userRepository = new UserRepository();
      $lastname = $_POST['lastname'];
      $firstname = $_POST['firstname'];
      $email = $_POST['email'];
      $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
      
      $userRepository->createuser($email,$firstname,$lastname,$password);
      header('Location: '.$GLOBALS['appurl'].'/login'); 
       
      
    }

      
      $view = new View('login_registration');
      $view->title = 'Bilder-DB';
      $view->heading = 'Registration';
      $view->display();
    }

    public function login(){
      if($_POST['send']){
        $email = $_POST['email'];
        $passwordInput = $_POST['password'];
        $error = false;
        $errors = [];
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
          $error = true;
          header('Location: '.$GLOBALS['appurl'].'/login'); 
        }
       
      }else $error = true;
       
      }

      public function logout(){
          session_destroy();
          header('Location: '.$GLOBALS['appurl'].'/login'); 
        }
        
}


?>

