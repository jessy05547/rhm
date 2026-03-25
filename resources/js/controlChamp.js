document.addEventListener('DOMContentLoaded', () => {

    // --- SÉLECTION DES ÉLÉMENTS ---
    const inputNaissance = document.getElementById('register-input-naissance');
    const smsDate = document.getElementById('message-date');
    const pwdp = document.getElementById('register-input-password');
    const pwdConf = document.getElementById('register-input-confirmation');
    const messagePwd = document.getElementById('password-message');
    const smsPwd = document.getElementById('password-sms');
    const embaucheInput = document.getElementById('emp-input-cont-embauche');
    const embaucheSms = document.getElementById('message-embauche');
    const cinInput = document.getElementById('emp-input-cont-cin');

    // --- VALIDATION MOT DE PASSE (Uniquement si présent) ---
    if (pwdp) {
        pwdp.addEventListener('input', () => {
            let value = pwdp.value;
            if (value.length === 0) {
                smsPwd.textContent = "";
            } else if (value.length < 8) {
                smsPwd.textContent = "mot de passe inférieur à 8!";
                smsPwd.style.color = "red";
                pwdp.style.borderColor = "red";
            } else {
                smsPwd.textContent = "Mot de passe accepté!";
                smsPwd.style.color = "green";
                pwdp.style.borderColor = "green";
            }
            smsPwd.style.fontSize = "12px";
        });
    }

    // --- VALIDATION CONFIRMATION (Uniquement si présent) ---
    if (pwdConf && pwdp) {
        pwdConf.addEventListener('input', () => {
            let value = pwdConf.value;
            if (value === '') {
                messagePwd.textContent = "";
            } else if (value !== pwdp.value) {
                messagePwd.textContent = "votre mot de passe de confirmation est érroné!";
                messagePwd.style.color = "red";
                pwdConf.style.borderColor = "red";
            } else {
                messagePwd.textContent = "Confirmation acceptée!";
                messagePwd.style.color = "green";
                pwdConf.style.borderColor = "green";
            }
            messagePwd.style.fontSize = "12px";
        });
    }

    // --- FORMATTAGE CIN (Uniquement si présent) ---
    if (cinInput) {
        cinInput.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 12) {
                value = value.substring(0, 12);
            }
            let formattedValue = value.replace(/(\d{3})(?=\d)/g, '$1 ');
            this.value = formattedValue;
        });
    }

    // --- VALIDATION DATE D'EMBAUCHE (Uniquement si présent) ---
    if (embaucheInput && embaucheSms) {
        embaucheInput.addEventListener('input', () => {
            if (!embaucheInput.value) return;

            const selectedDate = new Date(embaucheInput.value);
            const today = new Date();
            
            selectedDate.setHours(0, 0, 0, 0);
            today.setHours(0, 0, 0, 0);

            if (selectedDate <= today) {
                embaucheSms.textContent = "Date acceptée !";
                embaucheSms.style.color = "green";
                embaucheInput.style.borderColor = "green";
            } else {
                embaucheSms.textContent = "Erreur : La date d'embauche ne peut pas être dans le futur.";
                embaucheSms.style.color = "red";
                embaucheInput.style.borderColor = "red";
                embaucheInput.value = "";
            }
            embaucheSms.style.fontSize = "12px";
        });
    }

    // --- VALIDATION DATE DE NAISSANCE / ÂGE (Uniquement si présent) ---
    if (inputNaissance && smsDate) {
        inputNaissance.addEventListener('input', () => {
            if (!inputNaissance.value) return;
            
            const birthDate = new Date(inputNaissance.value);
            const today = new Date();
            
            let age = today.getFullYear() - birthDate.getFullYear();
            const m = today.getMonth() - birthDate.getMonth();
            
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            if (age >= 21 && age < 60) {
                smsDate.textContent = "Âge validé (" + age + " ans)";
                smsDate.style.color = "green";
                inputNaissance.style.borderColor = "green";
            } else {
                smsDate.textContent = "L'employé doit avoir entre 21 et 60 ans (Actuellement : " + age + " ans)";
                smsDate.style.color = "red";
                inputNaissance.style.borderColor = "red";
                inputNaissance.value = "";
            }
            smsDate.style.fontSize = "12px";
        });
    }
});