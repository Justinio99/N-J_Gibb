

<div class="user-container">
<?php

for($x = 0; $x < count($users);$x++){
  if($users[$x]->role != 1){
    echo "<div class='card' >".
    "<a href=/N-J_Gibb/public/galleries/adminDeleteUser?uid=".$users[$x]->uid.">".
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

<div class="gallerie-container">
<?php 
echo "<div style='display:flex; flex-wrap: wrap;'>";

  for($i = 0; $i < count($galleries); $i++){
  
    echo "<div class='card' >".
    "<a href=/N-J_Gibb/public/galleries/adminDeleteGallerie?gid=".$galleries[$i]->gid.">".
    "<i class='material-icons dp48 '>delete</i>".
    "</a>".
    "<div  class='container'>".
    "<p class='name-gallerie'><b>".$galleries[$i]->name."</b></h4> ".
    "<p class='beschreibung-gallerie'>".$galleries[$i]->beschreibung."</p>".
    "</div>".
    "</div>";
  }
  
?>
</div>