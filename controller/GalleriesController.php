    <?php 
require_once '../repository/UserRepository.php';
require_once '../repository/LoginRepository.php';


class GalleriesController{

    public function index()
    {
      $loginRepository = new LoginRepository();
      $view = new View('userHome');
      $view->title = 'User Home';
      $view->heading = 'User Home';
      $view->display();
    }

}
    ?>