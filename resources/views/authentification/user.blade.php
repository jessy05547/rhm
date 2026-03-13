@extends('authentification.login')
@section('title', 'Authentification - Utilisateur')
@section('content')
    @if (session('error'))
        <div class="error-message" style="width:300px;height: auto;color: #cf2323;background: #dfdde298; padding: 10px; border-radius: 5px;display: flex;justify-content:center;font-weight: 500;align-items:center;gap:10px;position:absolute;z-index:9999;top:20px;left:0;right:0;margin:auto;">
            {{ session('error') }}
        </div>
    @endif
    @if (session('sussecc'))
        <div class="success" style="color: #016817;background: #e0dfe49a; padding: 10px; border-radius: 5px;display: flex;justify-content:center;width:300px;height: 5vh;font-weight: 500;align-items:center;gap:10px;position:absolute;z-index:9999;top:20px;left:0;right:0;margin:auto;">
            {{ session('success') }}
        </div>
    @endif
    <div class="blur-login"></div>
    <header class="login-parent">
        <div class="blur-login-content"></div>
        <form action="{{ route('user.login') }}" method="POST" id="user-login">
            @csrf
            <h3 class="user-login-title">Page de connexion</h3>
            <div class="user-login-ground">
                <div class="login-group">
                    <!-- <label for="email" class="login-lab">E-mail *</label> -->
                    <input type="email" name="email" id="login-input" required placeholder="votre.email@gmail.com">
                </div>
                <div class="login-group">
                    <!-- <label for="password" class="login-lab">Mot de passe *</label> -->
                    <input type="password" name="password" required id="login-input" placeholder="Mot de passe">
                </div>
                <div class="login-validate">
                    <input type="submit" value="Se connecter" id="login-validate-btn">
                    <a href="{{ route('authentification.register') }}" class="register-user">Créer un compte</a>
                </div>
            </div>
        </form>
        <!-- <div class="login-text-script">
            <h2 class="text-user-login">gestion des ressources humains</h2>
        </div> -->
    </header>
    <script>
        try{
            history.pushState(null,null,location.href);
            window.addEventListener('popstate', function (e){
                e.preventDefault();
                location.replace("{{ route('login') }}")
            });
        }catch (e) {

        }
    </script>
@endsection