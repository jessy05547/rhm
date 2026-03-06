@extends('index.layouts')
@section('title', 'Demande de congé')
@section('content')
    <section class="demande-conge-parent">
        <h2 class="demande-conge-title">Demande de congé</h2>
        <div class="demande-conge-form">
            <form action="{{ route('conge.demande') }}" method="post" id="demande-conge-ajout">
                @csrf
                <div class="demande-conge-group">
                    <label for="id_employe" class="demande-conge-lab">Nom complet *</label>
                    <select name="id_employe" id="demande-conge-option-one" required>
                        @foreach ($employes as $employe)
                            <option value="{{ $employe->id }}" id="demande-conge-input">{{ $employe->nom }} {{ $employe->prenom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="demande-conge-group">
                    <label for="check_in" class="demande-conge-lab">Debut de congé *</label>
                    <input type="date" id="demande-conge-input" name="date_sortie" required >
                </div>
                <div class="demande-conge-group">
                    <label for="date_entre" class="demande-conge-lab">Fin de congé *</label>
                    <input type="date" id="demande-conge-input" name="date_entre" required>
                </div>
                <div class="demande-conge-group">
                    <label for="type" class="demande-conge-lab">Type de congé *</label>
                    <select name="types" id="demande-conge-input" required>
                        <option value="Congé de maternité">Congé de maternité</option>
                        <option value="Congé de paternité">Congé de paternité</option>
                        <option value="Congé annuelle">Congé annuelle</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
                <!-- <div class="demande-conge-group">
                    <label for="type" class="demande-conge-lab">Motifs *</label>
                    <textarea name="motifs" id="demande-conge-input" rows="4" cols="4" disabled></textarea>
                </div> -->
                <div class="demande-conge-group">
                    <label for="validation" class="demande-conge-lab">Validation *</label>
                    <input type="text" id="demande-conge-input" name="validation" required>
                </div>
                <div class="demande-conge-validate">
                    <input type="submit" id="conge-validate" value="Poster le congé">
                </div>
            </form>
        </div>
    </section>
@endsection