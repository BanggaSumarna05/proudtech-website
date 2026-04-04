<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Insight extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected $appends = [
        'image_url',
        'image_webp_url',
        'image_avif_url',
        'image_width',
        'image_height',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($insight) {
            if (empty($insight->slug)) {
                $insight->slug = Str::slug($insight->title);
            }
        });

        static::updating(function ($insight) {
            if ($insight->isDirty('title') && empty($insight->slug)) {
                $insight->slug = Str::slug($insight->title);
            }
        });
    }

    public function getImageUrlAttribute(): string
    {
        return $this->image && Storage::disk('public')->exists($this->image)
            ? Storage::disk('public')->url($this->image)
            : asset('images/portfolio/placeholder.svg');
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

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('is_published', true)
            ->where(function (Builder $builder) {
                $builder
                    ->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    private function resolveVariantUrl(string $extension): ?string
    {
        if (blank($this->image) || ! Storage::disk('public')->exists($this->image)) {
            return null;
        }

        $variantPath = pathinfo($this->image, PATHINFO_DIRNAME);
        $variantName = pathinfo($this->image, PATHINFO_FILENAME) . '.' . $extension;
        $variantPath = ($variantPath === '.' ? '' : $variantPath . '/') . $variantName;

        return Storage::disk('public')->exists($variantPath)
            ? Storage::disk('public')->url($variantPath)
            : null;
    }

    private function resolveImageDimensions(): array
    {
        return Cache::rememberForever('insight:image-dimensions:' . md5((string) $this->image_url), function () {
            if (! $this->image || ! Storage::disk('public')->exists($this->image)) {
                return ['width' => 1600, 'height' => 900];
            }

            $dimensions = @getimagesize(Storage::disk('public')->path($this->image));

            if (! is_array($dimensions) || ! isset($dimensions[0], $dimensions[1])) {
                return ['width' => 1600, 'height' => 900];
            }

            return [
                'width' => (int) $dimensions[0],
                'height' => (int) $dimensions[1],
            ];
        });
    }
}
