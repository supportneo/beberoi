<div class="page-header">
    <h1>
        Administration - Liste des messages de félicitations
    </h1>
</div>

<?php if (count($this->paginator)) { ?>
    <table id="sample-table-2" class="table table-striped table-bordered table-hover" width="95%">
        <thead>
            <tr>
                <th>Nom du client</th>
                <th>Nom de famille</th>
                <th>Prénom de l'enfant</th>
                <th>Message</th>
                <th>Date de création</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->paginator as $liste) { ?>
                <tr>
                    <td><?php echo ucfirst(strtolower($liste->nom)) . ' ' . ucfirst(strtolower($liste->prenom)); ?></td>
                    <td><?php echo ucfirst(strtolower($liste->nom_famille)); ?> </td>
                    <td><?php echo ucfirst(strtolower($liste->prenom_enfant)); ?></td>
                    <td><?php echo $liste->message; ?>
                    <td><?php echo $this->FormatDate($liste->date_insert); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php echo $this->paginationControl($this->paginator, 'Sliding', 'pagination.php'); ?>

<?php } else { ?>
    <p>Aucun message de félicitation n'as été ajouté pour le moment.</p>
<?php } ?>