<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::saving(function (Model $model): void {
            $source = $model->slugSourceColumn();
            $slugColumn = $model->slugColumn();
            $currentSlug = (string) $model->{$slugColumn};

            if (blank($model->{$source})) {
                return;
            }

            if ($model->isDirty($slugColumn) && filled($currentSlug)) {
                $model->{$slugColumn} = static::generateUniqueSlug(
                    source: $currentSlug,
                    ignoreKey: $model->getKey(),
                    slugColumn: $slugColumn,
                );

                return;
            }

            if (blank($currentSlug) || ($model->isDirty($source) && ! $model->isDirty($slugColumn))) {
                $model->{$slugColumn} = static::generateUniqueSlug(
                    source: $model->{$source},
                    ignoreKey: $model->getKey(),
                    slugColumn: $slugColumn,
                );
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return $this->slugColumn();
    }

    protected function slugSourceColumn(): string
    {
        return 'title';
    }

    protected function slugColumn(): string
    {
        return 'slug';
    }

    protected static function generateUniqueSlug(
        string $source,
        mixed $ignoreKey = null,
        string $slugColumn = 'slug',
    ): string {
        $slug = Str::slug($source);
        $baseSlug = $slug !== '' ? $slug : Str::lower(Str::random(8));
        $slug = $baseSlug;
        $iteration = 1;

        while (static::query()
            ->when($ignoreKey, fn ($query) => $query->whereKeyNot($ignoreKey))
            ->where($slugColumn, $slug)
            ->exists()) {
            $slug = "{$baseSlug}-{$iteration}";
            $iteration++;
        }

        return $slug;
    }
}
