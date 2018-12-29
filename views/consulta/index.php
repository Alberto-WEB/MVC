<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div class="container">
        <h1 class="center">Sección de Consulta</h1>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once 'models/alumno.php';
                    foreach($this->alumnos as $row){
                        $alumno = new Alumno();
                        $alumno = $row; 
                ?>
                <tr scope="row">
                    <td><?php echo $alumno->matricula; ?></td>
                    <td><?php echo $alumno->nombre; ?></td>
                    <td><?php echo $alumno->apellido; ?></td>
                    <td><a class="btn btn-warning" href="<?php echo constant('URL') . 'consulta/verAlumno/' . $alumno->matricula; ?>">Editar</a>  </td>
                    <td><a class="btn btn-danger" href="<?php echo constant('URL') . 'consulta/eliminarAlumno/' . $alumno->matricula; ?>">Eliminar</a> </td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>