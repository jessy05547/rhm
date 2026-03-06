
document.addEventListener('DOMContentLoaded', function() {
        // On récupère l'élément
        const inputElement = document.querySelector('#register-photo-input');
        
        // On crée l'instance FilePond en utilisant window.FilePond
        const pond = window.FilePond.create(inputElement, {
            labelIdle: 'Glissez votre photo ou <span class="filepond--label-action">Parcourez</span>',
            allowMultiple: false,
            instantUpload: true, // Téléchargement immédiat lors de la sélection
    
             server: {
                url: '/filepond/api', // L'URL de base configurée dans vos routes Sopamo
                process: {
                    url: '/process',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
            // CONFIGURATION DU CHUNKING
                    chunkUploads: false, // Autorise le découpage
                    chunkSize: 1048576, // Taille d'un morceau : 1Mo (1024 * 1024 octets)
                    forceChunking: false, // TRÈS IMPORTANT : Si false, ne découpe QUE si le fichier > chunkSize
                },
            revert: '/revert', // Route pour annuler un upload
        },

    // Gestion des événements pour le débogage (Optionnel)
    onprocessfile: (error, file) => {
        if (error) {
            console.error('Erreur lors de l\'upload:', error);
            return;
        }
        console.log('Fichier traité avec succès, ID serveur:', file.serverId);
        }
        });
    });