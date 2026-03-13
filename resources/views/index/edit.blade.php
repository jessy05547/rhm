@extends('index.layouts')

@section('title', 'Modifier mon profil')

@section('content')
<div class="edit-profil-wrapper">

    {{-- En-tête de page --}}
    <div class="edit-header">
        <div class="edit-avatar-bloc">
            <div class="edit-avatar-preview" id="avatarPreview">
                @if($utilisateur->hasMedia('photos'))
                    <img src="{{ $utilisateur->getFirstMediaUrl('photos') }}"
                         alt="Photo de profil"
                         id="currentAvatar">
                @else
                    <img src="{{ asset('images/default-avatar.png') }}"
                         alt="Avatar par défaut"
                         id="currentAvatar">
                @endif
                <div class="avatar-overlay" id="avatarOverlay">
                    <i class="fi fi-rr-camera"></i>
                </div>
            </div>
            <div class="edit-user-info">
                <h2 style="color:#fff;">{{ $utilisateur->nom }} {{ $utilisateur->prenom }}</h2>
                <span class="edit-matricule">{{ $utilisateur->matricule }}</span>
                <span class="edit-poste">{{ $utilisateur->postes->intitule ?? '—' }}</span>
            </div>
        </div>
    </div>

    {{-- Formulaire principal --}}
    <form action="{{ route('user.edit') }}" method="POST" id="editForm">
        @csrf
        @method('PUT')

        {{-- ───── Section : Informations personnelles ───── --}}
        <div class="edit-section">
            <h3 class="section-title">
                <i class="fi fi-rr-user"></i> Informations personnelles
            </h3>
            <div class="edit-grid">

                <div class="edit-field">
                    <label for="nom">Nom <span class="required">*</span></label>
                    <input type="text" id="nom" name="nom"
                           value="{{ old('nom', $utilisateur->nom) }}"
                           class="{{ $errors->has('nom') ? 'input-error' : '' }}"
                           placeholder="Votre nom">
                    @error('nom')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-field">
                    <label for="prenom">Prénom <span class="required">*</span></label>
                    <input type="text" id="prenom" name="prenom"
                           value="{{ old('prenom', $utilisateur->prenom) }}"
                           class="{{ $errors->has('prenom') ? 'input-error' : '' }}"
                           placeholder="Votre prénom">
                    @error('prenom')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-field">
                    <label for="cin">CIN <span class="required">*</span></label>
                    <input type="text" id="cin" name="cin"
                           value="{{ old('cin', $utilisateur->cin) }}"
                           class="{{ $errors->has('cin') ? 'input-error' : '' }}"
                           placeholder="12 chiffres"
                           maxlength="12">
                    @error('cin')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-field">
                    <label for="sexe">Sexe <span class="required">*</span></label>
                    <select id="sexe" name="sexe" class="{{ $errors->has('sexe') ? 'input-error' : '' }}">
                        <option value="">-- Choisir --</option>
                        <option value="Masculin"  {{ old('sexe', $utilisateur->sexe) === 'Masculin'  ? 'selected' : '' }}>Masculin</option>
                        <option value="Féminin"   {{ old('sexe', $utilisateur->sexe) === 'Féminin'   ? 'selected' : '' }}>Féminin</option>
                    </select>
                    @error('sexe')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-field">
                    <label for="date_naissance">Date de naissance <span class="required">*</span></label>
                    <input type="date" id="date_naissance" name="date_naissance"
                           value="{{ old('date_naissance', \Carbon\Carbon::parse($utilisateur->date_naissance)->format('Y-m-d')) }}"
                           class="{{ $errors->has('date_naissance') ? 'input-error' : '' }}">
                    @error('date_naissance')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-field">
                    <label for="telephone">Téléphone <span class="required">*</span></label>
                    <input type="text" id="telephone" name="telephone"
                           value="{{ old('telephone', $utilisateur->telephone) }}"
                           class="{{ $errors->has('telephone') ? 'input-error' : '' }}"
                           placeholder="+261 XX XX XXX XX">
                    @error('telephone')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-field edit-field--full">
                    <label for="adresse">Adresse <span class="required">*</span></label>
                    <input type="text" id="adresse" name="adresse"
                           value="{{ old('adresse', $utilisateur->adresse) }}"
                           class="{{ $errors->has('adresse') ? 'input-error' : '' }}"
                           placeholder="Votre adresse complète">
                    @error('adresse')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

        {{-- ───── Section : Informations professionnelles ───── --}}
        <div class="edit-section">
            <h3 class="section-title">
                <i class="fi fi-rr-briefcase"></i> Informations professionnelles
            </h3>
            <div class="edit-grid">

                <div class="edit-field">
                    <label for="id_poste">Poste <span class="required">*</span></label>
                    <select id="id_poste" name="id_poste" class="{{ $errors->has('id_poste') ? 'input-error' : '' }}">
                        <option value="">-- Choisir un poste --</option>
                        @foreach($postes as $poste)
                            <option value="{{ $poste->id }}"
                                {{ old('id_poste', $utilisateur->id_poste) == $poste->id ? 'selected' : '' }}>
                                {{ $poste->poste }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_poste')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-field">
                    <label for="id_departement">Département <span class="required">*</span></label>
                    <select id="id_departement" name="id_departement" class="{{ $errors->has('id_departement') ? 'input-error' : '' }}">
                        <option value="">-- Choisir un département --</option>
                        @foreach($deps as $dep)
                            <option value="{{ $dep->id }}"
                                {{ old('id_departement', $utilisateur->id_departement) == $dep->id ? 'selected' : '' }}>
                                {{ $dep->departement }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_departement')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-field">
                    <label for="date_embauche">Date d'embauche <span class="required">*</span></label>
                    <input type="date" id="date_embauche" name="date_embauche"
                           value="{{ old('date_embauche', \Carbon\Carbon::parse($utilisateur->date_embauche)->format('Y-m-d')) }}"
                           class="{{ $errors->has('date_embauche') ? 'input-error' : '' }}">
                    @error('date_embauche')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-field">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email"
                           value="{{ old('email', $utilisateur->email) }}"
                           class="{{ $errors->has('email') ? 'input-error' : '' }}"
                           placeholder="email@exemple.com">
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

        {{-- ───── Section : Photo de profil (FilePond) ───── --}}
        <div class="edit-section">
            <h3 class="section-title">
                <i class="fi fi-rr-camera"></i> Photo de profil
            </h3>
            <div class="edit-grid">
                <div class="edit-field edit-field--full">
                    {{-- Input FilePond - remplacé par JS --}}
                    <input type="file" name="photo" id="register-photo-input" data-allow-reorder="true"> 
                    {{-- Champ caché qui reçoit le chemin temporaire retourné par FilePond --}}
                    <!-- <input type="hidden" name="photo" id="photo"> -->
                </div>
            </div>
        </div>

        {{-- ───── Section : Changer le mot de passe ───── --}}
        <div class="edit-section">
            <h3 class="section-title toggle-pwd" id="togglePwd" style="cursor:pointer;">
                <i class="fi fi-rr-lock"></i> Changer le mot de passe
                <i class="fi fi-rr-angle-down toggle-icon" id="pwdIcon"></i>
            </h3>
            <div class="edit-grid" id="pwdFields" style="display:none;">

                <div class="edit-field">
                    <label for="password">Nouveau mot de passe</label>
                    <div class="pwd-wrapper">
                        <input type="password" id="password" name="password"
                               class="{{ $errors->has('password') ? 'input-error' : '' }}"
                               placeholder="8 caractères minimum">
                        <button type="button" class="toggle-eye" data-target="password">
                            <i class="fi fi-rr-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-field">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <div class="pwd-wrapper">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               placeholder="Répétez le mot de passe">
                        <button type="button" class="toggle-eye" data-target="password_confirmation">
                            <i class="fi fi-rr-eye"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        {{-- ───── Actions ───── --}}
        <div class="edit-actions">
            <a href="{{ route('index.dashboard') }}" class="btn-annuler">
                <i class="fi fi-rr-cross"></i> Annuler
            </a>
            <button type="submit" class="btn-sauvegarder">
                <i class="fi fi-rr-check"></i> Enregistrer
            </button>
        </div>

    </form>
</div>

{{-- ───── Styles spécifiques à cette page ───── --}}
<style>
    .edit-profil-wrapper {
        max-width: 860px;
        margin: 0 auto;
        padding: 2rem 1.5rem 4rem;
        display: flex;
        flex-direction: column;
        gap: 1.8rem;
    }

    /* ── En-tête avatar ── */
    .edit-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        padding-bottom: 1.2rem;
        border-bottom: 1px solid rgba(255,255,255,0.08);
    }
    .edit-avatar-bloc { display: flex; align-items: center; gap: 1.2rem; }
    .edit-avatar-preview {
        position: relative;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
        border: 3px solid #0e49c7;
        flex-shrink: 0;
    }
    .edit-avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .avatar-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.45);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity .2s;
        color: #fff;
        font-size: 1.3rem;
    }
    .edit-avatar-preview:hover .avatar-overlay { opacity: 1; }

    .edit-user-info { display: flex; flex-direction: column; gap: .25rem; }
    .edit-user-info h2 { margin: 0; font-size: 1.15rem; font-weight: 600; }
    .edit-matricule {
        font-size: .78rem;
        background: rgba(252,163,2,.15);
        color: #0e49c7;
        padding: .15rem .55rem;
        border-radius: 20px;
        width: fit-content;
    }
    .edit-poste { font-size: .82rem; opacity: .65; }

    /* ── Section ── */
    .edit-section {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 12px;
        padding: 1.5rem 1.5rem 1.2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    .section-title {
        margin: 0 0 .4rem;
        font-size: .9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: #0e49c7;
        display: flex;
        align-items: center;
        gap: .5rem;
    }
    .toggle-icon { margin-left: auto; font-size: .8rem; transition: transform .25s; }
    .toggle-icon.open { transform: rotate(180deg); }

    /* ── Grille champs ── */
    .edit-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem 1.5rem;
    }
    .edit-field { display: flex; flex-direction: column; gap: .35rem; }
    .edit-field--full { grid-column: 1 / -1; }

    .edit-field label {
        font-size: .8rem;
        font-weight: 500;
        opacity: .75;
        text-transform: uppercase;
        letter-spacing: .04em;
        color:#0e49c7;
    }
    .required { color: #0e49c7; }

    .edit-field input,
    .edit-field select {
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 8px;
        padding: .6rem .85rem;
        color: #fff;
        font-size: .93rem;
        transition: border-color .2s, background .2s;
        outline: none;
        width: 100%;
        box-sizing: border-box;
    }
    .edit-field input:focus,
    .edit-field select:focus {
        border-color: #0e49c7;
        background: rgba(252,163,2,.06);
    }
    .input-error { border-color: #e53e3e !important; }
    .field-error { font-size: .78rem; color: #fc8181; }

    /* ── Password toggle ── */
    .pwd-wrapper { position: relative; }
    .pwd-wrapper input { padding-right: 2.6rem; }
    .toggle-eye {
        position: absolute;
        right: .7rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: inherit;
        opacity: .5;
        transition: opacity .2s;
        padding: 0;
    }
    .toggle-eye:hover { opacity: 1; }

    /* ── Boutons actions ── */
    .edit-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        padding-top: .5rem;
    }
    .btn-annuler, .btn-sauvegarder {
        display: flex;
        align-items: center;
        gap: .45rem;
        padding: .65rem 1.5rem;
        border-radius: 8px;
        font-size: .9rem;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        transition: all .2s;
        border: none;
    }
    .btn-annuler {
        background: rgba(255,255,255,0.07);
        color: inherit;
        border: 1px solid rgba(255,255,255,0.12);
    }
    .btn-annuler:hover { background: rgba(255,255,255,0.12); }
    .btn-sauvegarder {
        background: #0e49c7;
        color: #1a1a1a;
        font-weight: 600;
    }
    .btn-sauvegarder:hover { background: #e09200; transform: translateY(-1px); }

    @media (max-width: 600px) {
        .edit-grid { grid-template-columns: 1fr; }
    }
</style>

{{-- ───── Scripts ───── --}}
<script>
    // Toggle section mot de passe
    document.getElementById('togglePwd').addEventListener('click', () => {
        const fields = document.getElementById('pwdFields');
        const icon   = document.getElementById('pwdIcon');
        const isOpen = fields.style.display !== 'none';
        fields.style.display = isOpen ? 'none' : 'grid';
        icon.classList.toggle('open', !isOpen);
    });

    // Afficher/masquer mot de passe
    document.querySelectorAll('.toggle-eye').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = document.getElementById(btn.dataset.target);
            input.type  = input.type === 'password' ? 'text' : 'password';
        });
    });

    
    
</script>
@endsection