<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory;

    protected $fillable = [
        'site_name',
        'hero_title',
        'hero_subtitle',
        'whatsapp_number',
        'email',
    ];

    public static function defaults(): array
    {
        return [
            'site_name' => 'Proud Tech',
            'hero_title' => 'Kami merancang dan membangun produk digital yang membuat brand ambisius tampil lebih serius.',
            'hero_subtitle' => 'Website premium, sistem custom, dan pengalaman produk yang fokus pada konversi untuk bisnis yang ingin tumbuh dengan arah yang jelas.',
            'whatsapp_number' => '6281234567890',
            'email' => 'hello@proudtech.id',
        ];
    }
}
