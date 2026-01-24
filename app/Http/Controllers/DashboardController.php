<?php

namespace App\Http\Controllers;
use App\Models\Registration;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard() {
        $Registration = new Registration;

        $data['Registration'] = $Registration->latest()->take(5)->get();

        $data['Count'] = $Registration->count();

        $data['WhereDate'] = $Registration->whereDate('created_at', today())->count();

        $data['subDays'] = $Registration->where('created_at', '>=', now()->subDays(7))->count();

        return view('admin.dashboard.dashboard', ['data' => $data]);

    }
}
