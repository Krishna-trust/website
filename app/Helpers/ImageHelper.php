<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageHelper
{
    /**
     * Compress, resize, and store an uploaded image.
     *
     * @param  UploadedFile  $file
     * @param  string        $folder   Subfolder inside storage/app/public
     * @param  int           $maxWidth Maximum width in pixels (default 1200)
     * @param  int           $quality  JPEG quality 1-100 (default 80)
     * @return string        Relative path for Storage::url()
     */
    public static function compressAndStore(
        UploadedFile $file,
        string $folder,
        int $maxWidth = 1200,
        int $quality  = 80
    ): string {
        $extension = strtolower($file->getClientOriginalExtension());

        // GIF: animated frames break with GD — store as-is
        if ($extension === 'gif') {
            return $file->store($folder, 'public');
        }

        $source = self::createGdImage($file->getPathname(), $extension);

        // GD unavailable or unrecognised format — fallback to plain store
        if (! $source) {
            return $file->store($folder, 'public');
        }

        $origWidth  = imagesx($source);
        $origHeight = imagesy($source);

        // Resize proportionally if wider than $maxWidth
        if ($origWidth > $maxWidth) {
            $ratio     = $maxWidth / $origWidth;
            $newWidth  = $maxWidth;
            $newHeight = (int) round($origHeight * $ratio);
            $canvas    = imagecreatetruecolor($newWidth, $newHeight);

            // Keep alpha for PNG
            if ($extension === 'png') {
                imagealphablending($canvas, false);
                imagesavealpha($canvas, true);
                $transparent = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
                imagefilledrectangle($canvas, 0, 0, $newWidth, $newHeight, $transparent);
            }

            imagecopyresampled($canvas, $source, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
            imagedestroy($source);
            $source = $canvas;
        }

        // Ensure the storage folder exists
        $storagePath = storage_path("app/public/{$folder}");
        if (! is_dir($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        if ($extension === 'png') {
            $filename = Str::random(40) . '.png';
            $fullPath = "{$storagePath}/{$filename}";
            imagepng($source, $fullPath, 6); // 0-9 compression level
        } else {
            $filename = Str::random(40) . '.jpg';
            $fullPath = "{$storagePath}/{$filename}";
            imagejpeg($source, $fullPath, $quality);
        }

        imagedestroy($source);

        return "{$folder}/{$filename}";
    }

    private static function createGdImage(string $path, string $extension)
    {
        return match ($extension) {
            'jpg', 'jpeg' => @imagecreatefromjpeg($path),
            'png'         => @imagecreatefrompng($path),
            'webp'        => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($path) : false,
            default       => false,
        };
    }
}
