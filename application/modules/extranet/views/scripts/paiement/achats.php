<div class="page-header">
    <h1>Espace clients <small><i class="icon-double-angle-right"></i> Historique de mes achats : </small></h1>
</div>
<div class="row">
    <div class="col-xs-12">  

        <?php if (count($this->paginator)) { ?>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover" width="95%">
                <thead>
                    <tr>
                        <th>Réf.</th>
                        <th>Nom du produit</th>
                        <th>Prix de vente</th>
                        <th>Prix payé</th>
                        <th>Date d'achat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->paginator as $liste) { ?>
                        <tr>
                            <td><?php echo $liste->ref_produit; ?></td>
                            <td><?php echo $liste->nom_produit; ?></td>
                            <td><?php echo $liste->prix_vente; ?></td>
                            <td><?php echo $liste->prix_paye; ?></td>
                            <td><?php echo $this->FormatDate($liste->date_insert); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php echo $this->paginationControl($this->paginator, 'Sliding', 'pagination.php'); ?>

        <?php } else { ?>
            <p>Vous n'avez effectué aucun achat pour le moment.</p>
        <?php } ?>        


    </div>
</div>