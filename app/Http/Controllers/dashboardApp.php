<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\presence;
use App\Models\employe;
use App\Models\poste;
use App\Models\departement;
use GuzzleHttp\Promise\Create;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Browsershot\Browsershot;

class dashboardApp extends Controller
{
    public function dashboard(Request $request){
        $userSession = $request->session()->get('utilisateur_id');
         if (!$userSession) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder au tableau de bord');
        }
        $post = poste::all();
        $deps = departement::all();

        $data = presence::where('id_utilisateur', $userSession)
        ->select(
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

        $depense = employe::where('id_utilisateur', $userSession)->join('poste_tables', 'employe_tables.id_poste', '=', 'poste_tables.id')->groupBy('id_poste')->select('id_poste', DB::raw('SUM(salaire) as total_depense'))->get()->sum('total_depense');

        $depensePoste = employe::where('id_utilisateur', $userSession)->join('poste_tables', 'employe_tables.id_poste', '=', 'poste_tables.id')->groupBy('id_poste')->select('id_poste', DB::raw('SUM(salaire) as total_depense'))->get();

        $depenseLabels = $depensePoste->pluck('id_poste')->map(function($idPoste) use ($post) {
            $poste = $post->find($idPoste);
            return $poste ? $poste->poste : 'Inconnu';
        });
        $depenseValues = $depensePoste->pluck('total_depense');

        $employePagination = employe::where('id_utilisateur', $userSession)->latest()->paginate(5);

        // 1. Nombre total d'employés pour cet utilisateur
    $totalEmployes = employe::where('id_utilisateur', $userSession)->count();
    $aujourdhui = now()->format('Y-m-d');

    // 2. Nombre d'employés ayant au moins un pointage aujourd'hui
    $employesPresentsCount = presence::where('id_utilisateur', $userSession)
        ->whereDate('date_pointage', $aujourdhui)
        ->distinct('id_employe') // On évite de compter deux fois si quelqu'un a pointé matin et soir
        ->count('id_employe');

    // 3. Calcul des absents
    $nombreAbsents = $totalEmployes - $employesPresentsCount;

    // Tu peux aussi récupérer la LISTE des absents pour l'afficher
    // $listeAbsents = employe::where('id_utilisateur', $userSession)
    //     ->whereDoesntHave('presences', function($query) use ($aujourdhui) {
    //         $query->whereDate('date_pointage', $aujourdhui);
    //     })
    //     ->get();
        return view('index.dashboard', [
            'labels' => $labels,
            'data' => $dataValue,
            'nombreEmployes' => $nombreEmployes,
            'depense' => $depense,
            'depensePoste' => $depensePoste,
            'depenseLabels' => $depenseLabels,
            'depenseValues' => $depenseValues,
            'employePagination' => $employePagination,
            'nombreAbsents' => $nombreAbsents
        ]);
    }
    public function pdf(Request $request, $idPdf) {
    $userId = session('utilisateur_id');
    
    if (!$userId) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté.');
    }
    $dateReference = (now()->day < 5) ? now()->subMonth() : now();

    // 1. Début de mois (ex: 01/02/2026)
    $debutPeriode = $dateReference->copy()->startOfMonth();
    
    // 2. Fin de mois / Date de paiement (ex: 28/02/2026)
    $finPeriode = $dateReference->copy()->endOfMonth();
    $employe = employe::with(['postes', 'departements'])
        ->where('id_utilisateur', $userId)
        ->where('id', $idPdf)
        ->firstOrFail();

    $html = view('employe.pdf', compact('employe', 'dateReference', 'debutPeriode','finPeriode'))->render();

    // On génère le contenu binaire du PDF
    try{
    $pdfContent = Browsershot::html($html)
        ->format('A4')
        ->showBackground()
        ->noSandbox() // Recommandé sur Windows pour éviter les problèmes de droits
        ->setChromePath('C:\Program Files\Google\Chrome\Application\chrome.exe')
        ->timeout(120) // On passe à 120 secondes au cas où
        ->setOption('args', ['--disable-setuid-sandbox', '--disable-extensions', '--no-zygote']) // Options de stabilité
        ->pdf(); // <-- C'est cette méthode qui transforme l'objet en "string" (PDF)

    // On retourne une réponse avec les bons headers pour l'affichage
    return response($pdfContent)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="fiche-paie-'.$employe->nom.'.pdf"');
    }catch(\Exception $e){
        return "Erreur lors de la génération : " . $e->getMessage();
    }
}
    public function genererPdf()
    {
    $html = view('votre_vue_fiche_de_paie', compact('employe'))->render();

    $pdfContent = Browsershot::html($html)
        ->setChromePath('/usr/bin/google-chrome') // Optionnel selon votre config
        ->pdf();

    return response($pdfContent)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="fiche-de-paie.pdf"');
    }
}
