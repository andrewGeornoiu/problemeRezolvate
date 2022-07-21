<?php

if (isset($_POST['upload'])){

    $img = $_FILES['imgToUpload'];

    $imgName = $_FILES['imgToUpload']['name'];
    $imgTmpName = $_FILES['imgToUpload']['tmp_name'];
    $imgSize = $_FILES['imgToUpload']['size'];
    $imgError = $_FILES['imgToUpload']['error'];
    $imgType = $_FILES['imgToUpload']['type'];

    $allowed_image_extension = array(
        "jfif",
        "webp",
        "avif"
    );

    // Count # of uploaded files in array
    $total = count($_FILES['imgToUpload']['name']);
    // Loop through each file
    for ($i = 0; $i < $total; $i++) {
        // Get image file extension
        $file_extension = pathinfo($_FILES["imgToUpload"]["name"][$i], PATHINFO_EXTENSION);

        if (!file_exists($imgTmpName[$i])) {
            header("Location: index.php?upload=empty");
            exit();
        }
        if (!in_array($file_extension, $allowed_image_extension)) {
            header("Location: index.php?upload=typeErr");
            exit();
        }

        if (($imgSize[$i] > 20000000)) {
            header("Location: index.php?upload=sizeErr");
            exit();
        }
        //Get the temp file path
        $tmpFilePath =  $imgTmpName[$i];

        //Make sure we have a file path
        if ($tmpFilePath == "") {
            header("Location: index.php?upload=err");
            exit();
        }

//       $conv = 1;
        //Setup new file path
        $newFileConvPath = "./uploads/" . "conv_" . $imgName[$i];
        move_uploaded_file($tmpFilePath, $newFileConvPath);

        header("Location: index.php?upload=success");

//        if($conv === 1){
//            //Upload the file into the temp dir
//            $newFileConvPath = "./converted/" . "conv_" . $_FILES['imgToUpload']['name'][$i];
//            rename($newFilePath, $newFileConvPath);
//            header("Location: index.php?upload=success");
//        }

    }

}

