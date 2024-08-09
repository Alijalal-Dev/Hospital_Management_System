<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Insurance;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        $appointments = Appointment::selectRaw('DATE(appointment) as date, COUNT(*) as count')
        ->where('type', 'مؤكد')  // Filter for confirmed appointments
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();


        $dates = $appointments->pluck('date');
        $counts = $appointments->pluck('count');

        $insurances=Insurance::all();


        return view('Dashboard.Admin.dashboard', compact('dates', 'counts','insurances'));
    }
}
