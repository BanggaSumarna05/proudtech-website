<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    /** @use HasFactory<\Database\Factories\PortfolioFactory> */
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'problem',
        'solution',
        'result',
        'image',
    ];

    protected $appends = [
        'image_url',
        'image_webp_url',
        'image_avif_url',
        'image_width',
        'image_height',
        'feature_list',
    ];

    public function getImageUrlAttribute(): string
    {
        if (blank($this->image)) {
            return asset('images/portfolio/placeholder.svg');
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        if (Storage::disk('public')->exists($this->image)) {
            return Storage::disk('public')->url($this->image);
        }

        if (file_exists(public_path($this->image))) {
            return asset($this->image);
        }

        return asset('images/portfolio/placeholder.svg');
    }

    public function getImageWebpUrlAttribute(): ?string
    {
        return $this->resolveVariantUrl('webp');
    }

    public function getImageAvifUrlAttribute(): ?string
    {
        return $this->resolveVariantUrl('avif');
    }

    public function getImageWidthAttribute(): int
    {
        return $this->resolveImageDimensions()['width'];
    }

    public function getImageHeightAttribute(): int
    {
        return $this->resolveImageDimensions()['height'];
    }

    public function getFeatureListAttribute(): array
    {
        $lines = collect([
            ...preg_split('/\r\n|\r|\n/', (string) $this->solution),
            ...preg_split('/\r\n|\r|\n/', (string) $this->result),
        ])
            ->map(fn (string $line) => trim(Str::of($line)->replace(['- ', '* '], '')))
            ->filter()
            ->take(4)
            ->values()
            ->all();

        return $lines !== [] ? $lines : [
            'User journey dan struktur penawaran yang lebih jelas',
            'Design system dan pola UI yang reusable',
            'Dashboard operasional dan workflow konten',
            'Metrik launch yang selaras dengan objective bisnis',
        ];
    }

    private function resolveVariantUrl(string $extension): ?string
    {
        if (blank($this->image) || Str::startsWith($this->image, ['http://', 'https://'])) {
            return null;
        }

        $variantPath = pathinfo($this->image, PATHINFO_DIRNAME);
        $variantName = pathinfo($this->image, PATHINFO_FILENAME) . '.' . $extension;
        $variantPath = ($variantPath === '.' ? '' : $variantPath . '/') . $variantName;

        if (Storage::disk('public')->exists($variantPath)) {
            return Storage::disk('public')->url($variantPath);
        }

        if (file_exists(public_path($variantPath))) {
            return asset($variantPath);
        }

        return null;
    }

    private function resolveImageDimensions(): array
    {
        return Cache::rememberForever('portfolio:image-dimensions:' . md5((string) $this->image_url), function () {
            $path = $this->resolveAbsoluteImagePath();

            if (! $path || ! is_file($path)) {
                return ['width' => 1600, 'height' => 900];
            }

            $dimensions = @getimagesize($path);

            if (! is_array($dimensions) || ! isset($dimensions[0], $dimensions[1])) {
                return ['width' => 1600, 'height' => 900];
            }

            return [
                'width' => (int) $dimensions[0],
                'height' => (int) $dimensions[1],
            ];
        });
    }

    private function resolveAbsoluteImagePath(): ?string
    {
        if (blank($this->image) || Str::startsWith($this->image, ['http://', 'https://'])) {
            return null;
        }

        if (Storage::disk('public')->exists($this->image)) {
            return Storage::disk('public')->path($this->image);
        }

        $publicPath = public_path($this->image);

        return is_file($publicPath) ? $publicPath : null;
    }
}
