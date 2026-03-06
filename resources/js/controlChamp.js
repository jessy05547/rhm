const input         = document.getElementById('register-input-naissance');
const sms           = document.getElementById('message-date');

const message       = document.getElementById('password-message');
const embaucheInput = document.getElementById('emp-input-cont-embauche');
const embaucheSms   = document.getElementById('message-embauche');

const success       = document.getElementsByClassName('success-message');

const cin = document.getElementById('emp-input-cont-cin');
cin.addEventListener('input', function(e) {
    // 1. Supprimer tout ce qui n'est pas un chiffre
    let value = this.value.replace(/\D/g, '');

    // 2. ON LIMITE À 12 CHIFFRES
    if (value.length > 12) {
        value = value.substring(0, 12);
    }
    // 2. Ajouter un espace tous les 3 chiffres (en partant de la fin)
    // Cette regex regarde les groupes de 3 chiffres
    let formattedValue = value.replace(/(\d{3})(?=\d)/g, '$1 ');

    // 3. Réinjecter la valeur formatée dans l'input
    this.value = formattedValue;
});

embaucheInput.addEventListener('input', () => {
    const [year, moth, day] = embaucheInput.value.split("-");
    const embaucheDate = new Date(year, moth - 1, day);
    const today = new Date();

    if(embaucheDate.getFullYear() == today.getFullYear() && embaucheDate.getMonth() == today.getMonth() && embaucheDate.getDate() <= today.getDate()){
        embaucheSms.textContent = "Date accepté!";
        embaucheSms.style.color = "green";
        embaucheInput.style.borderColor = "green";
        embaucheSms.style.fontSize = "12px";
    }else if (embaucheDate.getFullYear() == today.getFullYear() && embaucheDate.getMonth() < today.getMonth()) {
        embaucheSms.textContent = "Date accepté!";
        embaucheSms.style.color = "green";
        embaucheInput.style.borderColor = "green";
        embaucheSms.style.fontSize = "12px";
    }else if(embaucheDate.getFullYear() < today.getFullYear()){
        embaucheSms.textContent = "Date accepté!";
        embaucheSms.style.color = "green";
        embaucheInput.style.borderColor = "green";
        embaucheSms.style.fontSize = "12px";
    }else{
        embaucheSms.textContent = "Attention! la date est incorrect!";
        embaucheSms.style.color = "red";
        embaucheInput.style.borderColor = "red";
        embaucheSms.style.fontSize = "12px";
        embaucheInput.value = "";
    }
})
input.addEventListener('input', () => {
    if(!input.value && !embaucheInput.value){
        sms.textContent = "";
        embaucheSms.textContent = "";
        return;
    }
    
    const [y, m, d] = input.value.split("-");
    const birth     = new Date(y, m - 1, d);
    const today     = new Date();

    let age = today.getFullYear() - birth.getFullYear();
    if(age >= 21 && age < 60){
        sms.textContent = "Âge validé!";
        sms.style.color = "green";
        input.style.border = "1px"
        input.style.borderColor = "green";
        sms.style.fontSize = "12px";
    }else{
        sms.textContent = "Vous devez avoir au moins 21 ans";
        sms.style.color = "red";
        input.style.borderColor = "red";
        input.style.border = "1px";
        sms.style.fontSize = "12px";
        input.value = "";
    }
})