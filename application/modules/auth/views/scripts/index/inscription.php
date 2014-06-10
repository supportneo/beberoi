<div class="page-header">
    <h1>Espace client <small><i class="icon-double-angle-right"></i> Créer un compte client</small></h1>
</div>
<div class="row">
    <div class="col-xs-12">     

        <form method="POST" action="">
            <?php echo $this->form->titre; ?>
            <?php echo $this->form->nom; ?>
            <?php echo $this->form->prenom; ?>
            <?php echo $this->form->adresse_1; ?>
            <?php echo $this->form->adresse_2; ?>
            <?php echo $this->form->code_postal; ?>
            <?php echo $this->form->ville; ?>
            <?php echo $this->form->pays; ?>
            <?php echo $this->form->tel_1; ?>
            <?php echo $this->form->tel_2; ?>
            <?php echo $this->form->email; ?>
            <?php echo $this->form->password; ?>
            <?php echo $this->form->newsletter; ?>
            <p><?php echo $this->form->submit; ?></p>
        </form>

    </div>
</div>