
<?php 

echo "<p>Willkommen ".$_SESSION['userName']."</p>";

?>

<button id="addGallerie">Gallerie Hinzufügen</button>
<form action="/N-J_Gibb/public/galleries/createGallerie" method="post" class="gallerieForm hidden">
<label>Name Gallerie</label>
<input type="text" name="gallerieName"><br>
<label>Beschreibung</label>
<input type="text" name="beschreiubng">
<button id="submitGallerie" type="submit">Erstellen</button>
</form>

<?php

?>