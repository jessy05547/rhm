@extends('index.layouts')
@section('title', 'Recherche - Employé présent')
@section('content')
<section class="src-parent">
    <div class="resultat-src">
        @forelse($presences as $employe)
            <a href="" class="card-src">
                <h3 class="card-tilte-src">{{ $employe->employes->nom }} {{ $employe->employes->prenom }}</h3>
                <p class="card-element-src">Statut : {{ $employe->statut }}</p>
                <p class="card-element-src">Date de pointage : {{ $employe->date_pointage }}</p>
                <p class="card-element-src">Heure d'entrée : {{ $employe->check_in }}</p>
                <p class="card-element-src">Heure de sortie : {{ $employe->check_out }}</p>
            </a>
        @empty
            <p style="font-size:20px;color:#e4ebec; font-weight:600;">Aucun employé trouvé.</p>
        @endforelse
    </div>
</section>
@endsection

