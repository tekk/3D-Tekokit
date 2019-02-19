<?php

function die404() {
	header("Location: 404.php");
	die();
}

function generateThumbnail($img, $width, $height, $quality = 89)
{
    if (is_file($img)) {
        $imagick = new Imagick(realpath($img));
        $imagick->setImageFormat('jpeg');
        $imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
        $imagick->setImageCompressionQuality($quality);
        $imagick->thumbnailImage($width, $height, false, false);
        $filename = str_replace('uploads/', "uploads/thumb/", $img);
        if (file_put_contents($filename, $imagick) === false) {
            throw new Exception("Could not put contents.");
        }
        return true;
    }
    else {
        throw new Exception("No valid image provided with {$img}.");
    }
}

?>