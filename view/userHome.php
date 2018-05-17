
<?php 

echo "<p>Willkommen ".$_SESSION['userName']."</p>";

?>


<a id="addGallerie" class="waves-effect waves-light btn-small"><i id="addGallerie" class="material-icons right">add</i>Gallerie Hinzufügen</a>
<form action="/N-J_Gibb/public/galleries/createGallerie" method="post" class="gallerieForm hidden">
<label>Name Gallerie</label>
<input type="text" name="gallerieName"><br>
<label>Beschreibung</label>
<input type="text" name="beschreiubng">
<button id="submitGallerie" class="waves-effect waves-light btn-small" type="submit"><i class="material-icons right">arrow_forward</i>Erstellen</button>
</form>

<?php

?>

