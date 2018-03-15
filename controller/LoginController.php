<?php
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
      $view = new View('login_registration');
      $view->title = 'Bilder-DB';
      $view->heading = 'Registration';
      $view->display();
    }
}

public function login(){
  if (!empty($user)){
    $view = new View('index_login');
    $view->title = 'Login';
    $view->user = $_SESSION['logged_in_user'];
    $view->heading = 'Login';
    $view->display();
  }
  else{
    $view = new View('index_login');
    $view->title = 'Login';
    //$view->user = $_SESSION['logged_in_user'];
    $view->heading = 'Login';
    $view->display();
  }
}
?>

