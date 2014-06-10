<div class="page-header">
    <h1>Espace client <small><i class="icon-double-angle-right"></i> Valider mon panier :</small></h1>
</div>
<p>&nbsp;</p>
<?php if (count($this->liste)) { ?>

    <form method="post" action="/extranet/paiement/valider">

        <div class="row">
            <div class="col-xs-6"> 
                <p><strong>Total du panier : </strong><?php echo $this->FormatXfp($this->infos->total_paye); ?></p>
                <p><strong>Statut du panier : </strong><?php echo $this->GetStatutPanier($this->infos->statut); ?></p>
                <?php echo $this->form->id_panier; ?>
                <p>&nbsp;</p>
                <br />
                <div class="alert alert-info">
                <p>Vous pouvez saisir dans le cadre un message à l'intention des parents.</p>
                <p>Une fois, votre paiement validé, les parents recevront un e-mail avec le contenu du panier, ainsi que le contenu du message que vous avez saisi à côté.</p>
                </div>
            </div>
            <div class="col-xs-6"> 
                <p><strong>Message à l'intention des parents : </strong></p>
                <?php echo $this->form->message; ?>   
            </div>
        </div>
        <p>&nbsp;</p>
        <div class="row">
            <p><strong>Récapitulatif de votre panier :</strong></p>
            <table id="sample-table-2" class="table table-striped table-bordered table-hover" width="95%">
                <thead>
                    <tr>
                        <th>Ref. produit</th>
                        <th>Nom produit</th>
                        <th>Prix inital</th>
                        <th>Vous payez ?</th>
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

            <?php echo $this->form->submit; ?>
        </div>
    </form>
<?php } else { ?>

    <div class="alert alert-info">Vous n'avez actuellement aucun produit dans votre panier...</div>

<?php } ?>
