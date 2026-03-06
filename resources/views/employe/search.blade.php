@extends('index.layouts')
@section('title', 'Recherche - Employé')
@section('content')
    <div class="src-parent">
        <div class="resultat-src">
            @forelse($employes as $employe)
            <a href="{{ route('employe.update', $employe->id) }}" class="card-src">
                <h3 class="card-tilte-src">{{ $employe->postes->poste }}</h3>
                <p class="card-element-src">Nomination : {{ $employe->nom }}</p>
                <p class="card-element-src">Prénom : {{ $employe->prenom }}</p>
                <p class="card-element-src">Departement : {{ $employe->departements->departement }}</p>
                <p class="card-element-src">Debut de travail : {{ $employe->date_embauche }}</p>
            </a>
            @empty
            <tr class="card-nonNull" style="
            width:100%;
            height:40px;
            background: rgba(255, 255, 255, 0.308);
            color:#01252c;
            font-size:14px;
            display:flex;
            justify-content:center;
            align-items:center;
            border-radius: 12px;
            margin-top: 20px;
            ">
                <p class="card-vide" style="
                font-size:23px;
                color:#01252c;
                font-weight:600;
                ">Aucun resultat trouvé!</p>
            </tr>
            @endforelse
        </div>
    </div>
@endsection