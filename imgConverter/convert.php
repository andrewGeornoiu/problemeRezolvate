<?php

function isEmptyDir($dir)
{
    $res = scandir($dir);
    if ($res === false) {
        return false;
    }
    return count($res) == 2;
}

if (isEmptyDir('uploads')){
        header("Location: index.php?upload=err&convert=empty");
        exit();
}

$files = scandir("uploads");


for ($a = 2; $a < count($files); $a++){

    $filePath = "uploads/".$files[$a];

        if (str_contains($files[$a], "webp")) {
            $image = imagecreatefromwebp($filePath);
        }elseif (str_contains($files[$a], "avif")){
            $image = imagecreatefromavif($filePath);
        }

    $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
    imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
    imagealphablending($bg, TRUE);
    imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
    imagedestroy($image);
    $quality = 100; // 0 = worst / smaller file, 100 = better / bigger file
    imagejpeg($bg, "converted/" . $files[$a] . ".jpg", $quality);
    imagedestroy($bg);
    unlink($filePath);
    header("Location: index.php?upload=success&convert=ok");
}

