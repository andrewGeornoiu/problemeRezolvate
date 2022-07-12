<?php
include_once 'functions.php';


if (isset($_POST['upload'])){

    $img = $_FILES['imgToUpload'];

    $imgName = $_FILES['imgToUpload']['name'];
    $imgTmpName = $_FILES['imgToUpload']['tmp_name'];
    $imgSize = $_FILES['imgToUpload']['size'];
    $imgError = $_FILES['imgToUpload']['error'];
    $imgType = $_FILES['imgToUpload']['type'];

    $conv = 0;

    $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
    );

    // Count # of uploaded files in array
    $total = count($_FILES['imgToUpload']['name']);
    // Loop through each file
    for ($i = 0; $i < $total; $i++) {
        // Get image file extension
        $file_extension = pathinfo($_FILES["imgToUpload"]["name"][$i], PATHINFO_EXTENSION);

        if (!file_exists($_FILES['imgToUpload']['tmp_name'][$i])) {
            header("Location: index.php?upload=empty");
            exit();
        }
        if (!in_array($file_extension, $allowed_image_extension)) {
            header("Location: index.php?upload=typeErr");
            exit();
        }

        if (($_FILES["imgToUpload"]["size"][$i] > 20000000)) {
            header("Location: index.php?upload=sizeErr");
            exit();
        }else{
            //Get the temp file path
            $tmpFilePath = $_FILES['imgToUpload']['tmp_name'][$i];

            //Make sure we have a file path
            if ($tmpFilePath != "") {
                $conv = 1;
                //Setup new file path
                $newFilePath = "./uploads/" . $_FILES['imgToUpload']['name'][$i];
                //Upload the file into the temp dir
                move_uploaded_file($tmpFilePath, $newFilePath);
            }else{
                header("Location: index.php?upload=err");
                exit();
            }

            if($conv === 1){
                $newFileConvPath = "./converted/" . "conv_" . $_FILES['imgToUpload']['name'][$i];
                rename($newFilePath, $newFileConvPath);
                header("Location: index.php?upload=success");
            }
        }
    }

}

