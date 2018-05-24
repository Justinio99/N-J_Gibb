
<form action='/N-J_Gibb/public/picture/upload?gid=<?php echo $_GET['gid']; ?>' method="post" enctype="multipart/form-data">
Select image to upload:
<input type="file" name="upload" id="fileToUpload">
<input placeholder="Name" type="text" name="titel" />
<input placeholder="beschreibung" type="text" name="beschreibung" />
<input type="submit" value="Upload Image" name="submit">
</form>


<?php 
$baseUrl ="/N-J_Gibb";
for($i=0; $i< count($pictures);$i++){
    echo "<div>";
    echo "<img src=".$baseUrl.$pictures[$i]->picture.">";
    echo "</div>";
}
?>




