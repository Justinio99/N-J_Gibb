<?php

if(!isset($_SESSION['gid'])){
    $_SESSION['gid'] = $_GET['gid'];
}

?> 

<form action='/N-J_Gibb/public/picture/upload' method="post" enctype="multipart/form-data">
Select image to upload:
<input type="file" name="upload" id="fileToUpload">
<input type="text" name="titel" />
<input type="submit" value="Upload Image" name="submit">
</form>