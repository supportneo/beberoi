<h2>Liste de naissances : </h2>

<?php if(count($this->paginator)) { ?>
<table id="sample-table-2" class="table table-striped table-bordered table-hover" width="95%">
    <thead>
        <tr>
            <th>Nom de famille</th>
            <th>Prénom de nouveau né</th>
            <th>Date de naissance</th>
            <th>Lieu de naissance</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ( $this->paginator as $liste ) { ?>
        <tr>
            <td><?php echo $liste->nom_famille; ?></td>
            <td><?php echo $liste->prenom_enfant; ?></td>
            <td><?php echo $this->FormatDate($liste->date_naissance); ?></td>
            <td><?php echo $liste->lieu_naissance; ?></td>
            <td><a href="/extranet/listenaissance/details/id_liste/<?php echo $liste->id_liste; ?>">Voir</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php echo $this->paginationControl($this->paginator, 'Sliding', 'pagination.php'); ?>

<?php } else { ?>
<p>Vous n'avez accès à aucune liste de naissance pour le moment ...</p>
<?php } ?>