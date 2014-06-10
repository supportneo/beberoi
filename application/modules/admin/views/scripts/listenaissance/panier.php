<div class="page-header">
    <h1>Administration <small><i class="icon-double-angle-right"></i>Détails du panier</small></h1>
</div>
<div class="row">
    <div class="col-xs-12">
        <p>Total du panier : <strong><?php echo $this->FormatXfp($this->infos->total_paye); ?></strong></p>
        <p>Statut du panier : <strong><?php echo $this->GetStatutPanier($this->infos->statut); ?></strong></p>

        <?php if (count($this->liste)) { ?>

            <input type="hidden" name="id_panier" value="<?php echo $this->id_panier; ?>" />

            <table id="sample-table-2" class="table table-striped table-bordered table-hover" width="95%">
                <thead>
                    <tr>
                        <th>Ref. produit</th>
                        <th>Nom produit</th>
                        <th>Prix de vente</th>
                        <th>Prix payé</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->liste as $liste) {
                        ?>
                        <tr>
                            <td><?php echo $liste->ref_produit; ?></td>
                            <td><?php echo $liste->nom_produit; ?></td>
                            <td><?php echo $this->FormatXfp($liste->prix_vente); ?></td>
                            <td><?php echo $this->FormatXfp($liste->prix_paye); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>



        <?php } else { ?>

            <div class="alert alert-info">Vous n'avez actuellement aucun produit dans votre panier...</div>

        <?php } ?>
    </div>
</div>