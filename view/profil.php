<?php
$lastname = $userInfo->lastname;
$firstname = $userInfo->firstname;
$email = $userInfo->email;

?>
    <?php

if(isset($_SESSION['registerErrors'])){
  foreach($_SESSION['registerErrors'] as $value){
    echo "<div>".$value."</div>";
  }}
  unset($_SESSION['registerErrors']);
  ?>
<form action="/N-J_Gibb/public/editProfil/updateProfil" method="post">
<label>Vorname</label>
<input type="text" name="vorname" value='<?php echo $firstname; ?>'><br>
<label>nachname</label>
<input type="text" name="nachname"  value='<?php echo $lastname; ?>'>
<label>Email</label>
<input type="text" name="email" value='<?php echo $email; ?>'><br>
<button id="submitProfil" class="waves-effect waves-light btn-small" type="submit"><i class="material-icons right">arrow_forward</i>Updaten</button>
</form>

<div style="margin-top:50px;" class="changePassword">
<a class="waves-effect waves-light btn" id="changePw"><i class="material-icons right">update</i>Passwort ändern</a>
</div>

<div class="password-container test hidden">
<form action="/N-J_Gibb/public/editProfil/updatePassword" method="post">
<input class="pwInput" name="oldPw" type="text" placeholder="Altes Passwort">
<input class="pwInput" name="newPw" type="text" placeholder="Neues Passwort">
<input class="pwInput" name="repeatPw"type="text" placeholder="Passwort Wiederholen">
<button id="submitProfil" class="waves-effect waves-light btn-small" type="submit"><i class="material-icons right">arrow_forward</i>Updaten</button>
</div>
          