<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
