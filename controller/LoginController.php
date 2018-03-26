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
      $password = sha1($_POST['password']);
      $userId = $userRepository->createuser($email,$firstname,$lastname,$password);
      $_SESSION['uid'] = $userId;
      header('Location: '.$GLOBALS['appurl'].'/galleries/index'); 
       
      
    }

      
      $view = new View('login_registration');
      $view->title = 'Bilder-DB';
      $view->heading = 'Registration';
      $view->display();
    }

    public function login(){
      if($_POST['send']){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $error = false;
        $errors = [];
        $userRepository = new UserRepository();
        echo $userRepository->validateEmail($email);
        if($userRepository->validateEmail($email));
        echo "yes";
        $user = $userRepository->getUser($email);
        if(password_verify(sha1($password),$user->passwort)){
          $_SESSION['uid'] =$user->uid;
          
        }else $error = true;
        

      }else $error = true;
      
      }
}


?>

