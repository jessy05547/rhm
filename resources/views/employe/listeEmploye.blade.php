@extends('index.layouts')
@section('title', 'Liste des travailleurs')
@section('content')
    <section class="liste-employe-parent">
        <div class="card-total-employe">
            <h2 style="color:#0e49c7; font-size:14px; font-weight:600;
            margin-bottom:25px;">Nombre des travailleurs par département</h2>  
            <div class="card-one-employe">
                @foreach ($departements as $departement)
                <div class="card-item-departement">
                    <div class="card-item-title">
                        <p class="card-title-departement">{{ $departement->departement }}</p>
                    </div>
                    <div class="card-item-content">
                        <h4 class="nombre-departement">{{ $departement->employee_count }}</h4>
                        <div class="nombre-departement-t">
                            <a href="#" class="pourcent-departement">{{ number_format($departement->pourcentage, 1)}}%</a>
                            <p class="libelle-pourcent-departement">Le nombre des employés actuels dans {{ $departement->departement }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="btn-change-preview" style="
                    width:100%;
                    height:auto;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin-top: 20px;
                    position: absolute;
                    bottom: 70px;
                ">
                @if ($departements->currentPage() > 1)
                    <a href="{{ $departements->previousPageUrl() }}" class="btn-change-preview-item">
                        <i class="fi fi-sr-angle-left" style="color:#01252c; display: flex;align-items:center; width: 40px;height:40px;border-radius: 50%; background: #f0f0f06e;justify-content:center; border:1px solid #02dffc;"></i>
                    </a>
                @else
                    <a href="#" class="btn-change-preview-item">
                        <i class="fi fi-sr-angle-left" style="color:#01252c; display: flex;align-items:center; width: 40px;height:40px;border-radius: 50%; background: #f0f0f06e;justify-content:center; border:1px solid #02dffc;"></i>
                    </a>
                @endif
                <a href="{{ $departements->nextPageUrl() }}" class="btn-change-preview-item">
                    <i class="fi fi-sr-angle-right" style="color:#01252c; display: flex;align-items:center; width: 40px;height:40px;border-radius: 50%; background: #f0f0f06e;justify-content:center; border:1px solid #02dffc;"></i>
                </a>
                </div>
            </div>
            
            <div class="card-outil-employe">
                <div class="employe-search-profil">
                    <form action="{{ route('employe.search') }}" method="get" id="query-search">
                        @csrf
                        <input type="text" name="query" id="query-src" placeholder="Qu'est-ce qui vous cherchez ?">
                    </form>
                </div>
                <a href="{{ route('employe.index') }}" class="employe-ajout-element-form">
                    <i class="fi fi-sr-add" style="color:#01252c; display: flex;align-items:center;"></i>
                    <p class="createEmploye-ajout">Ajouter</p>
                </a>
            </div>
        </div>
        <div class="liste-employe-element">
            <h2 style="color:#0e49c7; font-size:14px; font-weight:600;
            margin-bottom:25px;margin-top:50px;z-index:-1;">Liste des employés actifs</h2>      
            <table class="table-liste-employe">
                <thead class="head-liste-employe">
                    <tr class="child-liste-employe">
                        <!-- <th class="element-liste-employe">PROFIL</th> -->
                        <th class="element-liste-employe">Profil</th>
                        <th class="element-liste-employe">SEXE</th>
                        <th class="element-liste-employe">NOM</th>
                        <th class="element-liste-employe">EMAIL</th>
                        <th class="element-liste-employe">DATE</th>
                        <th class="element-liste-employe">MATRICULE</th>
                        <th class="element-liste-employe">DEPARTEMENT</th>
                        <th class="element-liste-employe">POSTE</th>
                        <th class="element-liste-employe">ACTION</th>
                        <th class="element-liste-employe">F.PAIE</th>
                    </tr>
                </thead>
                <tbody class="body-liste-employe">
                    @foreach ($employes as $employe)
                    <tr class="child-body-employe">
                        <td class="element-body-liste" style="display:flex; justify-content:center;align-items:center;">
                            @if ($employe->hasMedia('photos'))
                                <img src="{{ $employe->getFirstMediaUrl('photos') }}" alt="Photo de {{ $employe->nom }}" class="photo-employe-liste" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%; margin:4px 0;">
                            @else
                                <div class="photo-employe-placeholder">
                                    <i class="fi fi-rr-user" style="color:#01252c; display: flex;align-items:center;"></i>
                                </div>
                            @endif
                        </td>
                        <td class="element-body-liste">{{ $employe->sexe }}</td>
                        <td class="element-body-liste">
                            <h6 class="nom-body-liste">{{ $employe->nom }}</h6>
                            <p class="prenom-body-liste">{{ $employe->prenom }}</p>
                        </td>
                        <td class="element-body-liste">
                            <a href="mailto:{{ $employe->email }}">{{ $employe->email }}</a>
                        </td>
                        <td class="element-body-liste">{{ $employe->date_embauche }}</td>
                        <td class="element-body-liste">{{ $employe->matricule }}</td>
                        <td class="element-body-liste">{{ $employe->departements->departement }}</td>
                        <td class="element-body-liste">{{ $employe->postes->poste }}</td>
                        <td class="element-body-liste">
                            <a href="{{ route('employe.edit', $employe->id) }}" class="element-liste-edit">
                                <i class="fi fi-sr-pen-field text-xl text-emerald-400"></i>
                            </a>
                            <button type="button" data-id="{{ $employe->id }}" class="element-liste-delete" data-url="{{ route('employe.destroy', $employe->id) }}" >
                                <i class="fi fi-sr-comment-xmark text-xl text-red-500"></i>
                            </button>
                            
                        </td>
                        <td>
                            <a href="{{ route('employe.pdf', ['id' => $employe->id]) }}" class="element-liste-pdf" target="_blank">
                                <i class="fi fi-sr-file-pdf text-xl" style="color:#0e49c7;"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <!-- suppression personnalisé -->
    <div class="body-element-delete"></div>
    <section class="body-error-alert" >
        <h2 class="alert-suppression-employe"><i class=""></i> Supprimer un employé</h2>
        <p class="context-suppression-employe">Vous voulez supprimer un employé dans votre base de données, cette action est definitive c'est-à-dire que la suppression d'un employé soit irrécupérable. </p>
        <form action="" method="POST" id="element-personnalise-abolition">
            @csrf
            @method('DELETE')
            <input type="submit" value="Suppression definitive" id="element-liste-delete">                   
        <div class="icon-sortie">
            <i class="fi fi-rr-circle-xmark" style="position:absolute;top:15px;right:15px;cursor:pointer;" id="quit"></i>
        </div>
    </section>
    <script>
        const backGrnd      = document.querySelector('.body-element-delete');
        const supprimer     = document.querySelector('.body-error-alert');
        const afficherSupprimer = document.querySelectorAll('.element-liste-delete');
        const sortir = document.querySelector('.icon-sortie');
        const formDelete = document.getElementById('element-personnalise-abolition');

        afficherSupprimer.forEach(btn => {
            btn.addEventListener('click', () => {
                const url = btn.getAttribute('data-url');
                formDelete.setAttribute('action', url);
                backGrnd.style.display = 'block';
                backGrnd.style.backdropFilter = 'blur(5px)';
                supprimer.style.display = 'block';
            });
        });
        [sortir, backGrnd].forEach(element => {
            element.addEventListener('click', () => {
                backGrnd.style.display = 'none';
                supprimer.style.display = 'none';
            });
        });

        
    </script>
@endsection