<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ver cliente:</h4>
            </div>
            <div class="card-body">
                <form action="/cliente" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" disabled value="<?= $nombre?>"placeholder="Introduzca el nombre del cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <input type="text" id="direccion" name="direccion" class="form-control" disabled value="<?= $direccion?>" placeholder="Introduzca la direccion del cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" disabled value="<?= $email?>" placeholder="Introduzca el email del cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="ruc">RUC:</label>
                        <input type="text" id="ruc" name="ruc" class="form-control" disabled value="<?= $RUC?>" placeholder="Introduzca el ruc del cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" id="ciudad" name="ciudad" class="form-control" disabled value="<?= $ciudad?>" placeholder="Introduzca la ciudad del cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="saldo">Saldo:</label>
                        <input type="text" id="saldo" name="saldo" class="form-control" disabled value="<?= $saldo?>" placeholder="Introduzca el saldo del cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <?= empty($foto) ? "Sin Imagen": "<img width='100%' src='data:image/png;base64,".$foto."'"?>
                    </div><br/><br/>
                    <a class="btn btn-success" href="/cliente">Volver</a>
                </form>
            </div>
        </div>
    </div>
    <?= view("footer")?>
</body>
</html>