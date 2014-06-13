<div class="page-header">
    <h1>
        Espace Client - Informations concernant mon compte client
    </h1>
</div>

<dl class="zend_form">
    <div class="row extra_compte">
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
        </div>
    </div>
</dl>