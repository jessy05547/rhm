<?php

namespace App\Http\Controllers;

use App\Models\conge;
use Illuminate\Http\Request;
use App\Models\employe;
class contConge extends Controller
{
    public function conge(){
         $userId = session('utilisateur_id'); // Récupérer l'ID de l'utilisateur connecté
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter un employé.');
        }

        $employes = employe::all();

        return view('conge.demandeConge', ['employes' => $employes]);
    }
    public function liste(){
         $userId = session('utilisateur_id'); // Récupérer l'ID de l'utilisateur connecté
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter un employé.');
        }
        $employees = employe::all();
        // $employes = employe::where('id_utilisateur', $userId)
        // ->get();
        $conges = conge::with('employees')
            ->where('id_utilisateur', $userId)
            ->latest()
            ->get();

        return view('conge.liste', ['conges' => $conges, 'employees' => $employees]);
    }
    public function demandeConge(Request $request){
        $userId = session('utilisateur_id'); // Récupérer l'ID de l'utilisateur connecté
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter un employé.');
        }

        try{
            $data = $request->validate([
                'id_employe' => 'required|integer|exists:employe_tables,id',
                'date_sortie' => 'required|date',
                'date_entre' => 'required|date',
                'types' => 'required|string|max:100',
                'validation' => 'required|string|max:190'
            ]);
            $data['id_utilisateur'] = $userId;
            $conge = conge::create($data);
            return redirect()->route('conge.liste')->with('success', 'Le demande de congé est accepté');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'vous avez de quelque problème : ' . $e->getMessage());
        }
    }
}
