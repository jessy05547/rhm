document.addEventListener('DOMContentLoaded', function() {
    // 1. Récupération de l'élément
    const inputElement = document.querySelector('#register-photo-input');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // 2. Création de l'instance UNIQUE
    const pond = window.FilePond.create(inputElement, {
        labelIdle: 'Glissez votre photo ou <span class="filepond--label-action">Parcourez</span>',
        allowMultiple: false,
        instantUpload: true,
        name: 'photo', // Doit correspondre à $request->hasFile('photo') dans le controller

        server: {
            url: '',
            process: {
                url: '/upload/process',
                method: 'POST',
                onload:(response) => {
                    // Le controller renvoie le chemin temporaire du fichier
                    // On doit le stocker dans file.serverId pour le récupérer dans onprocessfile
                    return response; // Assurez-vous que c'est bien le chemin qui est renvoyé
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
            },
            revert: {
                url: '/upload/revert',
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
            }
        },

        // 3. Gestion des événements
        onprocessfile: (error, file) => {
            if (error) {
                console.error('Erreur lors de l\'upload:', error);
                return;
            }
            
            // file.serverId contient le chemin renvoyé par FileUploadController@process
            console.log('Fichier uploadé temporairement:', file.serverId);
            
            // IMPORTANT : On met à jour l'input caché pour le formulaire final
            // Assurez-vous que le name est bien "photo" pour votre controller store
            const hiddenInput = document.querySelector('input[name="photo"]');
            if (hiddenInput) {
                hiddenInput.value = file.serverId;
            }
        }
    });
});