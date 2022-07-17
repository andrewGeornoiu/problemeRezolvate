<?php

function isEmptyDir($dir)
{
    $res = scandir($dir);
    if ($res === false) {
        return false;
    }
    return count($res) == 2;
}


$filePath = "uploads/conv_2.webp";
$image = imagecreatefromwebp($filePath);
$bg = imagecreatetruecolor(imagesx($image), imagesy($image));
imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
imagealphablending($bg, TRUE);
imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
imagedestroy($image);
$quality = 100; // 0 = worst / smaller file, 100 = better / bigger file
imagejpeg($bg, "converted/" . rand(1,7) . ".jpg", $quality);
imagedestroy($bg);

header("Location: index.php?upload=success&convert");
