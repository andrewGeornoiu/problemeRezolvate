<?php
//// Get real path for our folder
//$rootPath = realpath('converted/');
//
//// Initialize archive object
//$zip = new ZipArchive();
//$zip->open('file.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
//
//// Create recursive directory iterator
///** @var SplFileInfo[] $files */
//$files = new RecursiveIteratorIterator(
//    new RecursiveDirectoryIterator($rootPath),
//    RecursiveIteratorIterator::LEAVES_ONLY
//);
//
//foreach ($files as $name => $file)
//{
//    // Skip directories (they would be added automatically)
//    if (!$file->isDir())
//    {
//        // Get real and relative path for current file
//        $filePath = $file->getRealPath();
//        $relativePath = substr($filePath, strlen($rootPath) + 1);
//
//        // Add current file to archive
//        $zip->addFile($filePath, $relativePath);
//    }
//}
//
//// Zip archive will be created only after closing object
//$zip->close();
//
//header("Location: index.php?upload=success&convert=ok");
//header('Content-Description: File Transfer');
//header('Content-Type: application/octet-stream');
//header('Content-Disposition: attachment; filename='.basename($file));
//header('Content-Transfer-Encoding: binary');
//header('Expires: 0');
//header('Cache-Control: must-revalidate');
//header('Pragma: public');
//header('Content-Length: ' . filesize($file));
//readfile($file);

$dir = 'converted/';
$zip_file = 'images.zip';

// Get real path for our folder
$rootPath = realpath($dir);

// Initialize archive object
$zip = new ZipArchive();
$zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();

header("Location: index.php?upload");
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($zip_file));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($zip_file));
readfile($zip_file);
