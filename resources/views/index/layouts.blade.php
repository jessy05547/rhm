<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/style.css', 'resources/js/app.js','resources/js/chunking.js','resources/js/controlChamp.js','resources/js/graphe.js'])
    <title>@yield('title')</title>
</head>
<body>
    <header class="parent">
        <div class="dashboard-profil">
            <div class="profil-search">
                <form action="{{ route('presence.recherche') }}" method="get" id="src-profil">
                    <input type="text" name="search" id="search" placeholder="Est-ce que je suis présent ?">
                </form>
            </div>
            <div class="all-profil">
                <div class="profil-image">
                    <img src="" alt="" id="user-image">
                </div>
                <div class="profil-name">
                    <h5 class="profil-name-user">{{ session('utilisateur_nom') }}</h5>
                    <p class="profil-firstName-user">{{ session('utilisateur_prenom') }}</p>
                </div>
            </div>
        </div>
        <div class="dashboard-menu">
            <div class="menu-columns">
                <div class="image-logo">
                    <img src="{{ asset('imgs/logo.png') }}" alt="" id="logo">
                </div>
                <nav class="menu-layout">
                    <ul id="liste-menu">
                        <li><a href="{{ route('index.dashboard') }}" class="{{ request()->routeIs('index.dashboard') ? 'active' : '' }}"><i class="fi fi-sr-chart-histogram text-amber-50 text-xl"></i></a></li>
                        
                        <li><a href="{{ route('employe.listeEmploye') }}" class="{{ request()->routeIs('employe.listeEmploye') ? 'active' : '' }}"><i class="fi fi-rr-users text-amber-50 text-xl"></i></a></li>
                        
                        <li><a href="{{ route('conge.liste') }}" class="{{ request()->routeIs('conge.liste') ? 'active' : '' }}"><i class="fi fi-rr-house-leave text-amber-50 text-xl"></i></a></li>
                        
                        <li><a href="{{ route('presence.presenceAjout') }}" class="{{ request()->routeIs('presence.presenceAjout') ? 'active' : '' }}"><i class="fi fi-rr-time-watch-calendar text-amber-50 text-xl"></i></a></li>
                        
                    </ul>
                    <!-- <ul id="infobulle">
                        <li class="info_tools"><span id="tooltips">Tableau de bord</span></li>
                        <li class="info_tools"><span id="tooltips">Employé</span></li>
                        <li class="info_tools"><span id="tooltips">Congé</span></li>
                        <li class="info_tools"><span id="tooltips">Pointage</span></li>
                    </ul> -->
                </nav>
                <div class="btn-logout">
                    <ul id="logout-layout">
                        <li><a href="{{ route('user.logout') }}"><i class="fi fi-ss-exit text-amber-50 text-xl"></i></a></li>
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="dashboard-body">
            <div class="wrapper">
                @if (session('error'))
                    <div class="error-message" style="width:300px;height: auto;color: #d32f2f; margin-bottom: 10px;background: #f0f0f06e; padding: 10px; border-radius: 5px;display: flex;justify-content:center;font-weight: 500;align-items:center;gap:10px;"><i class="fi fi-ss-braker-warning" style="color:#d32f2f;"></i>
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="success-message" style="color: #2fd345;margin-bottom: 10px;background: #f0f0f06e; padding: 10px; border-radius: 5px;display: flex;justify-content:center;width:300px;height: 5vh;font-weight: 500;align-items:center;gap:10px;"><i class="fi fi-rr-check" style="color:#2fd345;"></i>
                        {{ session('success') }}
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </header>
    <script>
        const progressBar = document.createElement('div');
        progressBar.id = 'top-progress-bar';
        document.body.prepend(progressBar);
        
        const Progress = {
            timer:null,
            start(){
                progressBar.classList.remove('progress-fade-out');
                progressBar.style.width = '0%';
                setTimeout(() => progressBar.style.width = '30%', 50);

                // simulation d'une progression lente
                this.timer = setInterval(() => {
                    let currentWidth = parseFloat(progressBar.style.width);
                    if(currentWidth < 90){
                        progressBar.style.width = (currentWidth + Math.random() * 5) + '%';
                    }
                }, 400);
            },
            finish(){
                clearInterval(this.timer);
                progressBar.style.width = '100%';
                setTimeout(() => {
                    progressBar.classList.add('progress-fade-out');
                    setTimeout(() =>progressBar.style.width = '0%', 300);
                }, 200)
            }
        };
        document.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', (e) => {
                if(!link.hash && link.hostname === window.location.hostname && !e.ctrlKey && !e.shiftKey){
                    Progress.start();
                }
            });
        });
        window.addEventListener('load', () => Progress.finish());
    </script>   
</body>
</html>