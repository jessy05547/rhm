<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Chemin de stockage temporaire
    |--------------------------------------------------------------------------
    */
    'temporary_files_path' => storage_path('app/filepond'),
    'temporary_files_disk' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Configuration du Chunking (Découpage)
    |--------------------------------------------------------------------------
    */
    'server' => [
        'process' => [
            'chunk_uploads' => true, // Active le support du découpage côté serveur
            'chunk_size' => 1048576,  // DOIT être identique au JS : 1048576 (1Mo)
        ],
    ],

    'expiration' => 30, // minutes
];