<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sopamo\LaravelFilepond\Filepond;
use App\Models\employe;
use App\Models\departement;
use App\Models\poste;
use Illuminate\Support\Facades\DB;
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
    public function store(Request $request, Filepond $filepond){
        $userId = session('utilisateur_id'); // Récupérer l'ID de l'utilisateur connecté
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter un employé.');
        }

        try {
                // $employe = employe::findOrFail($id);
                $cinValde = str_replace(' ', '', $request->input('cin'));
                $request->merge(['cin' => $cinValde]);
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

            $employe = employe::create($data);
            if($request->has('photo') && !empty($request->input('photo'))){
                $path = $filepond->getPathFromServerId($request->input('photo'));
                if($path && file_exists($path)){
                    $employe->addMedia($path)->toMediaCollection('photos');
                }
            }
            return redirect()->route('employe.listeEmploye')->with('success', 'Employé créé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'vous avez de quelque problème : ' . $e->getMessage());
        }
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
    
}
