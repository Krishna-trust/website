<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OptimizeImages extends Command
{
    protected $signature   = 'images:optimize
                                {--dir=images : Subfolder inside public/ to scan}
                                {--max-width=1920 : Maximum width in pixels}
                                {--quality=80 : JPEG quality (1-100)}';

    protected $description = 'Compress and resize large images in the public folder';

    public function handle(): int
    {
        $dir      = public_path($this->option('dir'));
        $maxWidth = (int) $this->option('max-width');
        $quality  = (int) $this->option('quality');

        if (! is_dir($dir)) {
            $this->error("Directory not found: {$dir}");
            return self::FAILURE;
        }

        $extensions = ['jpg', 'jpeg', 'png'];
        $files      = $this->collectImages($dir, $extensions);

        if (empty($files)) {
            $this->info('No images found.');
            return self::SUCCESS;
        }

        $this->info('Found ' . count($files) . ' image(s). Optimizing...');
        $this->newLine();

        $saved = 0;
        $bar   = $this->output->createProgressBar(count($files));
        $bar->start();

        foreach ($files as $filePath) {
            $before = filesize($filePath);
            $ext    = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

            $source = $this->createGdImage($filePath, $ext);

            if (! $source) {
                $bar->advance();
                continue;
            }

            $origWidth  = imagesx($source);
            $origHeight = imagesy($source);

            if ($origWidth > $maxWidth) {
                $ratio     = $maxWidth / $origWidth;
                $newWidth  = $maxWidth;
                $newHeight = (int) round($origHeight * $ratio);
                $canvas    = imagecreatetruecolor($newWidth, $newHeight);

                if ($ext === 'png') {
                    imagealphablending($canvas, false);
                    imagesavealpha($canvas, true);
                    $transparent = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
                    imagefilledrectangle($canvas, 0, 0, $newWidth, $newHeight, $transparent);
                }

                imagecopyresampled($canvas, $source, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
                imagedestroy($source);
                $source = $canvas;
            }

            if ($ext === 'png') {
                imagepng($source, $filePath, 6);
            } else {
                imagejpeg($source, $filePath, $quality);
            }

            imagedestroy($source);
            clearstatcache(true, $filePath);

            $after = filesize($filePath);
            $saved += max(0, $before - $after);

            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);
        $this->info('Done! Saved approximately ' . $this->formatBytes($saved) . ' total.');

        return self::SUCCESS;
    }

    private function collectImages(string $dir, array $extensions): array
    {
        $files = [];

        foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir)) as $file) {
            if (! $file->isFile()) {
                continue;
            }
            if (in_array(strtolower($file->getExtension()), $extensions, true)) {
                $files[] = $file->getRealPath();
            }
        }

        return $files;
    }

    private function createGdImage(string $path, string $ext)
    {
        return match ($ext) {
            'jpg', 'jpeg' => @imagecreatefromjpeg($path),
            'png'         => @imagecreatefrompng($path),
            default       => false,
        };
    }

    private function formatBytes(int $bytes): string
    {
        if ($bytes >= 1_048_576) {
            return round($bytes / 1_048_576, 2) . ' MB';
        }
        if ($bytes >= 1_024) {
            return round($bytes / 1_024, 1) . ' KB';
        }
        return $bytes . ' B';
    }
}
