<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\presence;
use App\Models\employe;
use GuzzleHttp\Promise\Create;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class pointage extends Controller
{
    
    public function presence(Request $request){
        $userSession = $request->session()->get('utilisateur_id');
         if (!$userSession) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour faire la presence');
        }
        $emp = employe::all();
        $employes = employe::where('id_utilisateur', $userSession)->get();
        $presences = presence::where('id_utilisateur', $userSession)
            ->latest()
            ->get();

        $presencesUnique = $presences->first();
        return view('presence.presenceAjout', ['employes' => $employes, 'emp' => $emp, 'presences' => $presences, 'presencesUnique' => $presencesUnique]);
    }
    public function storePointage(Request $request){
        $userSession = $request->session()->get('utilisateur_id');
         if (!$userSession) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour faire la presence');
        }
        try{
            $data = $request->validate([
                'id_employe' => 'required|exists:employe_tables,id',
                'date_pointage' => 'required|date',
                'statut' => 'required|string|max:100',
                'motifs' => 'nullable|string|max:255',
                'check_in' => 'required|date_format:H:i',
                
            ]);
            
            $data['id_utilisateur'] = $userSession;
            $checkinDateTime = Carbon::parse($request->date_pointage . ' ' . $request->check_in . ':00');
            $data['check_in'] = $checkinDateTime->format('Y-m-d H:i:s');
            $data['check_out'] = Carbon::parse($request->date_pointage . ' ' .'00:00:00')->format('Y-m-d H:i:s');

            $presence = presence::create($data);

            return redirect()->route('presence.presenceAjout')->with('success', 'Présence enregistrée!');
        }catch(\Exception $e){
            
            return redirect()->route('presence.presenceAjout')->with('error', 'La présence est refusé!'. $e->getMessage());
        }
    }
    public function updatePointage(Request $request, $id)
    {
        // 1. Vérification de l'authentification (plus propre que $request->session())
        $userSession = $request->session()->get('utilisateur_id');
            if (!$userSession) {
                return redirect()->route('login')->with('error', 'Vous devez être connecté pour faire la presence');
        }
        try {
            // 2. Validation des données
            $data = $request->validate([
                'check_out' => 'required|date_format:H:i',
            ]);

            // 3. Récupération de la présence à mettre à jour
            $presence = presence::where('id', $id)->where('id_utilisateur', $userSession)->firstOrFail();

            // 4. Mise à jour du champ check_out
            $checkoutDateTime = Carbon::parse($presence->date_pointage . ' ' . $request->check_out . ':00');
            $presence->check_out = $checkoutDateTime->format('Y-m-d H:i:s');
            $presence->save();

            return redirect()->route('presence.presenceAjout')->with('success', 'Heure de sortie mise à jour!');
        } catch (\Exception $e) {
            return redirect()->route('presence.presenceAjout')->with('error', 'Erreur lors de la mise à jour: ' . $e->getMessage());
        }
    }
    public function searchPresence(Request $request){
        $userSession = $request->session()->get('utilisateur_id');
        if (!$userSession) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour faire la presence');
        }
        $searchTerm = $request->input('search');
        $presences = presence::with('employes')
            ->where('id_utilisateur', $userSession)
            ->where(function ($query) use ($searchTerm) {
                $query->whereHas('employes', function ($q) use ($searchTerm) {
                    $q->where('nom', 'like', "%$searchTerm%")
                      ->orWhere('prenom', 'like', "%$searchTerm%");
                })
                ->orWhere('date_pointage', 'like', "%$searchTerm%")
                ->orWhere('statut', 'like', "%$searchTerm%");
            })
            ->latest()
            ->get();
            return view('presence.recherche', compact('presences','searchTerm'));
        // return view('presence.recherche', ['presences' => $presences, 'searchTerm' => $searchTerm]);
    }
}
