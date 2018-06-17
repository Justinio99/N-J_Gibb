
<?php
$uid =$_GET['uid'];
$userRepo = new UserRepository();
$user = $userRepo->getUserByUid($uid);
$fistname = $user->firstname;
$lastname = $user->lastname;
$email = $user->email;

?>
    <?php

if(isset($_SESSION['registerErrors'])){
  foreach($_SESSION['registerErrors'] as $value){
    echo "<div class='error-style'>".$value."</div>";
  }
  

  }
  unset($_SESSION['registerErrors']);
  ?>


<form action='/N-J_Gibb/public/admin/updateUser?uid=<?php echo $uid; ?>' method="post">
<label>Vorname</label>
<input type="text" name="vorname" value='<?php echo $fistname; ?>'><br>
<label>Nachname</label>
<input type="text" name="nachname" value='<?php echo $lastname; ?>'><br>
<label>Email</label>
<input type="text" name="email" value='<?php echo $email; ?>'><br>
<button id="submitProfil" class="waves-effect waves-light btn-small" type="submit"><i class="material-icons right">arrow_forward</i>Updaten</button>
</form>