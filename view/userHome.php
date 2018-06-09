
<?php
require_once '../repository/PictureRepository.php';
if(!isset($_SESSION['uid'])){
    header('Location: '.$GLOBALS['appurl'].'/login');
}else{
echo "<p>Willkommen ".$_SESSION['userName']."</p>";

// echo "<div style='float:left;'>";
$baseUrl ="/N-J_Gibb";

$repo = new PictureRepository();
for($i=0; $i < count($galleries); $i++){


$picture = $repo->getFirstPicture($galleries[$i]->gid);
    echo "<div class='card' >".
    "<a href=/N-J_Gibb/public/galleries/deleteGallerie?gid=".$galleries[$i]->gid.">".
    "<i class='material-icons dp48 hideDelete'>delete</i>".
    "</a>".
    "<a href=/N-J_Gibb/public/galleries/editGallerie?gid=".$galleries[$i]->gid.">".
    "<i class='material-icons dp48 hideDelete'>edit</i>".
    "</a>".
    "<a style='text-decoration: none !important;' href='/N-J_Gibb/public/picture/pictures?gid=".$galleries[$i]->gid."'>".
    "<div  class='container'>".
    "<p class='name-gallerie'><b>".$galleries[$i]->name."</b></h4> ".
    "<p class='beschreibung-gallerie'>".$galleries[$i]->beschreibung."</p>".
    
    "</div>".
    "</a>".
    "</div>";

    // echo "<div class='row'>".
    // "<div class='col s12 m7'>".
    //   "<div class='card'>".
    //     "<div class='card-image'>".
    //       "<img src=".$baseUrl.$picture[$i]->picture.">".
    //       "<span class='card-title'>".$galleries[$i]->name."</span>".
    //     "</div>".
    //     "<div class='card-content'>".
    //       "<p style='color:black'>".$galleries[$i]->beschreibung."</p>".
    //     "</div>".
    //     "<div class='card-action'>".
    //       "<a href=''>This is a link</a>".
    //     "</div>".
    //     "</div>".
    //      "</div>". 
    //      "</div>";

     
}

// echo "</div>";

function redirect($uid){
    var_dump($uid);
    header('Location: '.$GLOBALS['appurl'].'/picture/$uid');  
}

}
?>


<a id="addGallerie" class="waves-effect waves-light btn-small"><i id="addGallerie" class="material-icons right">add</i>Gallerie Hinzufügen</a>

<form action="/N-J_Gibb/public/galleries/addGallerie" method="post" class="gallerieForm hidden">
<label>Name Gallerie</label>
<input type="text" name="gallerieName"><br>
<label>Beschreibung</label>
<input type="text" name="beschreiubng">
<button id="submitGallerie" class="waves-effect waves-light btn-small" type="submit"><i class="material-icons right">arrow_forward</i>Erstellen</button>
</form>

