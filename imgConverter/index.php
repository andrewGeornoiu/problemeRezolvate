<?php
ob_start();

$URI = $_SERVER['REQUEST_URI'];

if(!empty($_POST)){
    //magic
    header("location:$URI");
}

$err = [];
$success = '';

if(!isset($_GET['upload'])){
    exit();
}else{
    $uploadCheck = $_GET['upload'];

    if ($uploadCheck == "empty"){
        $err[] ='Upload cannot be empty!';
    }
    if ($uploadCheck == "err"){
        $err[] ='There was a problem with your file';
    }
    if ($uploadCheck == "typeErr"){
        $err[] ='Only jpg, jpeg, png and gif file are accepted';
    }
    if ($uploadCheck == "sizeErr"){
        $err[] ='Image size too big';
    }

    if ($uploadCheck == "success"){
        $success ='Image uploaded';
    }

}

?>

<html lang="">
<head>
    <title>First page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">

        <form action="upload.php" method="post" class="col-6 mt-5" enctype="multipart/form-data">
            <span class="text-danger">
            <?php
            if($uploadCheck !== "success"){
                foreach ($err as $errors){
                    echo $errors . "<br>";
                }
            }
            ?>
            </span>

            <span class="text-success fw-bold">
                <?php
                if($uploadCheck == "success"){
                    // This will return all files in that folder
                    $files = scandir("converted");
                    // If you are using windows, first 2 indexes are "." and "..",
                    for ($a = 2; $a < count($files); $a++){
                        ?>
                        <p>
                            <!-- Displaying file name !-->
                            <?php echo $files[$a]; ?>
                            <!-- href should be complete file path !-->
                            <!-- download attribute should be the name after it downloads !-->
                                 <a href="converted/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>"> Download</a>
                        </p>
                        <?php
                    }
                }
                ?>
            </span>

            Select image to upload:
            <input type="file" name="imgToUpload[]" class="form-control mb-3" id="fileToUpload" multiple="multiple">
            <input type="submit" class="btn btn-dark" value="Upload & Convert" name="upload">


        </form>


</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>

</html>




