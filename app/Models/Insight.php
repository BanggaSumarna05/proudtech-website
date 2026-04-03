<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        return $this->image ? Storage::url($this->image) : 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop';
    }
}
