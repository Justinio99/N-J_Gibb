<?php 
$titel = $picture[0]->title;
$beschrieb = $picture[0]->beschreibung;
$pid = $picture[0]->pid;
$baseUrl ="/N-J_Gibb/thumbs/";
?>

<form action='/N-J_Gibb/public/picture/updatePicture?pid=<?php echo $pid; ?>' method="post">
<img src='<?php echo $baseUrl.$picture[0]->picture ?>' style="width:150px; display: flex;">
<label>Picture Name</label>
<input type="text" name="titel" value='<?php echo $titel; ?>'><br>
<label>Beschreibung</label>
<input type="text" name="beschrieb" value='<?php echo $beschrieb; ?>'><br>
<button id="submitProfil" class="waves-effect waves-light btn-small" type="submit"><i class="material-icons right">arrow_forward</i>Updaten</button>
</form>