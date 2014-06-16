<div class="page-header">
    <h1>
        Administration - Liste des paiements reçus
    </h1>
</div>

<div class="extra_info">
    <p>N° de transaction de bancaire délivré par l'établissement bancaire.</p>        
</div>

<?php if (count($this->paginator)) { ?>
    <table id="sample-table-2" class="table table-striped table-bordered table-hover" width="95%">
        <thead>
            <tr>
                <th>N° Panier</th>
                <th>Nom du client</th>
                <th>Nom de famille</th>
                <th>Prénom de l'enfant</th>
                <th>Prix payé</th>
                <th>Moyen</th>
                <th>Statut</th>
                <th>N° trans.</th>
                <th>Date demande paiement</th>
                <th>Date paiement validé</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->paginator as $liste) { ?>
                <tr>
                    <td><a href="/admin/listenaissance/panier/id_panier/<?php echo $liste->id_panier; ?>"><?php echo $liste->id_panier; ?></a></td>
                    <td><?php echo ucfirst(strtolower($liste->nom)) . ' ' . ucfirst(strtolower($liste->prenom)); ?></td>
                    <td><?php echo ucfirst(strtolower($liste->nom_famille)); ?> </td>
                    <td><?php echo ucfirst(strtolower($liste->prenom_enfant)); ?></td>
                    <td><?php echo $this->FormatXfp($liste->prix_paye); ?></td>
                    <td><?php echo $liste->mode_paiement; ?></td>
                    <td><?php echo $this->GetStatutPanier($liste->statut_paiement); ?></td>
                    <td><?php echo $liste->no_transaction; ?></td>
                    <td><?php echo $this->FormatDate($liste->date_insert); ?></td>
                    <td><?php echo $this->FormatDate($liste->date_modif); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php echo $this->paginationControl($this->paginator, 'Sliding', 'pagination.php'); ?>

<?php } else { ?>
    <p>Aucun paiement n'a été effectué pour le moment.</p>
<?php } ?>