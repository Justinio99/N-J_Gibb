<?php
var_dump($userInfo->lastname);

?>

<form action="" method="post">
<label>Vorname</label>
<input type="text" name="vorname" value='<?php echo $userInfo->fistname; ?>'><br>
<label>nachname</label>
<input type="text" name="nachname">
<button id="submitGallerie" class="waves-effect waves-light btn-small" type="submit"><i class="material-icons right">arrow_forward</i>Erstellen</button>
</form>
