
<lable class="label-admin">Users: </lable>
<div class="user-container">
<?php
$userRepository = new UserRepository();
$user = $userRepository->getUser($email);
$errorAdmin = [];
if($user->role == 1){  
  for($x = 0; $x < count($users);$x++){
    if($users[$x]->role != 1){
      echo "<div class='card' >".
      "<a href=/N-J_Gibb/public/admin/deleteAllUserData?uid=".$users[$x]->uid." onclick='return confirm(`Are you sure you want to delete this User?`);'>".
      "<i class='material-icons dp48 '>delete</i>".
      "</a>".
      "<div  class='container'>".
      "<p class='name-gallerie'><b>".$users[$x]->lastname.' '.$users[$x]->firstname."</b></h4> ".
      "<p class='beschreibung-gallerie'>".$users[$x]->email."</p>".
      "</div>".
      "</div>";
    }
  
  }
  
   
    
  ?>
  </div>
  <lable class="label-admin">Galleries: </lable>
  <div class="gallerie-container">
  <?php 
  echo "<div style='display:flex; flex-wrap: wrap;'>";
  
    for($i = 0; $i < count($galleries); $i++){
    
      echo "<div class='card' >".
      "<a href=/N-J_Gibb/public/admin/deleteGallerieAndPicture?gid=".$galleries[$i]->gid."  onclick='return confirm(`Are you sure you want to delete this Gallerie?`);'>".
      "<i class='material-icons dp48 ' >delete</i>".
      "</a>".
      "<div  class='container'>".
      "<p class='name-gallerie'><b>".$galleries[$i]->name."</b></h4> ".
      "<p class='beschreibung-gallerie'>".$galleries[$i]->beschreibung."</p>".
      "</div>".
      "</div>";
    }
  }else{
    array_push($errorAdmin,"Bitte als Admin einloggen");
    $_SESSION['loginErrors'] = $errorAdmin;
    header('Location: '.$GLOBALS['appurl'].'/login');
  }



?>
</div>