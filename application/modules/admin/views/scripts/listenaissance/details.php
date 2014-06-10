<div class="page-header">
    <h1>Administration <small><i class="icon-double-angle-right"></i> Détails de la liste de naissance N° <?php echo $this->infos->id_liste; ?> <i class="icon-double-angle-right"></i> <?php echo 'Enfant : ' . $this->infos->prenom_enfant . ' / Famille : ' . $this->infos->nom_famille; ?></small></h1> 
</div>
<div class="row">
    <div class="col-xs-12">

        <p><strong>Date de naissance : </strong><?php echo $this->FormatDate($this->infos->date_naissance); ?> </p>
        <p><strong>Lieu de naissance : </strong><?php echo $this->infos->lieu_naissance; ?></p>

        <p><strong>Total payé sur la liste : </strong> <?php echo ($this->infos->total_paye); ?> / <?php echo ($this->infos->total_liste); ?> / <?php echo round(($this->infos->total_paye / $this->infos->total_liste), 2) * 100; ?> %

            <?php if (count($this->liste)) { ?>

            <form method="post" action="">
                <input type="hidden" name="id_liste" value="<?php echo $this->id_liste; ?>" />

                <table id="sample-table-2" class="table table-striped table-bordered table-hover" width="95%">
                    <thead>
                        <tr>
                            <th>Ref. Fabricant</th>
                            <th>Nom de l'objet</th>
                            <th>Prix</th>
                            <th>Prix payé</th>
                            <th>Statut</th>
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
                                <td><?php if ($liste->ref_produit != '000') {
                        echo ($liste->prix_vente);
                        $prix_total += $liste->prix_vente;
                    } else {
                        echo "MONTANT LIBRE";
                    } ?></td>
                                <td><?php if ($liste->ref_produit != '000') {
                        echo ($liste->prix_paye);
                        $prix_paye += $liste->prix_paye;
                    } else {
                        echo "CONFIDENTIEL";
                    } ?> </td>
                                <td><?php if ($liste->ref_produit != '000') {
                        echo ($prix_restant > 0) ? '<span class="label label-warning">Manque ' . ($prix_restant) . '</span>' : '<span class="label label-success">Déjà offert</span>';
                    } ?></td>

                            </tr>
    <?php } ?>
                        <tr>
                            <td colspan="4" align="right">Prix total de la liste : </td>
                            <td><?php echo ($prix_total); ?></td>                       
                        </tr>
                        <tr>
                            <td colspan="4" align="right">Prix total déjà payé:</td>
                            <td><?php echo ($prix_paye); ?></td>                       
                        </tr>
                        <tr>
                            <td colspan="4" align="right">Prix total restant à payé:</td>
                            <td><?php echo ($prix_total - $prix_paye); ?></td>                       
                        </tr>
                    </tbody>
                </table>

    <?php echo $this->form->submit; ?>

            </form>

<?php } else { ?>

            <div class="alert alert-info">Aucun produit n'a été ajouté à la liste de naissance par le magasin.</div>

<?php } ?>
    </div>
</div>