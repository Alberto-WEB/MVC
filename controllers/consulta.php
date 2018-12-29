<?php

class Consulta extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->alumnos = [];
        
        //echo "<p>Nuevo controlador Main</p>";
    }

    function render(){
        $alumnos = $this->model->get();
        $this->view->alumnos = $alumnos;
        $this->view->render('consulta/index');
    }

    function verAlumno($param = null){
        $idAlumno = $param[0];
        $alumno = $this->model->getById($idAlumno);

        session_start();
        $_SESSION['id_verAlumno'] = $alumno->matricula;
        $this->view->alumno = $alumno;
        $this->view->mensaje = "";
        $this->view->render('consulta/detalle');
    }

    function actualizarAlumno(){
        session_start();
        $matricula = $_SESSION['id_verAlumno'];
        $nombre    = $_POST['nombre'];
        $apellido  = $_POST['apellido'];

        unset($_SESSION['id_verAlumno']);

        if($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido] )){
            // actualizar alumno exito
            $alumno = new Alumno();
            $alumno->matricula = $matricula;
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;
            
            $this->view->alumno = $alumno;
            $this->view->mensaje = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Alumno actualizado exito</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
             </div>';
        }else{
            // mensaje de error
            $this->view->mensaje = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>No se pudo actualizar el alumno</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
             </div>';
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarAlumno($param = null){
        $matricula = $param[0];

        if($this->model->delete($matricula)){
            $this->view->mensaje = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Alumno eliminado correctamente</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
             </div>';
        }else{
            // mensaje de error
            $this->view->mensaje = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>No es posible elimar el alumno</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
             </div>';
        }
        $this->render();
    }
}

?>