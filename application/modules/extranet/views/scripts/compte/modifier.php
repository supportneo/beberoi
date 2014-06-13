<div class="page-header">
    <h1>
        Espace Client - Modifier mon compte client
    </h1>
</div>

<form method="POST" action="">
    <dl class="zend_form">
        <div class="row">
            <div class="col-xs-6">    
                <?php echo $this->form->titre; ?>
                <?php echo $this->form->nom; ?>
                <?php echo $this->form->prenom; ?>
                <?php echo $this->form->adresse_1; ?>
                <?php echo $this->form->adresse_2; ?>
                <?php echo $this->form->code_postal; ?>
                <?php echo $this->form->ville; ?>
            </div>
            <div class="col-xs-6"> 
                <?php echo $this->form->pays; ?>
                <?php echo $this->form->tel_1; ?>
                <?php echo $this->form->tel_2; ?>
                <?php echo $this->form->newsletter; ?>
                <p class="button-modif">* En cochant cette case vous acceptez de bénéficier de l'inscription<br>à notre news letter.</p>
            </div>
        </div>
        <p><?php echo $this->form->submit; ?></p>
    </dl>    
</form>
