<div class="page-header">
    <h1>Espace client <small><i class="icon-double-angle-right"></i> Informations concernant mon compte client :</small></h1>
</div>
<div class="row">
    <div class="col-xs-6">     
            <?php echo $this->form->titre; ?><br />
            <?php echo $this->form->nom; ?><br />
            <?php echo $this->form->prenom; ?><br />
            <?php echo $this->form->adresse_1; ?><br />
            <?php echo $this->form->adresse_2; ?><br />
            <?php echo $this->form->code_postal; ?><br />
            <?php echo $this->form->ville; ?><br />
    </div>
    <div class="col-xs-6"> 
        <?php echo $this->form->pays; ?><br />
        <?php echo $this->form->tel_1; ?><br />
        <?php echo $this->form->tel_2; ?><br />
        <?php echo $this->form->newsletter; ?><br />
        <p>&nbsp;</p>
        <p><?php echo $this->form->submit; ?></p>
    </div>
</div>