
<?php
$gid =$_GET['gid'];
 $gallerieRepo = new GallerieRepository();
 $galleries = $gallerieRepo->getGalleriesById($gid);
$name = $galleries->name;
$beschreibung = $galleries->beschreibung;


?>
    <?php

if(isset($_SESSION['registerErrors'])){
  foreach($_SESSION['registerErrors'] as $value){
    echo "<div class='error-style'>".$value."</div>";
  }
  

  }
  unset($_SESSION['registerErrors']);
  ?>


<form action='/N-J_Gibb/public/galleries/updateGallerie?gid=<?php echo $gid; ?>' method="post">
<label>Gallerie Name</label>
<input type="text" name="name" value='<?php echo $name; ?>'><br>
<label>Beschreibung</label>
<input type="text" name="beschrieb" value='<?php echo $beschreibung; ?>'><br>
<button id="submitProfil" class="waves-effect waves-light btn-small" type="submit"><i class="material-icons right">arrow_forward</i>Updaten</button>
</form>