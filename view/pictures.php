
<form action='/N-J_Gibb/public/picture/upload?gid=<?php echo $_GET['gid']; ?>' method="post" enctype="multipart/form-data">
<input type="file" name="upload" id="fileToUpload">
<input placeholder="Name" type="text" name="titel" />
<input type="text" id="testInput" placeholder="#Tag#Tag" name="tags"/>


<input placeholder="beschreibung" type="text" name="beschreibung" />
<input type="submit" value="Upload Image" name="submit">
</form>



<div class="picture-container">
<?php 
if(isset($_SESSION['uid'])){
$thumnUrl ="/N-J_Gibb/thumbs/";
$pictureUrl ="/N-J_Gibb/Pictures/";
for($i=0; $i< count($pictures);$i++){
    
   echo '<div class="card with-photo">
   <header class="card-header">
     <img src="'.$thumnUrl.$pictures[$i]->picture.'" alt="">
   </header>
   <section class="card-body">
     <span>'.$pictures[$i]->title.'</span>
     <p style="color:black;">'.$pictures[$i]->beschreibung.'</p>
   </section>
 </div>';
}
}else{
   echo  "Keine Berechtigung!";
   header('Location: '.$GLOBALS['appurl'].'/login');
}
?>
</div>
