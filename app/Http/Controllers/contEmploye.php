<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sopamo\LaravelFilepond\Filepond;
use App\Models\employe;
use App\Models\departement;
use App\Models\poste;
use App\Models\presence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class contEmploye extends Controller
{
    public function index()
    {   
         $userId = session('utilisateur_id'); // Récupérer l'ID de l'utilisateur connecté
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter un employé.');
        }

        $post = poste::all();
        $deps = departement::all();
        return view('employe.createEmploye',[
            'postes' => $post,
            'departements' => $deps
        ]);
    }
    public function liste(Request $request){

        $userSession = $request->session()->get('utilisateur_id');
         if (!$userSession) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter un employé.');
        }
        
        $departements = departement::withCount('employee')->paginate(5);
        
        $totalEmployes = employe::where('id_utilisateur', $userSession)->count();
        $departements->each(function ($deps) use ($totalEmployes){
            $deps->pourcentage = $totalEmployes > 0 ? ($deps->employee_count / $totalEmployes) * 100 : 0;
        });

        $employes = employe::with('postes','departements')
            ->where('id_utilisateur',$userSession)
            ->latest()
            ->get();
            
        return view('employe.listeEmploye', ['employes' => $employes, 'departements' => $departements]);
    }
    public function store(Request $request) 
    {
        $userId = session('utilisateur_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté.');
        }

        try {
            // Nettoyage et validation
            $cinValide = str_replace(' ', '', $request->input('cin'));
            $request->merge(['cin' => $cinValide]);

            $data = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'cin' => 'required|digits:12|unique:employe_tables,cin',
                'adresse' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:employe_tables,email',
                'id_poste' => 'required|integer|exists:poste_tables,id',
                'id_departement' => 'required|integer|exists:departement_tables,id',
                'date_embauche' => 'required|date',
                'date_naissance' => 'required|date',
                'telephone' => 'required|string|max:20',
                'sexe' => 'required|string|in:Masculin,Féminin'
            ]);

            $data['id_utilisateur'] = $userId;
            $employe = Employe::create($data); // Attention à la majuscule sur le modèle Employe

            // LOGIQUE MEDIA LIBRARY
            // 'photo' correspond à la valeur retournée par le serveur lors du processus d'upload
            if ($request->filled('photo')) {
                $tempPath = storage_path('app/public/' . $request->input('photo'));

                if (file_exists($tempPath)) {
                    $employe->addMedia($tempPath)
                            ->toMediaCollection('photos');
                    // Media Library déplace le fichier, donc le dossier temporaire sera vide
                }
            }

            return redirect()->route('employe.listeEmploye')->with('success', 'Employé créé avec succès.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Un problème est survenu : ' . $e->getMessage());
        }
    }
    // FilePondUploadController.php
    public function process(Request $request)
    {
        // 'photo' doit correspondre au name de votre input FilePond
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            
            // On stocke dans storage/app/public/temp
            $path = $file->store('temp', 'public');

            // On retourne le chemin relatif que FilePond va stocker 
            // dans le champ caché 'photo' de votre formulaire principal
            return $path; 
        }

        return response()->json(['error' => 'Fichier introuvable'], 400);
    }

    public function revert(Request $request)
    {
        // Logique pour supprimer le fichier si l'utilisateur clique sur "Annuler"
        $path = $request->getContent();
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        return response()->noContent();
    }
    public function destroy($id){
        $employe = employe::findOrFail($id);
        $employe->delete();
        return redirect()->route('employe.listeEmploye')->with('success', 'Employé supprimé avec succès.');
    }
    public function edit($id){
        $employe = employe::findOrFail($id);
        $post = poste::all();
        $deps = departement::all();

        return view('employe.editEmploye', ['employe' => $employe, 'postes' => $post, 'departements' => $deps]);
    }
    public function update(Request $request, $id){
         $userId = session('utilisateur_id'); // Récupérer l'ID de l'utilisateur connecté
        if (!$userId) {
            return redirect()->route('login')->with('error', value: 'Vous devez être connecté pour ajouter un employé.');
        }

        $employe = employe::findOrFail($id);
        // $cinValde = str_replace(' ', '', $request->input('cin'));
        // $request->merge(['cin' => $cinValde]);

        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|digits:12|unique:employe_tables,cin,' . $employe->id,
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employe_tables,email,' . $employe->id,
            'id_poste' => 'required|integer|exists:poste_tables,id',
            'id_departement' => 'required|integer|exists:departement_tables,id',
            'date_embauche' => 'required|date',
            'date_naissance' => 'required|date',
            'telephone' => 'required|string|max:20',
            'sexe' => 'required|string|in:Masculin,Féminin',
            'photo' => 'required|string'
        ]);

        $employe->update($data);
        if ($request->filled('photo')) {
                $tempPath = storage_path('app/public/' . $request->input('photo'));

                if (file_exists($tempPath)) {
                    $employe->addMedia($tempPath)
                            ->toMediaCollection('photos');
                    // Media Library déplace le fichier, donc le dossier temporaire sera vide
                }
            }
        return redirect()->route('employe.listeEmploye')->with('success', 'Employé mis à jour avec succès.');
    }
    public function searchEmploye(Request $request){
        $query = $request->input('query');
        $employes = employe::with('postes','departements')
            ->where('nom', 'like', "%$query%")
            ->orWhere('prenom', 'like', "%$query%")
            ->orWhere('cin', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->get();

        return view('employe.search', compact('employes', 'query'));
    }
    // calcul heure supplementaire
    public function heureSupplementaire($employeId){
        $presences = presence::where('id_employe', $employeId)->get();
        $stat = $presences->groupBy('date_pointage')->map(function ($group) {
            $normal = 8;

            $heuresTravaillees = $group->sum(function ($presence) {
                return $presence->check_out->diffInHours($presence->check_in);
            });
            $heuresSupp = max(0, $heuresTravaillees - $normal);
            return [
                'date' => $group->first()->date_pointage,
                'heures_travaillees' => $heuresTravaillees,
                'heures_supplementaires' => $heuresSupp
            ];
        });
        $salaire = employe::find($employeId)->postes->salaire;
        $tauxSupp = $salaire / 180; // Supposons que 160 heures de travail par mois
        $totalSupp = $stat->sum('heures_supplementaires');
        $coutSupp = $totalSupp * $tauxSupp;
        return [
            'stat' => $stat,
            'salaire' => $salaire,
            'tauxSupp' => $tauxSupp,
            'totalSupp' => $totalSupp,
            'coutSupp' => $coutSupp
        ];
    }
}
