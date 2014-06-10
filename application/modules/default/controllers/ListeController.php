<?php
class Default_ListeController extends Core_Controller
{
/**************************************************************************************************
	Page Index :
**************************************************************************************************/

    public function indexAction()
    {
    $this->view->liste               =       $this->model_liste_naiss->listebycode('TEST','TEST');  
    }
}
