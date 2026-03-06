<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sopamo\LaravelFilepond\Filepond;
use App\Models\utilisateur;
use App\Models\departement;
use App\Models\poste;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class contUtilisateur extends Controller
{
    public function index(Request $request){
         $userSession = $request->session()->get('utilisateur_id');
         if ($userSession) {
            return redirect()->route('index.dashboard')->with('error', 'Vous êtes déjà connecté.');
        }
        return view('authentification.user');
    }
    public function register(Request $request){
        $userSession = $request->session()->get('utilisateur_id');
         if ($userSession) {
            return redirect()->route('index.dashboard')->with('error', 'Vous êtes déjà connecté.');
        }

        $post = poste::all();
        $deps = departement::all();
        
        return view('authentification.register',[
            'postes' => $post,
            'departements' => $deps
        ]);
    }
    public function store(Request $request, Filepond $filepond){
        try {
            // Validation des données
           $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'cin' => 'required|digits:12|unique:utilisateur_tables,cin',
                'adresse' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:utilisateur_tables,email',
                'password' => 'required|string|min:8|confirmed',
                'id_poste' => 'required|integer|exists:poste_tables,id',
                'id_departement' => 'required|integer|exists:departement_tables,id',
                'date_embauche' => 'required|date',
                'date_naissance' => 'required|date',
                'telephone' => 'required|string|max:20',
                'sexe' => 'required|string|in:Masculin,Féminin'
            ]);
            $validatedData['password'] = bcrypt($validatedData['password']);
            $utilisateur = utilisateur::create($validatedData);

            if ($request->filled('photo')) {
                $tempPath = storage_path('app/public/' . $request->input('photo'));

                if (file_exists($tempPath)) {
                    $utilisateur->addMedia($tempPath)
                            ->toMediaCollection('photos');
                    // Media Library déplace le fichier, donc le dossier temporaire sera vide
                }
            }
            return redirect()->route('login')->with('success', 'Compte créé avec succès. Veuillez vous connecter.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la création du compte : ' . $e->getMessage());
        }
    }
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
    public function login(Request $request){
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required|string"
        ]);
        $utilisateur = utilisateur::where("email", $credentials["email"])->first();
        if(!$utilisateur || !Hash::check($credentials['password'], $utilisateur->password)){
            return back()->withErrors(['email' => 'Les identifiants fournis sont incorrects!'])->onlyInput('email');
        }
        $request->session()->put('utilisateur_id',$utilisateur->id);
        $request->session()->put('utilisateur_email', $utilisateur->email);
        $request->session()->put('utilisateur_nom',$utilisateur->nom);
        $request->session()->put('utilisateur_prenom', $utilisateur->prenom);
        $request->session()->put('utilisateur_poste', $utilisateur->id_poste);

        return redirect()->route('index.dashboard')->with('success', 'Connexion réussite');
    }
    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Déconnexion réussite');
    }
}
