<html>
<head>
    <title>Ver todos los clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="card-title">Lista de clientes:</h4>
            <a href="/cliente/create" class="btn btn-primary">Nuevo Cliente:</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <td>Codigo</td>
                        <td>Nombre</td>
                        <td>Direccion</td>
                        <td>Email</td>
                        <td>RUC</td>
                        <td>Ciudad</td>
                        <td>Saldo</td>
                        <td>Foto</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($clientes as $cliente): ?>
                    <tr>
                        <td><?= $cliente["codigo"]?></td>
                        <td><?= $cliente["nombre"]?></td>
                        <td><?= $cliente["direccion"]?></td>
                        <td><?= $cliente["email"]?></td>
                        <td><?= $cliente["RUC"]?></td>
                        <td><?= $cliente["ciudad"]?></td>
                        <td>Gs. <?= number_format($cliente["saldo"])?></td>
                        <td><?= empty($cliente["foto"]) ? "Sin Imagen": "<img width='100px' src='data:image/png;base64,".$cliente["foto"]."'" ?></td>
                        <td>
                            <a href="/cliente/show/<?= $cliente["codigo"]?>" class="btn btn-primary">Ver</a>
                            <a href="/cliente/edit/<?= $cliente["codigo"]?>" class="btn btn-success">Editar</a>
                            <a href="/cliente/destroy/<?= $cliente["codigo"]?>" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <?= view("footer")?>
</body>
</html>