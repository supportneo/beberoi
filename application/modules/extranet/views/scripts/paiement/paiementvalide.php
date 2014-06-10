<div class="page-header">
    <h1>Espace client  <small><i class="icon-double-angle-right"></i> Paiement validé :</small></h1>
</div>
<div class="row">
    <div class="col-xs-12">   
        <p>Votre paiement a été validé avec succès.</p>
    </div>

    <div class="row">
        <div class="col-xs-12">   
            <h2>Suggestion de mail : </h2>
            <p>&nbsp;</p>
            <p>Bonjour,</p>
            <p><strong><?php echo $this->infos_client->prenom . ' ' . $this->infos_client->nom; ?></strong> a effectué une commande sur votre liste d'achats pour un montant de <?php echo $this->FormatXfp($this->infos->total_paye); ?>.</p>
            <p>Voici le composition du panier qu'il a préparé pour vous : </p>
            <ul>
                <?php foreach ($this->liste as $row) { ?>
                    <li><?php echo '<strong>' . $row->nom_produit . '</strong> (Ref. : ' . $row->ref_produit . ')'; ?> pour un montant de <?php echo $row->prix_paye . ' / ' . $row->prix_vente; ?></li>
                <?php } ?>
            </ul>
<p>Cordialement,</p>
        </div>


    </div>