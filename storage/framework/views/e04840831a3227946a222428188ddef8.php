<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche de paie - <?php echo e($employe->nom); ?></title>
    <style>
        /* Intégration directe du CSS pour garantir le rendu dans le PDF */
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; line-height: 1.5; margin: 0; padding: 20px; }
        header { display: flex; justify-content: space-between; border-bottom: 2px solid #444; padding-bottom: 20px; margin-bottom: 30px; }
        .nom_entreprise { font-size: 24px; color: #2c3e50; margin: 0; }
        .tax p, .rue_adr { font-size: 12px; margin: 2px 0; color: #666; }
        .entreprise-logo { text-align: right; }
        .identity { margin-top: 10px; font-size: 13px; }
        
        .employe-info { background: #f9f9f9; padding: 15px; border-radius: 5px; margin-bottom: 30px; }
        .employe-info p { margin: 5px 0; }
        
        .paie-table { width: 100%; border-collapse: collapse; }
        .paie-table th { background: #2c3e50; color: white; padding: 12px; text-align: left; }
        .paie-table td { border-bottom: 1px solid #eee; padding: 12px; }
        .total-row { background: #f2f2f2; font-weight: bold; font-size: 1.2em; }
        
        /* Évite de couper le tableau sur deux pages si possible */
        table { page-break-inside: auto; }
        tr { page-break-inside: avoid; page-break-after: auto; }
    </style>
</head>
<body>
    <header>
        <div class="entreprise">
            <h1 class="nom_entreprise">Gestion Ressources Humaines</h1>
            <p class="rue_adr">Rue Ranavalona, 101 Antananarivo</p>
            <div class="tax">
                <p class="siret">Siret : 12345678901234</p>
                <p class="ape">Ape : 9499Z</p> 
            </div>
        </div>
        <div class="entreprise-logo">
            
            <?php
                $logoPath = public_path('imgs/logo.png');
                $logoData = "";
                if (file_exists($logoPath)) {
                    $logoData = base64_encode(file_get_contents($logoPath));
                }
            ?>
            <img src="data:image/png;base64,<?php echo e($logoData); ?>" alt="Logo" width="100">
            
            <div class="identity">
                <p class="session-paie"><strong>Période :</strong> <?php echo e($debutPeriode); ?> au <?php echo e($finPeriode); ?></p>
                <p class="date-paie"><strong>Date de paiement :</strong> <?php echo e($dateReference); ?></p>
            </div>
        </div>
    </header>

    <section>
        <div class="employe-info">
            <p class="employe-name"><strong>Nom et prénom :</strong> <?php echo e($employe->nom); ?> <?php echo e($employe->prenom); ?></p>
            <p class="employe-matricule"><strong>Matricule :</strong> <?php echo e($employe->matricule ?? 'N/A'); ?></p>
            <p class="employe-poste"><strong>Poste :</strong> <?php echo e($employe->postes->poste ?? 'Salarié'); ?></p>
        </div>

        <table class="paie-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Salaire de base</td>
                    <td><?php echo e(number_format($employe->postes->salaire ?? 2000, 2, ',', ' ')); ?> Ar</td>
                </tr>
                
                <?php if(isset($coutHeuresSupp) && $coutHeuresSupp > 0): ?>
                <tr>
                    <td>Heures supplémentaires</td>
                    <td>Heures supplémentaires (Maj. 25%)</td>
                    <td><?php echo e($totalHeuresSupp); ?> h</td>
                    <td><?php echo e(number_format($coutHeuresSupp, 2, ',', ' ')); ?> Ar</td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td>Primes</td>
                    <td>0 Ar</td>
                </tr>
                <tr class="total-row">
                    <td>Total à payer</td>
                    <td><?php echo e(number_format($employe->postes->salaire + ($coutHeuresSupp ?? 0), 2, ',', ' ')); ?> Ar</td>
                </tr>
            </tbody>
        </table>
    </section>

    <footer style="position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 10px; color: #999;">
        Fiche de paie générée numériquement le <?php echo e(date('d/m/Y')); ?>

    </footer>
</body>
</html><?php /**PATH C:\wamp64\www\rhm\resources\views/employe/pdf.blade.php ENDPATH**/ ?>