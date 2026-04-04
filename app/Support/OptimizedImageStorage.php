<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OptimizedImageStorage
{
    public static function store(UploadedFile $file, string $directory, string $disk = 'public'): string
    {
        $extension = strtolower($file->getClientOriginalExtension() ?: $file->extension() ?: 'jpg');
        $filename = Str::uuid()->toString();
        $path = $directory . '/' . $filename . '.' . $extension;

        Storage::disk($disk)->putFileAs($directory, $file, $filename . '.' . $extension);

        self::generateVariants(Storage::disk($disk)->path($path));

        return $path;
    }

    public static function generateVariants(string $absolutePath): void
    {
        if (! is_file($absolutePath)) {
            return;
        }

        $imageInfo = @getimagesize($absolutePath);

        if (! is_array($imageInfo) || ! isset($imageInfo[2])) {
            return;
        }

        $image = self::createImageResource($absolutePath, (int) $imageInfo[2]);

        if (! $image) {
            return;
        }

        imagepalettetotruecolor($image);
        imagealphablending($image, true);
        imagesavealpha($image, true);

        $basePath = pathinfo($absolutePath, PATHINFO_DIRNAME) . DIRECTORY_SEPARATOR . pathinfo($absolutePath, PATHINFO_FILENAME);

        if (function_exists('imagewebp')) {
            imagewebp($image, $basePath . '.webp', 82);
        }

        if (function_exists('imageavif')) {
            imageavif($image, $basePath . '.avif', 65);
        }

        imagedestroy($image);
    }

    private static function createImageResource(string $absolutePath, int $imageType)
    {
        return match ($imageType) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($absolutePath),
            IMAGETYPE_PNG => imagecreatefrompng($absolutePath),
            IMAGETYPE_WEBP => function_exists('imagecreatefromwebp') ? imagecreatefromwebp($absolutePath) : null,
            IMAGETYPE_AVIF => function_exists('imagecreatefromavif') ? imagecreatefromavif($absolutePath) : null,
            default => self::createFromString($absolutePath),
        };
    }

    private static function createFromString(string $absolutePath)
    {
        $contents = @file_get_contents($absolutePath);

        if ($contents === false) {
            return null;
        }

        return @imagecreatefromstring($contents) ?: null;
    }
}
