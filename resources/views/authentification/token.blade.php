@extends('authentification.login')
@section('title', 'Mot de passe oublier - Utilisateur')
@section('content')
    <article class="login-parent">
        <div class="blur-login-content"></div>
        <form action="{{ route('token.get') }}" method="POST" id="user-login">
            @csrf
            <h3 class="user-login-title">Mot de passe oublier</h3>
            <div class="user-login-ground">
                <div class="login-group">
                    <input type="email" name="email" id="login-input" required placeholder="votre.email@gmail.com">
                </div>
                <div class="login-validate">
                    <input type="submit" value="Génération de token" id="login-validate-btn">
                    <a href="{{ route('login') }}" class="register-user">retour au login</a>
                </div>
            </div>
        </form>
    </article>
@endsection