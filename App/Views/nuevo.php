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
                <h4 class="card-title">Nuevo cliente:</h4>
            </div>
            <div class="card-body">
                <form action="/cliente" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" required id="nombre" name="nombre" class="form-control" placeholder="Introduzca el nombre del cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <input type="text" required id="direccion" name="direccion" class="form-control" placeholder="Introduzca la direccion del cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" required id="email" name="email" class="form-control" placeholder="Introduzca el email del cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="ruc">RUC:</label>
                        <input type="text" required id="ruc" name="ruc" class="form-control" placeholder="Introduzca el ruc del cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" required id="ciudad" name="ciudad" class="form-control" placeholder="Introduzca la ciudad del cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="saldo">Saldo:</label>
                        <input type="text" required id="saldo" name="saldo" class="form-control" placeholder="Introduzca el saldo del cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" id="foto" name="foto" class="form-control" placeholder="Introduzca la foto del cliente"/>
                    </div>
                    <button class="btn btn-success">Registrar usuario</button>
                </form>
            </div>
        </div>
    </div>
    <?= view("footer")?>
</body>
</html>