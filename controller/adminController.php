<?php 
require_once '../repository/UserRepository.php';
require_once '../repository/LoginRepository.php';


class adminController{

    public function index()
    {
      $loginRepository = new LoginRepository();
      $view = new View('admin');
      $view->title = 'Admin';
      $view->heading = 'Admin';
      $view->display();
    }

}
    ?>