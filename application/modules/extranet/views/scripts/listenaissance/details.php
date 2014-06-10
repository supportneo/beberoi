<h2>Liste de naissance n°<?php echo $this->id_liste; ?> :</h2>

<p>Saisissez simplement le prix sur la zone texte en face du produit pour pouvoir effectuer votre choix.</p>
<p>Une fois, votre choix effectué, vous serez redirigé vers une page récapitulative de votre commande pour réaliser votre paiement.</p>

<p>Liste de naissance pour le bébé : <strong><?php echo $this->infos->prenom_enfant.' '.$this->infos->nom_famille; ?></strong></p>

<p>Date de naissance : <strong><?php echo $this->FormatDate($this->infos->date_naissance); ?></strong> </p>
<p>Lieu de naissance : <strong><?php echo $this->infos->lieu_naissance; ?></strong>


<?php if (count($this->liste)) { ?>

    <form method="post" action="">
        <input type="hidden" name="id_liste" value="<?php echo $this->id_liste; ?>" />

        <table id="sample-table-2" class="table table-striped table-bordered table-hover" width="95%">
            <thead>
                <tr>
                    <th>Ref. Fabricant</th>
                    <th>Nom de l'objet</th>
                    <th>Prix</th>
                    <th>Somme déjà payé</th>
                    <th>Statut</th>
                    <th>Vous versez</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($this->liste as $liste) {
                    $prix_restant = $liste->prix_vente - $liste->prix_paye;
                    ?>
                    <tr>
                        <td><?php echo $liste->ref_produit; ?></td>
                        <td><?php echo $liste->nom_produit; ?></td>
                        <td><?php if($liste->ref_produit != '000') {echo $this->FormatXfp($liste->prix_vente); $prix_total += $liste->prix_vente;} else { echo "MONTANT LIBRE";} ?></td>
                        <td><?php if($liste->ref_produit != '000') {echo $this->FormatXfp($liste->prix_paye); $prix_paye += $liste->prix_paye;} else {echo "CONFIDENTIEL";} ?> </td>
                        <td><?php if($liste->ref_produit != '000') {echo ($prix_restant >= 0) ? '<span class="label label-warning">Manque ' . $this->FormatXfp($prix_restant) . '</span>' : '<span class="label label-success">Déjà offert</span>';} ?></td>

                        <th>
                            <?php if ($prix_restant > 0 || $liste->ref_produit == '000') { ?>
                                <input type="hidden" name="id_produit[]" value="<?php echo $liste->id_produit; ?>" />
                                <input type="hidden" name="nom_produit[]" value="<?php echo $liste->nom_produit; ?>" />
                                <input type="text" name="montant_paye[]" value="0" /> XPF
                            <?php } else { ?>
                                <span class="label label-success">Payé en intégralité</span>
                            <?php } ?>
                        </th>
                    </tr>
                <?php } ?>
                    <tr>
                        <td colspan="5" align="right">Prix total de la liste : </td>
                        <td><?php echo $this->FormatXfp($prix_total); ?></td>                       
                    </tr>
                    <tr>
                        <td colspan="5" align="right">Prix total déjà payé:</td>
                        <td><?php echo $this->FormatXfp($prix_paye); ?></td>                       
                    </tr>
                    <tr>
                        <td colspan="5" align="right">Prix total restant à payé:</td>
                        <td><?php echo $this->FormatXfp($prix_total-$prix_paye); ?></td>                       
                    </tr>
            </tbody>
        </table>

        <?php echo $this->form->submit; ?>

    </form>

<?php } else { ?>

    <div class="alert alert-info">Aucun produit n'a été ajouté à la liste de naissance par le magasin.</div>

<?php } ?>
