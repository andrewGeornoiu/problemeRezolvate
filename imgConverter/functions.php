<?php
/**
 *   Auxiliar function to convert images to JPG
 */
function convertImage($originalImage, $outputImage, $quality) {

    switch (exif_imagetype($originalImage)) {
        case IMAGETYPE_PNG:
            $imageTmp=imagecreatefrompng($originalImage);
            break;
        case IMAGETYPE_JPEG:
            $imageTmp=imagecreatefromjpeg($originalImage);
            break;
        case IMAGETYPE_GIF:
            $imageTmp=imagecreatefromgif($originalImage);
            break;
        // Defaults to JPG
        default:
            $imageTmp=imagecreatefromjpeg($originalImage);
            break;
    }
    // quality is a value from 0 (worst) to 100 (best)
    imagejpeg($imageTmp, $outputImage, $quality);
    imagedestroy($imageTmp);

    return 1;
}