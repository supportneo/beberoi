<div class="page-header">
    <h1>
        Espace Client 
        <small>
            <i class="icon-double-angle-right"></i>
            Liste des paiements :
        </small>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php if ($this->id_panier) { ?>
            <p><a href="/extranet/paiement/retourpaybox/step/paye/id_panier/<?php echo $this->id_panier; ?>" class="btn btn-success">Valider le paiement</a> <a href="/extranet/paiement/retourpaybox/step/impaye/id_panier/<?php echo $this->id_panier; ?>" class="btn btn-warning">Refuser le paiement</a></p>
        <?php } ?>

        <?php if (count($this->paginator)) { ?>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover" width="95%">
                <thead>
                    <tr>

                        <th>Prix payé</th>
                        <th>Moyen de paiement</th>
                        <th>Statut du paiement</th>
                        <th>Date du paiement</th>
                        <th>Détails</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->paginator as $liste) { ?>
                        <tr>
                            <td><?php echo $this->FormatXfp($liste->prix_paye); ?></td>
                            <td><?php echo $liste->mode_paiement; ?></td>
                            <td><?php echo $this->GetStatutPanier($liste->statut_paiement); ?></td>
                            <td><?php echo $this->FormatDate($liste->date_modif); ?></td>
                            <td><a href="/extranet/paiement/achats/id_panier/<?php echo $liste->id_panier; ?>">Détails</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php echo $this->paginationControl($this->paginator, 'Sliding', 'pagination.php'); ?>

        <?php } else { ?>
            <p>Vous n'avez effectué aucun paiement pour le moment ...</p>
        <?php } ?>        


    </div>
</div>