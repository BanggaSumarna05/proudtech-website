<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'title' => 'Fintrack SaaS Landing & CRM',
                'slug' => 'fintrack-saas-landing-crm',
                'description' => 'Website penghasil lead dan CRM internal untuk startup software finansial B2B yang masuk ke pasar kompetitif.',
                'problem' => implode(PHP_EOL, [
                    'Perusahaan memiliki produk yang potensial tetapi belum punya cerita digital yang jelas.',
                    'Tim sales masih bergantung pada follow-up manual dan data lead yang tersebar.',
                    'Halaman lama terlihat generik dan gagal membangun kepercayaan bagi calon klien enterprise.',
                ]),
                'solution' => implode(PHP_EOL, [
                    'Kami merapikan positioning penawaran dengan messaging yang lebih jelas dan arsitektur website yang lebih premium.',
                    'Modul CRM berbasis Laravel memusatkan inquiry, status lead, dan catatan konsultasi.',
                    'Sistem UI dibuat dengan hirarki visual yang lebih bersih dan CTA yang lebih tegas.',
                ]),
                'result' => implode(PHP_EOL, [
                    'Permintaan konsultasi berkualitas naik 2,4x dalam enam minggu pertama.',
                    'Operasional sales menjadi lebih cepat karena follow-up pindah ke satu dashboard.',
                    'Brand tampil lebih kredibel untuk membuka percakapan bernilai lebih tinggi.',
                ]),
                'image' => 'images/portfolio/fintrack.svg',
            ],
            [
                'title' => 'Medigo Clinic Digital Experience',
                'slug' => 'medigo-clinic-digital-experience',
                'description' => 'Pengalaman website klinik modern yang fokus pada konversi appointment dan kejelasan layanan.',
                'problem' => implode(PHP_EOL, [
                    'Pasien kesulitan memahami layanan dan cara melakukan booking.',
                    'Klinik bergantung pada chat WhatsApp tanpa alur pra-konsultasi yang terstruktur.',
                    'Sinyal kepercayaan dan kredibilitas dokter tenggelam di dalam blok teks yang panjang.',
                ]),
                'solution' => implode(PHP_EOL, [
                    'Kami mendesain ulang hirarki konten agar fokus pada spesialisasi, kepercayaan, dan akses booking yang cepat.',
                    'Form intake konsultasi membantu mengumpulkan konteks kasus sebelum tim melakukan follow-up.',
                    'Arah visual dibuat lebih lembut tanpa kehilangan kesan premium khas layanan kesehatan.',
                ]),
                'result' => implode(PHP_EOL, [
                    'Bounce rate turun setelah launch karena pengunjung lebih cepat menemukan layanan yang tepat.',
                    'Tim klinik mengurangi pertanyaan berulang saat handoff ke chat.',
                    'Antarmuka baru membantu membangun kepercayaan lebih kuat pada kunjungan pertama.',
                ]),
                'image' => 'images/portfolio/medigo.svg',
            ],
            [
                'title' => 'Atlas Property Showcase Platform',
                'slug' => 'atlas-property-showcase-platform',
                'description' => 'Platform presentasi properti berbasis portfolio untuk developer real estate boutique.',
                'problem' => implode(PHP_EOL, [
                    'Listing tersebar di media sosial dan brosur PDF.',
                    'Calon pembeli tidak bisa membandingkan value project, lokasi, dan fasilitas dengan efisien.',
                    'Tim sales membutuhkan pusat presentasi yang terasa premium, bukan seperti template biasa.',
                ]),
                'solution' => implode(PHP_EOL, [
                    'Kami merancang platform showcase terstruktur dengan halaman project bergaya portfolio yang lebih terkurasi.',
                    'Setiap cerita properti menyoroti masalah, value, opsi unit, dan bukti visual.',
                    'Alur inquiry yang lebih rapi memperbaiki handoff ke pipeline tim sales.',
                ]),
                'result' => implode(PHP_EOL, [
                    'Presentasi properti menjadi lebih persuasif saat dipakai di campaign digital.',
                    'Tim sales memiliki satu destination utama untuk dibagikan ke warm leads.',
                    'Persepsi brand bergeser dari sekadar brosur menjadi lebih premium dan product-led.',
                ]),
                'image' => 'images/portfolio/atlas.svg',
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::query()->updateOrCreate(
                ['slug' => $portfolio['slug']],
                $portfolio,
            );
        }
    }
}
