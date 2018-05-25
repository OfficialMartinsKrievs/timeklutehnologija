<?php
	session_start();
	
	if(isset($_SESSION['uname'])){
	
		echo "<h2>Sveicinati, esiet iegājis product daļā</h2>";
		
		
		echo "<br><a href='welcome.php'><input type=button name=back
			value=back></a>";
	}
	else{
		echo "<script>location.href='login.php'</script>";
	}
	
	
	$target_dir = "uploads/";
$uploadOk = 1;

/*echo $imageFileType."<br/>";*/
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])||!empty($_FILES["fileToUpload"]["name"])) {
    $target_file =$target_dir.basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $check["mime"];
       /* echo "File is an image - " .  . ".";*/
        $uploadOk = 1;
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "File already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }


            } else {
     /*   echo "File is not an image.";*/
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
        $uploadOk = 0;
    }
    
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
else{
    echo "<br>Only JPG, JPEG & PNG files are allowed.";
}
	
	
	
?>

<!DOCTYPE html>
<html>
<body>


<form action="product.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


    <form id="form1">
        <input type='file' id="img" />
        <img id="preview" src="" style="display:file" />
		
    </form>
<script>
function preview(input) {
        if (input.files && input.files[0]) {
            var freader = new FileReader();
            freader.onload = function (e) {
                $("#preview").show();
                $('#preview').attr('src', e.target.result);
            }
            freader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#img").change(function(){
        preview(this);
    });
</script>	



</body>
</html>	