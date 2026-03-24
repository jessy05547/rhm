@extends('authentification.login')
@section('title', 'Inscription - Utilisateur')
@section('content')
    <header class="login-parent">
        @if (session('error'))
            <div class="error-message" style="color: red;">
            {{ session('error') }}
        </div>
        @endif
        <form action="{{ route('authentification.store') }}" method="post" id="user-form-register">
            @csrf
            <h3 class="user-login-title">Inscription</h3>
            <div class="register-parent-group">
                <div class="register-parent">
                    <label for="nom" class="register-lab">Nom *</label>
                    <input type="text" name="nom" id="register-input" required>
                </div>
                <div class="register-parent">
                    <label for="prenom" class="register-lab">Prénoms *</label>
                    <input type="text" name="prenom" id="register-input" required>
                </div>
                <div class="register-parent">
                    <label for="email" class="register-lab">E-mail *</label>
                    <input type="email" name="email" id="register-input" required>
                </div>
                <div class="register-parent">
                    <label for="password" class="register-lab">Mot de passe *</label>
                    <input type="password" name="password" id="register-input-password" required minlength="8">
                    <small id="password-sms"></small>
                </div>
                <div class="register-parent">
                    <label for="password_confirmation" class="register-lab">Confirmer le mot de passe *</label>
                    <input type="password" name="password_confirmation" id="register-input-confirmation" required minlength="8">
                    <small id="password-message"></small>
                </div>
                <div class="register-parent">
                    <label for="cin" class="register-lab">CIN *</label>
                    <input type="text" name="cin" id="emp-input-cont-cin" required pattern="[0-9]{12}" title="Vérifier si le nombre de caractère est égale 12.">
                </div>  
                <div class="register-parent">
                    <label for="date_naissance" class="register-lab">Date de naissance *</label>
                    <input type="date" name="date_naissance" id="register-input-naissance" required>
                    <small id="message-date"></small>
                </div>
                <div class="register-parent">
                    <label for="date_embauche" class="register-lab">Date d'embauche *</label>
                    <input type="date" name="date_embauche" id="emp-input-cont-embauche" required>
                    <small id="message-embauche"></small>
                </div>
                <div class="register-parent">
                    <label for="adresse" class="register-lab">Adresse *</label>
                    <input type="text" name="adresse" id="register-input" required>
                </div>
                <div class="register-parent">
                    <label for="telephone" class="register-lab">Téléphone *</label>
                    <input type="tel" name="telephone" id="register-input" required pattern="[0-9]{10}" title="Verifier si le nombre de caractère est égale 10.">
                </div> 
                <div class="register-parent">
                    <label for="id_departement" class="register-lab">Département *</label>
                    <select name="id_departement" id="register-input" required>
                        @foreach ($departements as $departement)
                            <option value="{{ $departement->id }}" id="option-select">{{ $departement->departement }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="register-parent">
                    <label for="id_poste" class="register-lab">Poste *</label>
                    <select name="id_poste" id="register-input" required>
                        @foreach ($postes as $poste)
                            <option value="{{ $poste->id }}" id="option-select">{{ $poste->poste }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="register-parent-sexe">
                    <label for="sexe" class="register-lab">Sexe *</label>
                    <div class="register-sexe-group">
                        <input type="radio" name="sexe" id="register-sexe-input" value="Masculin" required>
                        <label for="masculin" class="register-sexe-lab">Masculin</label>
                        <input type="radio" name="sexe" id="register-sexe-input" value="Féminin" required>
                        <label for="féminin" class="register-sexe-lab">Féminin</label>
                    </div>
                </div>
                <div class="register-parent">
                    <input type="file" name="photo" id="register-photo-input" required>
                </div>
                <div class="register-validate">
                    <input type="submit" value="S'inscrire" id="register-validate-btn">
                    <a href="{{ route('login') }}" class="register-user">Déjà un compte ? Se connecter</a>
                </div>
            </div>
        </form>
    </header>
@endsection