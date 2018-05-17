
<?php 
if(!isset($_SESSION['uid'])){
    header('Location: '.$GLOBALS['appurl'].'/login');
}else{
echo "<p>Willkommen ".$_SESSION['userName']."</p>";
echo "<div style='display:flex; flex-wrap: wrap;'>";
for($i=0; $i < count($galleries); $i++){

    echo "<div class='card'>"."<div  class='container'>"."<p class='name-gallerie'><b>".$galleries[$i]->name."</b></h4> "."<p class='beschreibung-gallerie'>".$galleries[$i]->beschreibung."</p>"."</div>"."</div>";
    
}

echo "</div>";


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

