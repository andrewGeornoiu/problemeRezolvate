<?php

$uploadOk = 1;
$error = [];
$success = [];

if(isset($_POST["upload"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(empty($_FILES["fileToUpload"]["tmp_name"])){
        $error[] = "Cannot be empty";
    }else{
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $success[] = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $error[] = "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $error[] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $error[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $error[] = "Sorry, your file was not uploaded.";

    //if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $success[] = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
        } else {
            $error[] = "Sorry, there was an error uploading your file.";
        }
    }
    $secondsWait = 3;
    header("Refresh:$secondsWait");
}

?>

<html lang="">
<head>
    <title>First page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>


<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">

        <form action="index.php" method="post" class="col-6 mt-5" enctype="multipart/form-data">
            <span class="text-danger">
            <?php

                if(isset($error)){
                   foreach ($error as $e){
                       echo $e . "<br>";
                   }
                }else{
                    $error = '';
                }
            ?>
            </span>

            Select image to upload:
            <input type="file" name="fileToUpload" class="form-control mb-3" id="fileToUpload">
            <input type="submit" class="btn btn-dark" value="Upload Image" name="upload">
            <input type="submit" class="btn btn-success" value="Download Image" name="download">
            <div class="text-success mt-5">
            <?php

            if(isset($success)){
                foreach ($success as $s){
                    echo $s . "<br>";
                }
            }else{
                $success = '';
            }
            ?>
                 </div>


        </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>

</html>




