<div class="page-header">
    <h1>Espace client  <small><i class="icon-double-angle-right"></i> Simuler un paiement :</small></h1>
</div>
<div class="row">
    <div class="col-xs-12">   
<p>Cette page permet de simuler un paiement en conditions réelles d'utilisation.</p>
<p>Dans le cas normal, la page de paiement de votre banque s'affiche.</p>
        
        <?php if ($this->id_panier) { ?>
            <p align="center"><a href="/extranet/paiement/retourpaybox/step/paye/id_panier/<?php echo $this->id_panier; ?>" class="btn btn-success">Valider le paiement</a> <a href="/extranet/paiement/retourpaybox/step/impaye/id_panier/<?php echo $this->id_panier; ?>" class="btn btn-warning">Refuser le paiement</a></p>

        <?php } ?>
    </div>
</div>