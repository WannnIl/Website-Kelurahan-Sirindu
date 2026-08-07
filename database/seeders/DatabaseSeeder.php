<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Official;
use App\Models\Potential;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin Kelurahan',
            'email' => 'admin@sirindu.desa.id',
            'password' => Hash::make('password'),
        ]);

        // Profiles
        Profile::create([
            'title' => 'Sejarah Kelurahan Sirindu',
            'type' => 'history',
            'content' => 'Kelurahan Sirindu adalah kelurahan yang asri dan damai. Berdiri sejak puluhan tahun lalu, kelurahan ini terus berkembang menjadi pusat kegiatan masyarakat yang harmonis dan berbudaya.'
        ]);

        Profile::create([
            'title' => 'Visi dan Misi',
            'type' => 'vision_mission',
            'content' => "<h3>Visi</h3><p>Terwujudnya Kelurahan Sirindu yang Maju, Sejahtera, dan Berbudaya.</p><h3>Misi</h3><ul><li>Meningkatkan kualitas pelayanan publik.</li><li>Mendorong partisipasi masyarakat dalam pembangunan.</li><li>Melestarikan budaya lokal dan potensi daerah.</li></ul>"
        ]);

        // Officials
        \App\Models\Official::truncate(); // Clear existing to prevent duplicates if seeded multiple times
        Official::create([
            'name' => 'Bapak Lurah',
            'position' => 'Lurah',
            'order_number' => 1,
        ]);
        Official::create([
            'name' => 'Bapak Sekkel',
            'position' => 'Sekretaris Kelurahan',
            'order_number' => 2,
        ]);
        Official::create([
            'name' => 'Ibu Kasi Pem',
            'position' => 'Kasi Pemerintahan',
            'order_number' => 3,
        ]);
        Official::create([
            'name' => 'Bapak Kasi Trantib',
            'position' => 'Kasi Trantib',
            'order_number' => 4,
        ]);
        Official::create([
            'name' => 'Ibu Kasi Ekbang',
            'position' => 'Kasi Ekonomi dan Pembangunan',
            'order_number' => 5,
        ]);
        Official::create([
            'name' => 'Bapak Kasi Kesra',
            'position' => 'Kasi Kesejahteraan Masyarakat',
            'order_number' => 6,
        ]);

        // Potentials
        Potential::create([
            'title' => 'Kerajinan Anyaman Bambu',
            'description' => 'Masyarakat Kelurahan Sirindu memiliki keahlian turun-temurun dalam membuat anyaman bambu yang memiliki nilai jual tinggi dan kualitas ekspor.',
        ]);
        Potential::create([
            'title' => 'Wisata Alam Curug',
            'description' => 'Terdapat air terjun alami yang indah dan belum banyak terjamah, berpotensi besar menjadi desa wisata unggulan.',
        ]);

        // Articles / News
        Article::create([
            'title' => 'Kerja Bakti Warga Rutin Mingguan',
            'slug' => Str::slug('Kerja Bakti Warga Rutin Mingguan'),
            'content' => 'Warga kelurahan Sirindu rutin mengadakan kerja bakti setiap hari Minggu pagi untuk menjaga kebersihan dan kenyamanan lingkungan.',
            'published_at' => now(),
        ]);
        Article::create([
            'title' => 'Penyuluhan Kesehatan Masyarakat',
            'slug' => Str::slug('Penyuluhan Kesehatan Masyarakat'),
            'content' => 'Puskesmas setempat mengadakan penyuluhan kesehatan untuk mencegah penyakit demam berdarah di musim penghujan.',
            'published_at' => now(),
        ]);
    }
}
