<div class="signin-center">

    <h1>Inscription</h1>
    <h2>Créer un compte client</h2>    

    <form method="POST" action="">
        <dl class="zend_form">
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
            <p>* En cochant cette case vous acceptez de bénéficier de l'inscription<br>à notre news letter.<?php echo $this->form->submit; ?></p>
        </dl>
    </form>
</div>