<?php
// utils/ImageOptimizer.php
class ImageOptimizer {
    public static function optimizeImage($src_path, $dest_path, $quality = 75) {
        $info = getimagesize($src_path);
        
        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($src_path);
            imagejpeg($image, $dest_path, $quality);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($src_path);
            imagepng($image, $dest_path, round(9 * $quality / 100));
        } elseif ($info['mime'] == 'image/webp') {
            $image = imagecreatefromwebp($src_path);
            imagewebp($image, $dest_path, $quality);
        } else {
            return false;
        }
        
        imagedestroy($image);
        return true;
    }
}
?>