
<?php
include 'global/config.php';
include 'global/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bellesa-products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="index.php">logo de la tienda</a>
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Carrito(0)</a>
            </li>
        </ul>
    </div>
</nav>
<br/>
<br/>
<div class="container">
<br>
<div class="alert alert-success">
    Pantalla de mensaje...
    <a href="#" class="badge badge-success">ver carrito</a>
</div>
<div class="row">
    <?php
    $sentencia=$pdo->prepare("SELECT * FROM `tblproductos`");
    $sentencia->execute();
    $lisProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    print_r($lisProductos);
    ?>

    <?php foreach($lisProductos as $producto){?>
        <div class="col-3">
        <div class="card">
            <img 
            title="cera"
            class="card-img-top" 
            src="<?php echo $producto['Imagen'];?>" 
            alt="<?php echo $producto['Nombre'];?>">
            <div class="card-body">
                <span><?php echo $producto['Nombre'];?></span>
                <h5 class="card-title">$<?php echo $producto['Precio'];?></h5>
                <p class="card-text">descripcion</p>
                <button class="btn btn-primary" 
                type="submit" 
                name="btnAccion" 
                value="Agregar"
                >agregar al carrito
            </button>
            </div>
        </div>
    </div>
        <?php }?>
    
</div>
</div>
</body>
</html>