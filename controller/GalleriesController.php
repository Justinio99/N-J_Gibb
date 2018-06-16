<?php 

require_once '../repository/GallerieRepository.php';
require_once '../repository/UserRepository.php';

class GalleriesController{

  
    public function index()
    {
      $view = new View('userHome');
      $view->title = 'User Home';
      $view->heading = 'User Home';
      $uid = $_SESSION['uid'];
      $gallerieRepo = new GallerieRepository();
      $view->galleries = $gallerieRepo->getGalleries($uid);
      $view->display();
     
      
    }
    public function addGallerie()
    {
        $userId = $_SESSION['uid'];
        $name = htmlspecialchars($_POST['gallerieName']);
        $beschrieb = htmlspecialchars($_POST['beschreiubng']);
        $gallerieRepo = new GallerieRepository();
        if($name != ''){
            $gallerieRepo->createGallerie($userId,$name,$beschrieb);
            header('Location: '.$GLOBALS['appurl'].'/galleries/index');
        }else{
        header('Location: '.$GLOBALS['appurl'].'/galleries/index');
        }

    }
    
    public function pictures(){
        $view = new View('pictures');
        $view->title = 'User Pictures';
        $view->heading = 'User Pictures';
        $view->display();
    }

    public function editGallerie(){

        $gid = $_GET['gid'];
        $gallerieRepo = new GallerieRepository();
        $view = new View('editGallerie');
        $view->title = 'Gallerie Bearbeiten';
        $view->heading = 'Gallerie Bearbeiten';
        $view->galleries = $gallerieRepo->getGalleriesByGid($gid);
        $view->display();
        

    }
    public function displayRegisterErorrs($errorsRegister) {
        $_SESSION['registerErrors'] = $errorsRegister;
  
     }

    public function updateGallerie(){
        $errorsRegister = [];
        $gid = $_GET['gid'];
        $name = htmlspecialchars($_POST['name']);
        $beschrieb = htmlspecialchars($_POST['beschrieb']);
        if($name != '' || $beschrieb != ''){
            $gallerieRepo = new GallerieRepository();
            $gallerieRepo->updateGallerie($name,$beschrieb,$gid);
         
            
            header('Location: '.$GLOBALS['appurl'].'/galleries/index');  
        }else{
            array_push($errorsRegister,'Update fehlgschalagen');
        $this->displayRegisterErorrs($errorsRegister); 
        header('Location: '.$GLOBALS['appurl'].'/galleries/editGallerie?gid='.$gid); 
        }
        
    
    }
    public function deleteGallerie(){
        $gallerieRepo = new GallerieRepository();
        $gid = $_GET['gid'];
        $gallerieRepo->deleteGallerie($gid);
    }
   
   

}

?>