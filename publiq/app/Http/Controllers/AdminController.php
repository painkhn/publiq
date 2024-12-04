<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Models\Story;
use App\Models\User;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function verification_list()
    {
        $stories = Story::where('status', 'waiting')->get(); // Получаем все истории которые не проверенные

        // Получаем данные о пользователях за последние 7 дней
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subDays(7);

        $users = User::whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d M');
            });

        $labels = [];
        $data = [];

        foreach ($users as $date => $userGroup) {
            $labels[] = $date;
            $data[] = $userGroup->count();
        }

        // Получаем общее количество пользователей
        $totalUsers = User::count();

        return view('admin', compact('stories', 'labels', 'data', 'totalUsers'));
    }

    public function verification_story($story_id)
    {
        $story = Story::where('id', $story_id)->first(); // Получаем информацию о этой истории
        return view('verification', ['story' => $story]);
    }

    public function solution($story_id, $status)
    {
        Story::where('id', $story_id)->update(['status' => $status]); // Обновляем статус истории
        return redirect(route('VerifList', ['stories' => Story::where('status', 'waiting')->get()]));
    }

    public function exportUsers()
    {
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subDays(7);

        return Excel::download(new UsersExport($startDate, $endDate), 'users.xlsx');
    }
}