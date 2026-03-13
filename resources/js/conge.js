const bouton = document.getElementById('combo');
const presenceBtn = document.getElementById('search');
const deuxDate = document.getElementById('dateRequete')

bouton.addEventListener('click', (e) => {
    if(presenceBtn.style.display == 'none'){
        deuxDate.style.display = 'block';
        presenceBtn.style.display = 'none';
    }else{
        deuxDate.style.display = 'none';
        presenceBtn.style.display = 'block';
    }
})