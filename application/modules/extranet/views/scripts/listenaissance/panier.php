<div class="page-header">
    <h1>
        Liste de naissances - Valider mon panier
    </h1>
</div>

<?php if (count($this->liste)) { ?>

    <div class="extra_info">
        <p><strong>Total du panier : </strong><?php echo $this->FormatXfp($this->infos->total_paye); ?></p>
        <p><strong>Statut du panier : </strong><?php echo $this->GetStatutPanier($this->infos->statut); ?></p>
        <?php echo $this->form->id_panier; ?>
        <p>Vous pouvez saisir dans le cadre un message à l'intention des parents.</p>
        <p>Une fois, votre paiement validé, les parents recevront un e-mail avec le contenu du panier, ainsi que le contenu du message que vous avez saisi à côté.</p>
    </div>

    <form method="post" action="/extranet/paiement/valider">
        <dl class="zend_form">
            <label>Message à l'intention des parents : </label>
            <?php echo $this->form->message; ?>   

            <label>Récapitulatif de votre panier :</label>
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
        </dl>
    </form>
<?php } else { ?>

    <div class="alert alert-info">Vous n'avez actuellement aucun produit dans votre panier...</div>

<?php } ?>
