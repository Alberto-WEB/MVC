<?php

class Errores extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>HUBO UN ERROR EN SU SOLICITUD O LA PAGINA NO EXISTE</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
         </div>';;
        $this->view->render('errores/index');
        //echo "<p>Error al cargar recurso</p>";
    }
}

?>