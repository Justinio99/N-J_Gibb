
<?php 
echo "<p>Willkommen ".$_SESSION['userName']."</p>";
// echo "<pre>"; 
// print_r($galleries[0]->name);
// echo "</pre>";

echo "<div style='display:flex; flex-wrap: wrap;'>";
for($i=0; $i < count($galleries); $i++){

    echo "<div class='card'>"."<div  class='container'>"."<p class='name-gallerie'><b>".$galleries[$i]->name."</b></h4> "."<p class='beschreibung-gallerie'>".$galleries[$i]->beschreibung."</p>"."</div>"."</div>";
    
}

echo "</div>";



?>

<button id="addGallerie">Gallerie Hinzufügen</button>
<form action="/N-J_Gibb/public/galleries/addGallerie" method="post" class="gallerieForm hidden">
<label>Name Gallerie</label>
<input type="text" name="gallerieName"><br>
<label>Beschreibung</label>
<input type="text" name="beschreiubng">
<button id="submitGallerie" type="submit">Erstellen</button>
</form>
