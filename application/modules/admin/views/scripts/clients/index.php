<div class="page-header">
    <h1>
        Administration - Liste des clients
    </h1>
</div>

<div class="extra_info" style="height:90px;">      
    <p>Liste : Nombre de liste dont le client a effectué un paiement depuis son inscription.</p>
    <p>Liste 30 jours : Nombre de liste dont le client a effectué un paiement au cours des 30 derniers jours.</p>
</div>

</div><div class="bonus-list">

<?php if (count($this->paginator)) { ?>
    <table id="sample-table-2" class="table table-striped table-bordered table-hover" width="95%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Tel.</th>
                <th>E-mail</th>
                <th>Total payé</th>
                <th>Liste</th>
                <th>Liste 30 jours</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->paginator as $liste) { ?>
                <tr>
                    <td><?php echo $liste->nom; ?></td>
                    <td><?php echo $liste->prenom; ?></td>
                    <td><?php echo $liste->adresse_1;
                        echo (($liste->adresse_2) ? '<br />' . $liste->adresse_2 : '');
                        echo ($liste->adresse_3) ? '<br />' . $liste->adresse_3 : ''; ?>
                    </td>
                    <td><?php echo $liste->code_postal; ?></td>
                    <td><?php echo $liste->ville; ?></td>
                    <td><?php echo $liste->pays; ?></td>
                    <td><?php echo $liste->tel_1;
                        echo ($liste->tel_2) ? '<br />' . $liste->tel_2 : ''; ?>
                    </td>
                    <td><?php echo $liste->email; ?></td>
                    <td><?php echo $this->FormatXfp($liste->total_paye); ?></td>
                    <td><?php echo $liste->nb_liste_paye; ?></td>
                    <td><?php echo $liste->nb_liste_paye_30; ?></td>
                </tr>
    <?php } ?>
        </tbody>
    </table>

    <?php echo $this->paginationControl($this->paginator, 'Sliding', 'pagination.php'); ?>

<?php } else { ?>
<p>Aucun client inscrit actuellement.</p>
<?php } ?>