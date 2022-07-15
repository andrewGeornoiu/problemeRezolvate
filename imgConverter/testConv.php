<?php
require "ImageToWebp.php";

$conv = new ImageToWebp(); // Instantiate the object.

// Pass the source and destination
$conv->convert( 'uploads/2.webp', 'converted/2_conv.jpg', 100);
$conv->convert( 'uploads/3.png', 'converted/3_conv.jpg');
