@extends('index.layouts')
@section('title', 'Pointage - Application')
@section('content')
    <article class="pointage-parent">
        <h2 style="color:#0e49c7; font-size:16px; font-weight:600;
            margin-bottom:13px;">Accomplir une presence</h2>  
        <div class="pointage-formulaire">
            <button id="checkin">Entrée</button>
            <!-- <button id="checkout">Sortie</button> -->
        </div>
        <div class="pointage-affichage">
            <h2 style="color:#0e49c7; font-size:16px; font-weight:600;
            margin-bottom:25px;">Tableau de pointage</h2>  
            <table class="pointage-affichage-table">
                <thead class="pointage-head-affichage">
                    <tr class="pointage-tr-head">
                        <th class="libelle-proprietaire">NOM COMPLET</th>
                        <th class="libelle-proprietaire">ENTREE</th>
                        <th class="libelle-proprietaire">SORTIE</th>
                        <th class="libelle-proprietaire">STATUT</th>
                        <th class="libelle-proprietaire">MOTIF</th>
                        <th class="libelle-proprietaire">DATE</th>
                        <th class="libelle-proprietaire">ACTION</th>
                    </tr>
                </thead>
                <tbody class="pointage-body-affichage">
                    @foreach ($presences as $present)
                    <tr class="pointage-body-tr">
                        <td class="resultat-element-pointage">{{ $present->employes->nom}} <span class="resultat-prenom">{{ $present->employes->prenom }}</span></td>
                        <td class="resultat-element-pointage">{{ $present->check_in }}</td>
                        <td class="resultat-element-pointage">{{ $present->check_out }}</td>
                        <td class="resultat-element-pointage">{{ $present->statut }}</td>
                        <td class="resultat-element-pointage">{{$present->motifs}}</td>
                        <td class="resultat-element-pointage">{{ $present->date_pointage }}</td>
                        <td class="resultat-element-pointage">
                            <button class="btn-checkout"
                            data-id="{{ $present->id }}" 
                            data-nom="{{ $present->employes->nom ?? 'Inconnu' }} {{ $present->employes->prenom ?? '' }}"
                            data-statut="{{ $present->statut }}"
                            data-date="{{ $present->date_pointage }}"
                            data-check_in="{{ $present->check_in }}"
                            >Sortir</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </article>
    <div id="blur-conteneur" style="display: none;"></div>
    <section id="check-in-parent" style="display: none;">
        <div class="check-in-conteneur">
            <h2 class="check-in-title">Moment de pointage</h2>
            <form action="{{ route('store.pointage') }}" method="post" id="check-in-formulaire">
                @csrf
                <div class="check-in-groupe">
                    <label for="id_employe" class="check-in-lab">Matricule *</label>
                    <select name="id_employe" id="check-in-input" required>
                        @foreach ($emp as $employe)
                            <option id="check-in-option" value="{{ $employe->id }}">{{ $employe->nom }} {{ $employe->prenom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="check-in-groupe">
                    <label for="statut" class="check-in-lab">Statut *</label>
                    <select name="statut" id="check-in-input-select" required>
                        <option id="check-in-option" value="Présent">Présent</otpion>
                        <option id="check-in-option" value="Retard">Retard</otpion>
                    </select>
                </div>
                <div class="check-in-groupe">
                    <label for="date_pointage" class="check-in-lab">Date du jours *</label>
                    <input type="date" name="date_pointage" id="check-in-input-date" required>
                    <small id="message-error"></small>
                </div>
                <div class="check-in-groupe">
                    <label for="check_in" class="check-in-lab">Heure d'entrée *</label>
                    <input type="time" name="check_in" id="check-in-input">
                </div>
                <div class="check-in-groupe">
                    <label for="motifs" class="check-in-lab">Motifs *</label>
                    <input type="text" name="motifs" id="check-in-input-motifs" required>
                </div>
                <div class="check-in-validate">
                    <input type="submit" value="Présence" id="validate-checkIN">
                </div>
                <div class="icon-sortie">
                    <i class="fi fi-rr-circle-xmark" style="position:absolute;top:15px;right:15px;cursor:pointer;" id="fermer"></i>
                </div>
            </form>
        </div>
    </section>
    <section id="check-out-parent" style="display: none;">
        <div class="check-in-conteneur">
            <h2 class="check-in-title">Valider la sortie</h2>
            <form action="" method="post" id="form-checkout">
                @csrf
                @method('PUT')
                <div class="check-in-groupe">
                    <label class="check-in-lab">Nom complet *</label>
                    <input type="text" id="out-nom" disabled >
                </div>
                <div class="check-in-groupe">
                    <label class="check-in-lab">Statut *</label>
                    <input type="text" id="out-statut" disabled >
                </div>
                <div class="check-in-groupe">
                    <label for="date_presence" class="check-in-lab">Date du jours *</label>
                    <input type="date" name="date_presence" id="out-date"  disabled >
                </div>
                <div class="check-in-groupe">
                    <label for="check_out" class="check-in-lab">Heure de sortie *</label>
                    <input type="time" name="check_out" id="check-in-input-out">
                </div>
                <div class="check-in-validate">
                    <input type="submit" value="Sortie" id="validate-checkIN">
                </div>
                <div class="icon-sortie">
                    <i class="fi fi-rr-circle-xmark" style="position:absolute;top:15px;right:15px;cursor:pointer;" id="quit"></i>
                </div>
            </form>
        </div>
    </section>
</div>
<script>
    const getCheckin = document.getElementById('checkin');
    const getCheckOut = document.querySelectorAll('.btn-checkout');
    const Conteneur = document.getElementById('blur-conteneur');
    const printModal = document.getElementById('check-in-parent');
    const quitter = document.getElementById('fermer');
    const sortir = document.getElementById('check-out-parent');
    const xmark = document.getElementById('quit');
    
    const formCheckout = document.getElementById('form-checkout');
    const outNom = document.getElementById('out-nom');
    const outStatut = document.getElementById('out-statut');
    const outDate = document.getElementById('out-date');

    const datePointage = document.getElementById('check-in-input-date');
    const errorMessage = document.getElementById('message-error');

    datePointage.addEventListener('input', () => {
        const selectedDate = new Date(datePointage.value);
        selectedDate.setHours(0, 0, 0, 0); // Réinitialiser l'heure pour comparer uniquement les dates
        const today = new Date();
        today.setHours(0, 0, 0, 0); // Réinitialiser l'heure pour comparer uniquement les dates

        if (selectedDate > today) {
            errorMessage.textContent = "La date ne peut pas être dans le futur.";
            errorMessage.style.color = "#d32f2f";
            errorMessage.style.fontSize = "12px";
            datePointage.value = ''; // Réinitialiser le champ de date
        } else {
            errorMessage.textContent = "La date est valide."; // Effacer le message d'erreur si la date est valide
            errorMessage.style.color = "#388e3c";
            errorMessage.style.fontSize = "12px";
            errorMessage.style.fontWeight = "500";
        }
    });
    getCheckOut.forEach(button => {
        button.addEventListener('click', () => {
            const nom = button.getAttribute('data-nom');
            const statut = button.getAttribute('data-statut');
            const date = button.getAttribute('data-date');
            formCheckout.action = `/presence/presenceAjout/${button.getAttribute('data-id')}`;

            outNom.value = nom;
            outStatut.value = statut;
            outDate.value = date;
            Conteneur.style.display = 'block';
            Conteneur.style.backdropFilter = 'blur(5px)';
            sortir.style.display = 'block';
        });
    });


    getCheckin.addEventListener('click', () => {
        Conteneur.style.display = 'block';
        Conteneur.style.backdropFilter = 'blur(5px)';
        printModal.style.display = 'block';
    })
    
    Conteneur.addEventListener('click', () => {
        Conteneur.style.display = 'none';
        printModal.style.display = 'none';
        sortir.style.display = 'none';
    })
    quitter.addEventListener('click', () =>{
        Conteneur.style.display = 'none';
        printModal.style.display = 'none';
    })
    xmark.addEventListener('click', () =>{
        Conteneur.style.display = 'none';
        sortir.style.display = 'none';
    })
</script>
@endsection
