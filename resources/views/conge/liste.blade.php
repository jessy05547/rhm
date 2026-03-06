@extends('index.layouts')
@section('title', 'Liste de demande de conge - Employé')
@section('content')
    <section class="conge-liste-parent">
        <div class="bouton-autre-option">
            <a href="{{ route('conge.demandeConge') }}" class="ajouter-demande-conge">
                <i class="fi fi-sr-add" style="color:#01252c;"></i>
                <span class="btn-autre-option">
                    Demande de congé
                </span>    
            </a>
        </div>
        <div class="tableau-border-conge">
            <table class="table-conge-externe">
                <thead class="header-table-conge">
                    <tr class="tr-conge-head">
                        <th class="entete-conge-head">Nom complet</th>
                        <th class="entete-conge-head">Début de congé</th>
                        <th class="entete-conge-head">Fin de congé</th>
                        <th class="entete-conge-head">Type de congé</th>
                        <th class="entete-conge-head">Validation</th>
                    </tr>
                </thead>
                <tbody class="body-conge-element">
                    @foreach ($conges as $cg)
                        <tr class="body-conge-tr">
                            <td class="body-info-conge">{{ $cg->employees->nom }} {{ $cg->employees->prenom }}</td>
                            <td class="body-info-conge">{{ $cg->date_sortie }}</td>
                            <td class="body-info-conge">{{ $cg->date_entre }}</td>
                            <td class="body-info-conge">{{ $cg->types }}</td>
                            <td class="body-info-conge">{{ $cg->validation }}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </section>
@endsection