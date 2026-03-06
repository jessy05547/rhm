<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\presence;
use App\Models\employe;
use GuzzleHttp\Promise\Create;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class dashboardApp extends Controller
{
    public function dashboard(Request $request){
        $userSession = $request->session()->get('utilisateur_id');
         if (!$userSession) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder au tableau de bord');
        }
        $data = presence::select(
            DB::raw('COUNT(*) as nombre'),
            DB::raw("DATE_FORMAT(date_pointage, '%d/%m') as jours"),
            DB::raw('MIN(date_pointage) as date_tri')
        )
        ->where('date_pointage', '>=' ,now()->subDay(7))
        ->groupBy('jours')
        ->orderBy('date_tri', 'ASC')
        ->get();

        $labels = $data->pluck('jours');
        $dataValue = $data->pluck('nombre');

        $nombreEmployes = employe::where('id_utilisateur', $userSession)->count();

        $employePagination = employe::where('id_utilisateur', $userSession)->latest()->paginate(5);
        return view('index.dashboard', [
            'labels' => $labels,
            'data' => $dataValue,
            'nombreEmployes' => $nombreEmployes,
            'employePagination' => $employePagination
        ]);
    }
    
}
