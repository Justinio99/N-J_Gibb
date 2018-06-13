<form action='/N-J_Gibb/public/picture/upload?gid=<?php echo $_GET['gid']; ?>' method="post" enctype="multipart/form-data">
<input type="file" name="upload" id="fileToUpload">
<input placeholder="Name" type="text" name="titel" />
<input type="text" id="testInput" placeholder="#Tag#Tag" name="tags"/>


<input placeholder="beschreibung" type="text" name="beschreibung" />
<input type="submit" value="Upload Image" name="submit">
</form>



<div class="picture-container">
<?php 
$baseUrl ="/N-J_Gibb/Pictures/";
for($i=0; $i< count($pictures);$i++){
    
    echo "<img class='materialboxed'  width='650' src=".$baseUrl.$pictures[$i]->picture.">";
    
}

?>
</div>
