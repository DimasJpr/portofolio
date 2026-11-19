<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin User
        User::firstOrCreate(
            ['email' => 'admin@dimas.dev'],
            [
                'name' => 'Muhammad Dimas Prasetyo',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Skills
        $skills = [
            [
                'name' => 'HTML',
                'category' => 'Frontend',
                'proficiency' => 95,
                'icon' => 'bi-filetype-html',
                'order' => 1,
            ],
            [
                'name' => 'CSS',
                'category' => 'Frontend',
                'proficiency' => 90,
                'icon' => 'bi-filetype-css',
                'order' => 2,
            ],
            [
                'name' => 'JavaScript',
                'category' => 'Frontend',
                'proficiency' => 82,
                'icon' => 'bi-filetype-js',
                'order' => 3,
            ],
            [
                'name' => 'PHP',
                'category' => 'Backend',
                'proficiency' => 85,
                'icon' => 'bi-filetype-php',
                'order' => 4,
            ],
            [
                'name' => 'Laravel',
                'category' => 'Backend',
                'proficiency' => 84,
                'icon' => 'bi-layers-fill',
                'order' => 5,
            ],
            [
                'name' => 'MySQL',
                'category' => 'Database',
                'proficiency' => 80,
                'icon' => 'bi-database-fill',
                'order' => 6,
            ],
            [
                'name' => 'Git & GitHub',
                'category' => 'Tools',
                'proficiency' => 85,
                'icon' => 'bi-git',
                'order' => 7,
            ],
            [
                'name' => 'UI/UX Design',
                'category' => 'Design',
                'proficiency' => 78,
                'icon' => 'bi-palette-fill',
                'order' => 8,
            ],
        ];

        foreach ($skills as $skill) {
            Skill::firstOrCreate(['name' => $skill['name']], $skill);
        }

        // 3. Projects
        $projects = [
            [
                'title' => 'Catat Uang',
                'slug' => 'catat-uang',
                'category' => 'Web Development',
                'description' => 'Aplikasi pencatatan keuangan harian modern untuk mencatat arus kas, pemasukan, dan pengeluaran secara terstruktur dengan visualisasi grafik.',
                'thumbnail' => null,
                'tech_stack' => ['Laravel', 'MySQL', 'Tailwind CSS', 'Alpine.js'],
                'live_url' => 'https://example.com/catat-uang',
                'github_url' => 'https://github.com/dimasprasetyo/catat-uang',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Tabungan Pintar',
                'slug' => 'tabungan-pintar',
                'category' => 'Web Development',
                'description' => 'Sistem pengelolaan tabungan dengan fitur target finansial (goals), pengingat setoran berkala, dan histori transaksi yang aman.',
                'thumbnail' => null,
                'tech_stack' => ['PHP', 'Laravel', 'Bootstrap 5', 'MySQL'],
                'live_url' => 'https://example.com/tabungan-pintar',
                'github_url' => 'https://github.com/dimasprasetyo/tabungan-pintar',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'The Quiz',
                'slug' => 'the-quiz',
                'category' => 'Web Development',
                'description' => 'Platform kuis edukatif interaktif dengan timer dinamis, scoring instan, leaderboard, dan animasi antarmuka yang menarik untuk siswa.',
                'thumbnail' => null,
                'tech_stack' => ['JavaScript', 'HTML5', 'CSS3', 'Laravel API'],
                'live_url' => 'https://example.com/the-quiz',
                'github_url' => 'https://github.com/dimasprasetyo/the-quiz',
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'title' => 'Personal Portfolio',
                'slug' => 'personal-portfolio',
                'category' => 'UI/UX Design',
                'description' => 'Desain website portfolio modern minimalist dengan tema dark mode, glassmorphism card, glowing accent, dan layout responsif untuk web developer.',
                'thumbnail' => null,
                'tech_stack' => ['Figma', 'UI/UX', 'Tailwind CSS', 'Blade'],
                'live_url' => 'https://example.com/portfolio',
                'github_url' => 'https://github.com/dimasprasetyo/personal-portfolio',
                'is_featured' => true,
                'order' => 4,
            ],
        ];

        foreach ($projects as $project) {
            Project::firstOrCreate(['slug' => $project['slug']], $project);
        }

        // 4. Sample Message
        Message::firstOrCreate(
            ['email' => 'client@example.com'],
            [
                'name' => 'Budi Santoso',
                'subject' => 'Ajakan Kerjasama Proyek Web',
                'message' => 'Halo Dimas, saya melihat karya portofolio Anda dan sangat tertarik untuk bekerjasama membangun aplikasi web sekolah kami.',
                'is_read' => false,
                'ip_address' => '127.0.0.1',
            ]
        );

        // 5. Visitor Analytics (7 hari terakhir)
        if (\Illuminate\Support\Facades\Schema::hasTable('visitors')) {
            $sampleVisits = [
                ['days_ago' => 6, 'count' => 14],
                ['days_ago' => 5, 'count' => 22],
                ['days_ago' => 4, 'count' => 18],
                ['days_ago' => 3, 'count' => 35],
                ['days_ago' => 2, 'count' => 28],
                ['days_ago' => 1, 'count' => 42],
                ['days_ago' => 0, 'count' => 56],
            ];

            foreach ($sampleVisits as $visit) {
                $date = now()->subDays($visit['days_ago'])->toDateString();
                for ($i = 1; $i <= $visit['count']; $i++) {
                    \App\Models\Visitor::firstOrCreate([
                        'ip_address' => '192.168.1.'.$i,
                        'visited_date' => $date,
                    ], [
                        'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                        'page' => '/',
                    ]);
                }
            }
        }
    }
}
