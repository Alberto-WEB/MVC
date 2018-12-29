<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Alumno</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div class="container">
        <h1 class="center">Sección de Nuevo</h1>

        <div class="center"><?php echo $this->mensaje; ?></div>
        <div class="form-group col-md-6">
        <form action="<?php echo constant('URL'); ?>nuevo/registrarAlumno" method="POST">

            <p>
                <label for="matricula">Matrícula</label><br>
                <input type="text" class="form-control" name="matricula" id="" required>
            </p>
            <p>
                <label for="nombre">Nombre</label><br>
                <input type="text" class="form-control" name="nombre" id="" required>
            </p>
            <p>
                <label for="apellido">Apellido</label><br>
                <input type="text" class="form-control" name="apellido" id="" required>
            </p>

            <p>
            <input type="submit" class="btn btn-primary" value="Registrar alumno">
            </p>

        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>