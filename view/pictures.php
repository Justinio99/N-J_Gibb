
<form action='/N-J_Gibb/public/picture/upload?gid=<?php echo $_GET['gid']; ?>' method="post" enctype="multipart/form-data">
Select image to upload:
<input type="file" name="upload" id="fileToUpload">
<input placeholder="Name" type="text" name="titel" />
<input placeholder="beschreibung" type="text" name="beschreibung" />
<input type="submit" value="Upload Image" name="submit">
</form>


<div></div>
<?php 
for($i=0; $i< count($pictures);$i++){
    echo "<img src="."/N-J_Gibb/Pictures/".$pictures[$i]->picture;">";
}
?>




