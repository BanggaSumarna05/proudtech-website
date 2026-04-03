<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'price_range',
        'icon',
    ];

    protected $appends = [
        'feature_list',
        'benefit_list',
        'problem_statement',
        'solution_statement',
    ];

    public function getFeatureListAttribute(): array
    {
        $lines = collect(preg_split('/\r\n|\r|\n/', (string) $this->content))
            ->map(fn (string $line) => trim(Str::of($line)->replace(['- ', '* '], '')))
            ->filter()
            ->take(4)
            ->values()
            ->all();

        if ($lines !== []) {
            return $lines;
        }

        return match (true) {
            str_contains($this->slug, 'web') => [
                'Landing page dan website company profile yang fokus pada konversi',
                'Workflow publishing berbasis CMS untuk tim internal',
                'Performa cepat dan pengalaman mobile yang responsif',
                'Struktur SEO-ready untuk pertumbuhan jangka panjang',
            ],
            str_contains($this->slug, 'app') => [
                'Perencanaan MVP yang efisien untuk Android dan iOS',
                'Integrasi API dan analytics produk yang andal',
                'Flow produk yang jelas untuk meningkatkan retensi pengguna',
                'Rencana rilis dengan milestone yang terukur',
            ],
            default => [
                'Workshop discovery yang selaras dengan tujuan bisnis',
                'Roadmap eksekusi dengan fase delivery yang transparan',
                'Dukungan lintas fungsi untuk product, design, dan engineering',
                'Iterasi pasca-launch berdasarkan data penggunaan nyata',
            ],
        };
    }

    public function getBenefitListAttribute(): array
    {
        return [
            'Positioning yang lebih tajam agar penawaran lebih mudah dipahami',
            'Delivery lebih cepat lewat scope dan sprint yang jelas',
            'Codebase dan struktur konten yang scalable untuk tim Anda',
            'UX yang fokus pada konversi agar traffic berubah jadi percakapan penjualan',
        ];
    }

    public function getProblemStatementAttribute(): string
    {
        return "Banyak project {$this->title} gagal karena scope tidak jelas, tampilan terasa generik, dan proses delivery tidak terhubung dengan target bisnis.";
    }

    public function getSolutionStatementAttribute(): string
    {
        return Str::limit(strip_tags($this->content), 220, '...');
    }
}
