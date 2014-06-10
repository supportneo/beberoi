<div class="page-header">
    <h1>
        Espace Client : 
        <small>
            <i class="icon-double-angle-right"></i>
            xxx
        </small>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
         <h2>Demander l'accès à une liste de naissance : </h2>
        <p>Veuillez saisir l'identifiant et le mot de passe de la liste que vous ont fournis les parents ou le magasin pour accéder à la liste de naissance.</p>
        
        <div class="alert alert-info"><em>Les accès pour la liste de test sont : balleraud / TEST</em></div>
        
    </div>
</div>
<div class="row">
        <div class="col-xs-4">
       <form method="post" action="/extranet/listenaissance/demandeacces">
            <?php echo $this->form->identifiant_liste; ?><br />
            <?php echo $this->form->code_acces; ?>
            <p>&nbsp;</p>
        <p align="center"><?php echo $this->form->submit; ?></p>
       </form>
    </div>
</div>