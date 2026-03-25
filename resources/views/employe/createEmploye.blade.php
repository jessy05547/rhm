@extends('index.layouts')
@section('title', 'Ajouter des travailleurs')
@section('content')
    <h2 class="title-employe">s'enregistrer</h2>
    <form action="{{ route('employe.store') }}" method="post" enctype="multipart/form-data" id="form-employe">
        @csrf
        <div class="emp-input">
            <label for="nom" class="lab-input">Nom *</label>
            <input type="text" name="nom" id="emp-input-cont" required>
        </div>
        <div class="emp-input">
            <label for="prenom" class="lab-input">Prénoms *</label>
            <input type="text" name="prenom" id="emp-input-cont" required>
        </div>
        <div class="emp-input">
            <label for="date_naissance" class="lab-input">Date de naissance *</label>
            <input type="date" name="date_naissance" id="register-input-naissance" required>
            <small id="message-date"></small>
        </div>
        <div class="emp-input">
            <label for="cin" class="lab-input">Carte d'Identité Nationale *</label>
            <input type="text" name="cin" id="emp-input-cont-cin" required>
        </div>
        <div class="emp-input">
            <label for="date_embauche" class="lab-input">Date d'embauche *</label>
            <input type="date" name="date_embauche" id="emp-input-cont-embauche" required>
            <small id="message-embauche"></small>
        </div>
        <div class="emp-input">
            <label for="adresse" class="lab-input">Adresse *</label>
            <input type="text" name="adresse" id="emp-input-cont" required>
        </div>
        <div class="emp-input">
            <label for="email" class="lab-input">Adresse mail *</label>
            <input type="email" name="email" id="emp-input-cont" required>
        </div>
        <div class="emp-input">
            <label for="id_departement" class="lab-input">Departement *</label>
            <select name="id_departement" id="select-emp" required>
                @foreach ($departements as $departement)
                    <option value="{{ $departement->id }}" id="option-select">{{ $departement->departement }}</option>
                @endforeach
            </select>
        </div>
        <div class="emp-input">
            <label for="id_poste" class="lab-input">Poste *</label>
            <select name="id_poste" id="select-emp" required>
                @foreach ($postes as $poste)
                    <option value="{{ $poste->id }}" id="option-select">{{ $poste->poste }}</option>
                @endforeach
            </select>
        </div>
        <div class="emp-input">
            <label for="telephone" class="lab-input">Téléphone *</label>
            <input type="tel" name="telephone" id="emp-input-cont" required>
        </div>
        <div class="emp-input-radio">
            <label for="sexe" class="lab-input">Homme </label>
            <input type="radio" name="sexe" id="emp-input-cont-radio" value="Masculin" required>
            <label for="sexe" class="lab-input">Femme</label>
            <input type="radio" name="sexe" id="emp-input-cont-radio" value="Féminin" required>
        </div>
        <div class="emp-input">
            <input type="file" name="photo" id="register-photo-input" data-allow-reorder="true">    
        </div>
        <div class="emp-input">
            <input type="submit" value="Ajouter" id="valider-input">
        </div>
    </form>
    
    <!-- <input type="hidden" name="photo" id="photo_hidden" value=""> -->
@endsection