<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Pengembangan Website Custom',
                'slug' => 'custom-website-development',
                'description' => 'Website company profile, landing page, dan website marketing premium yang dirancang untuk mengubah pengunjung menjadi lead berkualitas.',
                'content' => implode(PHP_EOL, [
                    'Workshop strategi untuk merumuskan penawaran, user journey, dan struktur konten.',
                    'Sistem UI dengan arah visual premium, motion, dan konsistensi komponen.',
                    'CMS Laravel atau workflow operasional agar tim internal dapat mengelola konten dengan mudah.',
                    'Implementasi performa, SEO, dan analytics sejak awal project.',
                ]),
                'price_range' => '10 - 25 juta IDR',
                'icon' => 'code',
            ],
            [
                'title' => 'Sistem Web App & Dashboard',
                'slug' => 'web-app-dashboard-systems',
                'description' => 'Tools internal, sistem booking, alur CRM, dan dashboard admin yang dirancang berdasarkan operasional bisnis yang nyata.',
                'content' => implode(PHP_EOL, [
                    'Pemetaan proses bisnis untuk mengurangi pekerjaan yang tidak efisien sebelum coding dimulai.',
                    'Dashboard berbasis role, alur data, dan autentikasi yang aman.',
                    'Arsitektur Laravel yang scalable dengan modul admin yang mudah dirawat.',
                    'Reporting dan visibilitas lead agar keputusan manajemen lebih cepat.',
                ]),
                'price_range' => '15 - 40 juta IDR',
                'icon' => 'chart',
            ],
            [
                'title' => 'Desain Produk UI/UX',
                'slug' => 'ui-ux-product-design',
                'description' => 'Desain antarmuka yang fokus pada konversi untuk produk yang membutuhkan kejelasan, kepercayaan, dan retensi pengguna yang lebih kuat.',
                'content' => implode(PHP_EOL, [
                    'Interview discovery dan framing produk berdasarkan target bisnis.',
                    'Wireframe dan konsep antarmuka matang dengan hirarki yang jelas.',
                    'Aset design system untuk iterasi cepat dan handoff ke tim engineering.',
                    'Validasi prototype sebelum development dimulai.',
                ]),
                'price_range' => '8 - 18 juta IDR',
                'icon' => 'spark',
            ],
            [
                'title' => 'Dukungan Brand & Launch Digital',
                'slug' => 'brand-digital-launch-support',
                'description' => 'Positioning penawaran, messaging, dan aset launch untuk brand yang membutuhkan kehadiran pasar yang lebih tajam.',
                'content' => implode(PHP_EOL, [
                    'Penyempurnaan positioning dan value proposition.',
                    'Implementasi identitas digital di website, sales deck, dan aset kampanye.',
                    'Perencanaan konten launch dan strategi CTA.',
                    'Dukungan operasional untuk fase pertumbuhan awal setelah rilis.',
                ]),
                'price_range' => '12 - 22 juta IDR',
                'icon' => 'briefcase',
            ],
        ];

        foreach ($services as $service) {
            Service::query()->updateOrCreate(
                ['slug' => $service['slug']],
                $service,
            );
        }
    }
}
