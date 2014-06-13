<div class="page-header">
    <h1>
        Espace Client - Accueil
    </h1>
</div>
<div class="extra_info">
    <h2>Demander l'accès à une liste de naissance</h2>
    <p>Veuillez saisir l'identifiant et le mot de passe de la liste que vous ont fournis les parents ou le magasin pour accéder à la liste de naissance.</p>
</div>
<div class="extra_form">
   <form method="post" action="/extranet/listenaissance/demandeacces">
        <dl class="zend_form">
            <?php echo $this->form->identifiant_liste; ?>
            <?php echo $this->form->code_acces; ?>
            <?php echo $this->form->submit; ?>
        </dl>
    </form>
</div>