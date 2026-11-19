<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Visitor;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan overview dashboard admin dengan data riil dari database.
     */
    public function index(): View
    {
        // 1. Kartu Statistik Utama
        $stats = [
            'total_projects' => Schema::hasTable('projects') ? Project::count() : 0,
            'total_skills' => Schema::hasTable('skills') ? Skill::count() : 0,
            'total_messages' => Schema::hasTable('messages') ? Message::count() : 0,
            'unread_messages' => Schema::hasTable('messages') ? Message::where('is_read', false)->count() : 0,
            'total_visitors' => Schema::hasTable('visitors') ? Visitor::count() : 0,
            'today_visitors' => Schema::hasTable('visitors') ? Visitor::whereDate('visited_date', now()->toDateString())->count() : 0,
        ];

        // 2. Data Grafik Statistik 7 Hari Terakhir
        $chartLabels = [];
        $chartVisitors = [];
        $chartMessages = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dateString = $date->toDateString();
            $chartLabels[] = $date->translatedFormat('d M');

            $chartVisitors[] = Schema::hasTable('visitors')
                ? Visitor::whereDate('visited_date', $dateString)->count()
                : 0;

            $chartMessages[] = Schema::hasTable('messages')
                ? Message::whereDate('created_at', $dateString)->count()
                : 0;
        }

        // 3. Pesan Terkini & Notifikasi
        $recentMessages = Schema::hasTable('messages')
            ? Message::latest()->take(5)->get()
            : collect();

        $unreadNotifications = Schema::hasTable('messages')
            ? Message::where('is_read', false)->latest()->take(4)->get()
            : collect();

        // 4. Proyek Terkini
        $recentProjects = Schema::hasTable('projects')
            ? Project::latest()->take(4)->get()
            : collect();

        // 5. Daftar Skills Terkini
        $skills = Schema::hasTable('skills')
            ? Skill::orderBy('order')->take(8)->get()
            : collect();

        return view('admin.dashboard', compact(
            'stats',
            'chartLabels',
            'chartVisitors',
            'chartMessages',
            'recentMessages',
            'unreadNotifications',
            'recentProjects',
            'skills'
        ));
    }
}
